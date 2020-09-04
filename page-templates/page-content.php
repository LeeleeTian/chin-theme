<?php
/**
 * Template Name: Content Page
 */
?>
<?= View::make('page/top_banner', [
    'header' => get_field('top_banner_text'),
    'image' => get_field('top_banner_image'),
    'video' => get_field('top_banner_video'),
    'backgroundVideo' => get_field('top_banner_background_video')
]) ?>
<div class="pc">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="pc__content">
                    <?= get_field('page_body') ?>
                </div>
            </div>
        </div>
    </div>
</div>
