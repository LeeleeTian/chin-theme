<?php
/**
 * Template Name: Our Work
 */

$class = 'col-md-9 col-lg-9 col-lg2-6';
if (isset($_GET['lang']) && $_GET['lang'] == 'zh-hans') {
    $class = 'col-md-10 col-lg-10 col-lg2-8 col-md-offset-1 col-lg2-offset-2';
}

?>
<?= View::make('page/top_banner', [
    'header' => get_field('top_banner_text'),
    'image' => get_field('top_banner_image'),
    'video' => get_field('top_banner_video'),
    'backgroundVideo' => get_field('top_banner_background_video')
]) ?>
<div class="our-work pc">
    <div class="container">
        <div class="row">
            <div class="col-md-2 pc__grey grey1">&nbsp;</div>
            <div class="col-md-3 pc__grey grey2">
                <?= View::make('page/sidebar', [
                    'menu' => View::make('case-studies/menu')
                ]) ?>
            </div>
                <div class="<?= $class ?>">
                <div class="pc__content">
                    <?= View::make('case-studies/our-work') ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= View::make('case-studies/client-slider') ?>
