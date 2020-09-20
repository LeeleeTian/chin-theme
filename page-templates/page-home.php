<?php
/**
 * Template Name: Home
 */

?>

<?php if (false): ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?= View::make('home/slider', ['slides' => get_field('slides')]) ?>
        </div>
    </div>
</div>
<?php endif ?>

<?= View::make('home/video-banner') ?>
<?= View::make('home/two-column-text') ?>
<?= View::make('home/cta') ?>
<?= View::make('home/client-reviews') ?>
<?= View::make('home/services') ?>
<?= View::make('home/case-study-videos') ?>
<?//= View::make('home/banner') ?>
<?= View::make('home/blog-feed') ?>
<?= View::make('case-studies/client-slider') ?>
