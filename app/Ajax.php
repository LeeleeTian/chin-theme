<?php
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class Ajax
{
    public static function init() {
        add_action('wp_ajax_nopriv_resources_pagination', [__CLASS__, 'resourcesPagination']);
        add_action('wp_ajax_resources_pagination', [__CLASS__, 'resourcesPagination']);

        add_action('wp_ajax_nopriv_our-work_pagination', [__CLASS__, 'ourWorkPagination']);
        add_action('wp_ajax_our-work_pagination', [__CLASS__, 'ourWorkPagination']);

        add_action('wp_ajax_nopriv_newsletter_form', [__CLASS__, 'newsletter']);
        add_action('wp_ajax_newsletter_form', [__CLASS__, 'newsletter']);
    }

    public static function resourcesPagination() {
        $request = Request::createFromGlobals();

        if (!$request->isMethod('post')) {
            die('');
        }

        $page = (int)$request->request->get('page');

        $params = [
            'posts_per_page' => -1,
            'paged' => $page,
            'post_type' => 'true_resource',
            'post_status' => 'publish'
        ];

        if ($request->get('resources_search')) {
            switch ($request->get('resources_filter')) {
                case 1: // categories
                    $categories = get_terms('true_resource_tax', [
                        'name__like' => $request->get('resources_search')
                    ]);

                    if (count($categories) > 0) {
                        $params['tax_query'] = [];

                        if (count($categories) > 1) {
                            $params['tax_query']['relation'] = 'OR';
                        }

                        foreach ($categories as $category) {
                            array_push($params['tax_query'], [
                                'taxonomy' => 'true_resource_tax',
                                'field' => 'id',
                                'terms' => $category->term_id
                            ]);
                        }
                    } else {
                        $params['tax_query'] = [
                            [
                                'taxonomy' => 'true_resource_tax',
                                'field' => 'id',
                                'terms' => 0
                            ]
                        ];
                    }

                    break;
                case 2: // title
                    $params['s'] = $request->get('resources_search');
                    break;
            }
        }
        $totalPosts = count(get_posts($params));

        $params['posts_per_page'] = 4;
        $posts = get_posts($params);

        $data = [
            'content' => View::make('resources/items', ['posts' => $posts]),
            'page' => $page + 1,
            'hide_pagination' => (int)($page * 4 >= $totalPosts)
        ];

        $response = new Response();
        $response->setContent(json_encode($data));
        $response->headers->set('Content-Type', 'application/json');
        $response->prepare($request);
        $response->send();
        exit;
    }

    public static function ourWorkPagination() {
        $request = Request::createFromGlobals();

        if (!$request->isMethod('post')) {
            die('');
        }

        $page = (int)$request->request->get('page');

        $params = [
            'posts_per_page' => 4,
            'paged' => $page,
            'post_type' => 'true_case_study',
            'post_status' => 'publish',
            'orderby' => 'menu_order',
            'order' => 'ASC',
            'suppress_filters' => false,
        ];

        $categoryString = $request->request->get('industries');
        if ($categoryString !== null && $categoryString != 0) {

            if (!isset($params['meta_query'])) {
                $params['meta_query'] = [];
            }

            $categories = explode(',', $categoryString);

            array_push($params['meta_query'], [
                'key' => 'cs_industry',
                'value' => $categories,
                'compare' => 'IN'
            ]);
        }

        $serviceString = $request->request->get('services');
        if ($serviceString !== null) {
            $services = explode(',', $serviceString);

            if (!isset($params['meta_query'])) {
                $params['meta_query'] = [];
            }

            array_push($params['meta_query'], [
                'key' => 'cs_service',
                'value' => $services,
                'compare' => 'IN'
            ]);
        }

        if (isset($params['meta_query']) && count($params['meta_query']) > 1) {
            $params['meta_query'] = [
                'relation' => 'AND'
            ];
        }


        $posts = get_posts($params);

        $params['posts_per_page'] = -1;
        $totalPosts = count(get_posts($params));

        $data = [
            'content' => View::make('case-studies/our-work-items', ['posts' => $posts]),
            'page' => $page + 1,
            'hide_pagination' => (int)($page * 4 >= $totalPosts)
        ];

        $response = new Response();
        $response->setContent(json_encode($data));
        $response->headers->set('Content-Type', 'application/json');
        $response->prepare($request);
        $response->send();
        exit;
    }

    public static function newsletter()
    {
        $request = Request::createFromGlobals();

        if (!$request->isMethod('post')) {
            die("");
        }

        $email = $request->request->get('newsletter_mail');
        $firstname = $request->request->get('newsletter_firstname');
        $lastname = $request->request->get('newsletter_lastname');

        $errors = [];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'newsletter_mail';
        }

        if (strlen(trim($firstname)) == 0) {
            $errors[] = 'newsletter_firstname';
        }

        if (strlen(trim($lastname)) == 0) {
            $errors[] = 'newsletter_lastname';
        }

        if (count($errors) == 0) {
            $logger = new Logger('chin_logger');
            $logger->pushHandler(new StreamHandler(__DIR__ . '/../logs.log', Logger::DEBUG));

            $newsletter = new Newsletter($logger);

            $newsletter->subscribeNewsletter(
                $email,
                $firstname,
                $lastname
            );
        }

        $responseData = [
            'status' => count($errors) == 0 ? 'OK' : 'error',
            'errors' => $errors
        ];

        $response = new Response();
        $response->setContent(json_encode($responseData));
        $response->headers->set('Content-Type', 'application/json');
        $response->prepare($request);
        $response->send();
        exit;
    }
}

Ajax::init();