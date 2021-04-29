<?php

use Symfony\Component\HttpFoundation\Request;

$request = Request::createFromGlobals();

global $wp_query;

$queryIndustries = $request->query->get('industries');
$queryServices = $request->query->get('services');

if (
    $queryIndustries == null
    && isset($wp_query->query_vars['industries'])
) {
    $queryIndustries = $wp_query->query_vars['industries'];
}

if (
    $queryServices == null
    && isset($wp_query->query_vars['services'])
) {
    $queryServices = $wp_query->query_vars['services'];
}

if ($queryIndustries) {
    $selectedCategories = explode(',', $queryIndustries);
} else {
    $selectedCategories = [];
}

if ($queryServices) {
    $selectedServices = explode(',', $queryServices);
} else {
    $selectedServices = [];
}

$industries = get_categories([
    'taxonomy' => 'true_case_study_tax',
    'exclude' => 67,
    'hide_empty' => false
]);

$services = get_categories([
    'taxonomy' => 'true_case_study_service',
    'hide_empty' => false
]);

// $services = new WP_Query([
//     'post_type' => 'page',
//     'posts_per_page' => -1,
// 'meta_query' => [
// 'relation' => 'OR',
// [
//     'key' => '_wp_page_template',
//     'value' => 'page-templates/page-our-services-category.php',
// ],
// ]
// ]);

?>
<p class="pc__sidebar__header"><?= Lingo::get('label.filter_by_industry') ?>
</p>
<?php foreach ($industries as $industry) : ?>
    <a href="<?= get_the_permalink(40) . 'industry/' . $industry->term_id ?>" data-term-id="<?= $industry->term_id ?>" class="btn btn--grey btn--small our-work__industry <?= in_array($industry->term_id, $selectedCategories) ? 'active' : '' ?>">
        <?= $industry->name ?>
    </a>
<?php endforeach; ?>

<!--<p class="pc__sidebar__header last">-->
<!--    --><? //= Lingo::get('label.filter_by_service') 
            ?>
<!--</p>-->
<?php //foreach ($services as $service): 
?>
<!--<a href="--><? //=get_the_permalink(40) . 'service/' . $service-><!--//term_id 
                ?>-->
<!--"-->
<!--    data-term-id="--><? //=$service-><!--term_id 
                            ?>-->
<!--"-->
<!--    class="btn btn--grey btn--small our-work__service --><? //= in_array($service-><!--term_id, $selectedServices) ? 'active' : '' 
                                                                ?>-->
<!--">-->
<!--    --><? //= $service-><!--name 
            ?>-->
<!--</a>-->
<?php //endforeach;
