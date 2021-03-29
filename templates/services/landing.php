<?php
$services = get_children([
    'post_parent' => get_post()->ID,
    'post_type'   => 'page',
    'orderby'     => 'menu_order',
    'order'       => 'ASC',
    'post_status' => 'publish'
]);

?>
<div class="services">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <?php foreach ($services as $service) : ?>
                    <div class="services__service">
                        <div class="row services__service__top">
                            <div class="col-sm-5">
                                <a class="heading-red" href="<?= get_permalink($service) ?>"><?= get_field('services_header', $service) ?></a>
                                <h3><?= get_field('services_subheader', $service) ?></h3>
                            </div>
                            <div class="col-sm-7 services__service__image-wrapper">
                                <img src="<?= get_field('services_background', $service) ?>" alt="" class="services__service__image img-responsive">
                            </div>
                        </div>
                        <div class="row services__service__bottom">
                            <div class="col-lg-5 services__service__description">
                                <?= get_field('services_description', $service) ?>
                                <p class="services__service__more">
                                    <a href="<?= get_permalink($service) ?>">
                                        <?= Lingo::get('label.find_out_more') ?> <span class="btn btn--square"></span>
                                    </a>
                                </p>
                            </div>
                            <div class="col-md-3 services__service__case-studies">
                                <?php
                                $separtor = '?';
                                if (ICL_LANGUAGE_CODE != 'en') {
                                    $separtor = '&';
                                }
                                ?>
                                <a href="<?= get_permalink(getenv('PAGE_OUR_WORK')) ?><?= $separtor ?>services=<?= $service->ID ?>">
                                    <?php
                                    if (ICL_LANGUAGE_CODE != 'en') {
                                        $pageId = icl_object_id($service->ID, 'page', true, 'en');
                                    } else {
                                        $pageId = $service->ID;
                                    }

                                    $label = Lingo::get('label.case_study_' . $pageId);
                                    if ($label === null) {
                                        $label = 'See our ' . $service->post_title . ' Case Studies';
                                    }
                                    echo $label;
                                    ?>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?= View::make('services/footer') ?>
            </div>
        </div>
    </div>
</div>
