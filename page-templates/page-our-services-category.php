<?php
/**
 * Template Name: Our Services - Category
 */

$children = get_children([
    'post_parent' => get_the_ID(),
    'post_type'   => 'page',
    'orderby'     => 'menu_order',
    'order'       => 'ASC'
]);

$links = get_field('services_links');

$workContent = get_field('work_short_content', 'options');
$workLink = get_field('work_link', 'options');

$phone = get_field('contact_phone_number', 'options');
$internationalPhone = get_field('contact_international_phone_number', 'options');
$email = get_field('contact_email_address', 'options');

?>
<?= View::make('page/top_banner', [
    'header' => get_field('top_banner_text'),
    'image'  => get_field('top_banner_image'),
    'video' => get_field('top_banner_video'),
    'is_show' => get_field('top_youtube_show'),
    'youtube' => get_field('top_youtube'),
    'bg_color' => get_field('banner_background_color'),
    'bg_text' => get_field('banner_bg_text'),
    'backgroundVideo' => get_field('top_banner_background_video')
]) ?>
<div class="services__individual pc">
    <div class="container">
        <div class="row">
            <div class="col-md-2 pc__grey grey1">&nbsp;</div>
            <div class="col-md-3 pc__grey grey2">
                <?= View::make('page/sidebar', [
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
                </div>
            </div>
        </div>
    </div>
</div>
