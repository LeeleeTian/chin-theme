<?php
/**
 * Template Name: Team
 */
?>
<?= View::make('page/top_banner', [
    'title' => get_the_title(),
    'header' => get_field('top_banner_text'),
    'image' => get_field('top_banner_image'),
    'video' => get_field('top_banner_video'),
    'backgroundVideo' => get_field('top_banner_background_video')
]) ?>
<?= View::make('about/team', ['divisions' => get_field('team_divisions')]) ?>
