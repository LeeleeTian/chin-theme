<?php
/**
* Template Name: FAQ
*/

$categories = get_categories([
    'taxonomy' => 'true_faq_tax'
]);

$categoryId = get_query_var('true_faq_tax');

if (!$categoryId) {
    $firstCategory = array_values($categories)[0];
    $categoryId = $firstCategory->slug;
}

$categoryObj = get_term_by('slug', $categoryId, 'true_faq_tax');

$posts = get_posts([
    'posts_per_page' => -1,
    'post_type' => 'true_faq',
    'post_status' => 'publish',
    'tax_query' => [
        [
            'taxonomy' => 'true_faq_tax',
            'field' => 'slug',
            'terms' => $categoryId
        ]
    ]
]);

?>
<?= View::make('page/top_banner', [
    'header' => get_field('top_banner_text', getenv('PAGE_FAQ')),
    'image' => get_field('top_banner_image', getenv('PAGE_FAQ')),
    'post' => get_post(getenv('PAGE_FAQ')),
    'video' => get_field('top_banner_video'),
    'backgroundVideo' => get_field('top_banner_background_video')
]) ?>
<div class="pc">
    <div class="container">
        <div class="row">
            <div class="col-md-2 pc__grey grey1">&nbsp;</div>
            <div class="col-md-3 pc__grey grey2">
                <?= View::make('page/sidebar', [
                    'menu' => View::make('faq/menu', [
                        'categoryId' => $categoryId,
                        'categories' => $categories
                    ])
                ]) ?>
            </div>
            <div class="col-md-9 col-lg-9 col-lg2-6">
                <div class="pc__content">
                    <?= View::make('faq/questions', [
                        'category' => $categoryObj,
                        'posts' => $posts
                    ]) ?>
                    <?= View::make('page/quote_banner') ?>
                </div>
            </div>
        </div>
    </div>
</div>
