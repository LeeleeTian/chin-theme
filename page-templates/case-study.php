<?= View::make('page/top_banner', [
    'image' => get_field('top_banner_image'),
    'breadcrumbs' => View::make('case-studies/breadcrumbs'),
    'categories' => View::make('case-studies/categories'),
    'video' => get_field('top_banner_video'),
    'backgroundVideo' => get_field('top_banner_background_video')
]) ?>
<?= View::make('case-studies/share') ?>
<?= View::make('case-studies/content') ?>
