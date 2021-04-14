<?php

/**
 * Template Name: Our Services - Individual
 */

$parentId = get_post()->post_parent;
$parentPost = get_post($parentId);

$children = get_children([
    'post_parent' => $parentId,
    'post_type'   => 'page',
    'orderby'     => 'menu_order',
    'order'       => 'ASC'
]);

$links = get_field('services_links', $parentPost);

$workContent = get_field('work_short_content', 'options');
$workLink = get_field('work_link', 'options');

$phone = get_field('contact_phone_number', 'options');
$internationalPhone = get_field('contact_international_phone_number', 'options');
$email = get_field('contact_email_address', 'options');

$banner = get_field('top_banner_image');
if (!$banner) {
    $banner = get_field('top_banner_image', $parentId);
}

$header = get_field('top_banner_text');
if (!$header) {
    $header = get_field('top_banner_text', $parentId);
}

?>
<?= View::make('page/top_banner', [
    // 'title'                => $parentPost->post_title,
    'header'               => $header,
    'image'                => $banner,
    'skipBreadcrumbsTitle' => true,
    'video' => get_field('top_banner_video'),
    'backgroundVideo' => get_field('top_banner_background_video')
]) ?>
<div class="services__individual pc">
    <div class="container">

        <div class="row">
            <div class="col-md-2 pc__grey grey1">&nbsp;</div>
            <div class="col-md-3 pc__grey grey2">
                <?= View::make('page/sidebar', [
                    'header'             => '<a href="' . get_permalink($parentId) . '">' . get_field('services_header', $parentId) . '</a>',
                    'menu'               => View::make('page/menu', ['items' => $children, 'additional' => $links]),
                    'workContent'        => $workContent,
                    'workLink'           => $workLink,
                    'phone'              => $phone,
                    'internationalPhone' => $internationalPhone,
                    'email'              => $email
                ]) ?>
            </div>
            <div class="col-md-9 col-lg-9 col-lg2-6">
                <div class="pc__content">
                    <h2 class="pc__content-heading"><?= get_the_title() ?></h2>
                    <?= get_field('page_body') ?>
                    <?= View::make('services/reviews', ['reviews' => get_field('reviews')]) ?>
                    <?= View::make('page/quote_banner') ?>
                </div>
            </div>
        </div>
    </div>
</div>