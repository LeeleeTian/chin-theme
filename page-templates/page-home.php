<?php
/**
 * Template Name: Home
 */

?>

<?php if (get_field('enable_video_banner')) :?>
    <?= View::make('home/introduction') ?>
<?php else: ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?= View::make('home/slider', ['slides' => get_field('slides')]) ?>
            </div>
        </div>
    </div>
<?php endif ?>

<?= View::make('home/cta') ?>
<?= View::make('home/client-reviews') ?>
<?= View::make('home/services') ?>
<?= View::make('home/case-study-videos') ?>
<?//= View::make('home/banner') ?>
<?= View::make('home/blog-feed') ?>
<?= View::make('case-studies/client-slider') ?>
