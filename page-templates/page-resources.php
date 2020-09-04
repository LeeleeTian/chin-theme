<?php
/**
 * Template Name: Resources
 */

use Symfony\Component\HttpFoundation\Request;
$request = Request::createFromGlobals();

$params = [
    'posts_per_page' => -1,
    'paged' => 1,
    'post_type' => 'true_resource',
    'post_status' => 'publish'
];

if ($request->isMethod('post') && $request->get('resources_search') !== null) {
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

$workContent = get_field('work_short_content', 'options');
$workLink = get_field('work_link', 'options');

?>
<?= View::make('page/top_banner', [
    'header' => get_field('top_banner_text'),
    'image' => get_field('top_banner_image'),
    'video' => get_field('top_banner_video'),
    'backgroundVideo' => get_field('top_banner_background_video')
]) ?>
<div class="resources pc">
    <div class="container">
        <div class="row">
            <div class="col-md-2 pc__grey grey1">&nbsp;</div>
            <div class="col-md-3 pc__grey grey2">
                <?= View::make('page/sidebar', [
                    'workContent' => $workContent,
                    'workLink' => $workLink
                ]) ?>
            </div>
            <div class="col-md-9 col-lg-9 col-lg2-7">
                <div class="pc__content">
                    <?= View::make('resources/content', ['posts' => $posts, 'total' => $totalPosts]) ?>
                </div>
            </div>
        </div>
    </div>
</div>
