<?php
$clientLogo = get_field('cs_client_logo');
$clientName = get_field('cs_client_name');
$year = get_field('cs_year');
$content = get_field('cs_content');

$posts = get_posts([
    'posts_per_page'   => -1,
    'post_type'        => 'true_case_study',
    'post_status'      => 'publish',
    'orderby'          => 'menu_order',
    'order'            => 'ASC',
    'suppress_filters' => false,
]);

$currentPost = get_post();

$next = null;
$prev = null;

foreach ($posts as $k => $post) {
    if ($post->ID == $currentPost->ID) {
        if (isset($posts[$k - 1])) {
            $prev = $posts[$k - 1];
        }

        if (isset($posts[$k + 1])) {
            $next = $posts[$k + 1];
        }

        break;
    }
}

$footerContent = get_field('our_services_content', 'options');
$footerLink = get_field('our_services_link_copy', 'options');
?>

<div class="container cs__content">
    <!-- Main content -->
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="cs__content__sidebar">
                <img src="<?= $clientLogo['url'] ?>" alt="" class="cs__content__logo img-responsive">
                <p class="cs__content__sidebar__header"><?= Lingo::get('label.client') ?></p>
                <p class="cs__content__sidebar__paragraph"><?= $clientName ?></p>
                <p class="cs__content__sidebar__header"><?= Lingo::get('label.years') ?></p>
                <p class="cs__content__sidebar__paragraph"><?= $year ?></p>
            </div>
            <?php if (is_array($content)): ?>
                <?php foreach ($content as $row): ?>
                    <?= View::make('case-studies/' . $row['acf_fc_layout'], $row) ?>
                <?php endforeach; ?>
            <?php endif; ?>
            <div class="clearfix"></div>
        </div>
    </div>

    <!-- Case Studies -->
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <?= View::make('services/reviews', ['reviews' => get_field('reviews')]) ?>
        </div>
    </div>

    <!-- Page navigation -->
    <div class="row">
        <div class="col-md-4 col-md-offset-2">
            <?php if ($prev !== null): ?>
                <a class="cs__paginate cs__paginate--left text-right" href="<?= get_permalink($prev) ?>">
                    <span class="btn btn--square"></span>
                    <p class="cs__paginate__title"><?= $prev->post_title ?></p>
                    <p class="cs__paginate__subtitle"><?= Lingo::get('label.prev_case_study') ?></p>
                </a>
            <?php endif; ?>
        </div>
        <div class="col-md-4">
            <?php if ($next !== null): ?>
                <a class="cs__paginate cs__paginate--right" href="<?= get_permalink($next) ?>">
                    <span class="btn btn--square"></span>
                    <p class="cs__paginate__title"><?= $next->post_title ?></p>
                    <p class="cs__paginate__subtitle"><?= Lingo::get('label.next_case_study') ?></p>
                </a>
            <?php endif; ?>
        </div>
    </div>
    <?php if ($footerContent && $footerLink): ?>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="cs__footer">
                    <h2 class="heading-red cs__footer__title"><?= Lingo::get('label.our_services') ?></h2>
                    <p class="cs__footer__content"><?= $footerContent ?></p>
                    <a href="<?= $footerLink ?>" class="btn btn--square"></a>
                </div>
            </div>
        </div>
    <?php endif; ?>

</div>
