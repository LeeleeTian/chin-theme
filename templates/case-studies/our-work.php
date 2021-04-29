<?php
// our work page
use Symfony\Component\HttpFoundation\Request;

$request = Request::createFromGlobals();

$industryString = $request->query->get('industries');


$serviceString = $request->query->get('services');
global $wp_query;

if (
    $industryString == null
    && isset($wp_query->query_vars['industries'])
) {
    $industryString = $wp_query->query_vars['industries'];
}


if (
    $serviceString == null
    && isset($wp_query->query_vars['services'])
) {
    $serviceString = $wp_query->query_vars['services'];
}



$params = [
    'posts_per_page' => -1,
    'post_type' => 'true_case_study',
    'post_status' => 'publish',
    'orderby' => 'menu_order',
    'order' => 'ASC',
    'suppress_filters' => false,
    'tax_query'      => array(
        array(
            'taxonomy' => 'true_case_study_tax',  //这里自定义了taxonomy
            'terms'    => 67,
            'operator' => 'NOT IN',
        )

    )


];

if ($industryString !== null && $industryString != 0) {
    $industries = explode(',', $industryString);

    if (!isset($params['meta_query'])) {
        $params['meta_query'] = [];
    }

    $query = [
        'relation' => 'OR'
    ];
    foreach ($industries as $industry) {
        array_push($query, [
            'key' => 'cs_industry',
            'value' => $industry,
            'compare' => 'LIKE'
        ]);
    }
    array_push($params['meta_query'], $query);
} else {
    $categoryString = 0;
}

if ($serviceString !== null) {
    $services = explode(',', $serviceString);

    if (!isset($params['meta_query'])) {
        $params['meta_query'] = [];
    }

    $query = [
        'relation' => 'OR'
    ];
    foreach ($services as $service) {
        array_push($query, [
            'key' => 'cs_service',
            'value' => $service,
            'compare' => 'LIKE'
        ]);
    }
    array_push($params['meta_query'], $query);
}

if (isset($params['meta_query']) && count($params['meta_query']) > 1) {
    $params['meta_query']['relation'] = 'AND';
}

$posts = get_posts($params);

$params['posts_per_page'] = -1;
$totalPosts = count(get_posts($params));

?>



<!-- 这里是所有的case studies -->
<ul class="our-work__list">
    <?= View::make('case-studies/our-work-items', ['posts' => $posts]) ?>
</ul>