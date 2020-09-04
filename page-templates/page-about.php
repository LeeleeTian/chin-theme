<?php
/**
 * Template Name: About Us
 */

$menuItems = get_children([
    'post_parent' => icl_object_id(getenv('PAGE_ABOUT_US'), 'page'),
    'post_type'   => 'page',
    'orderby'     => 'menu_order',
    'order'       => 'ASC'
]);
?>
<?= View::make('page/top_banner', [
    'header' => get_field('top_banner_text'),
    'image'  => get_field('top_banner_image'),
    'video' => get_field('top_banner_video'),
    'backgroundVideo' => get_field('top_banner_background_video')
]) ?>
<div class="services__individual pc">
    <div class="container">
        <div class="row">
            <div class="col-md-2 pc__grey grey1">&nbsp;</div>
            <div class="col-md-3 pc__grey grey2">
                <?php
                $args = [];
                // Only show sidebar on EN site (its broken on chinese version)
                if (ICL_LANGUAGE_CODE == 'en') {
                    $args = [
                        'menu' => View::make('page/menu', ['items' => $menuItems])
                    ];
                } ?>
                <?=  View::make('page/sidebar', $args) ?>
            </div>
            <div class="col-md-9 col-lg-9 col-lg2-6">
                <div class="pc__content">
                    <h2 class="pc__content-heading"><?= get_the_title() ?></h2>
                    <?= get_field('page_body') ?>
                </div>
            </div>
        </div>
    </div>
</div>
