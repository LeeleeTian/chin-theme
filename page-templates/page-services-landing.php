<?php

/**
 * Template Name: Services Landing Page
 */
?>
<?= View::make('page/top_banner', [
    'title' => get_the_title(),
    'header' => get_field('top_banner_text'),
    'image' => get_field('top_banner_image'),
    'video' => get_field('top_banner_video'),
    'backgroundVideo' => get_field('top_banner_background_video')
]) ?>

<?= View::make('mega/primary_nav_trigger', ['isServices' => true]) ?>

<?= View::make('case-studies/client-slider') ?>
