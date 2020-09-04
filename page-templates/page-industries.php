<?php
/**
 * Template Name: Industries
 */

$industries = array_filter(get_categories([
    'taxonomy' => 'true_case_study_tax',
    'hide_empty' => false
]), function ($item) {
    return get_field('hide_from_menu', $item) !== true;
});
?>
<?= View::make('page/top_banner', [
    'header' => get_field('top_banner_text'),
    'image' => get_field('top_banner_image'),
    'video' => get_field('top_banner_video'),
    'backgroundVideo' => get_field('top_banner_background_video')
]) ?>
<div class="pc industries">
    <div class="container">
        <div class="row">
            <div class="col-md-2 pc__grey grey1">&nbsp;</div>
            <div class="col-md-3 pc__grey grey2">
                <?= View::make('page/sidebar', [
                    'menu' => View::make('industries/menu', ['categories' => $industries])
                ]) ?>
            </div>
            <div class="col-md-9 col-lg-9 col-lg2-6">
                <div class="pc__content">
                    <?= View::make('industries/categories', ['categories' => $industries]) ?>
                    <?= View::make('page/quote_banner') ?>
                </div>
            </div>
        </div>
    </div>
</div>
