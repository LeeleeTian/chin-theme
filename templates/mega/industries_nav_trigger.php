<?php
$background = get_field('industries_nav_background', 'options');

$industries = array_filter(get_categories([
    'taxonomy'   => 'true_case_study_tax',
    'hide_empty' => false
]), function ($item) {
    return get_field('hide_from_menu', $item) !== true;
});

$columns = array_chunk($industries, 5);

$industriesPageId = icl_object_id(getenv('PAGE_INDUSTRIES'), 'page', true, ICL_LANGUAGE_CODE);

?>
<div class="mega-menu">
    <div class="container">
        <div class="row mega-menu__row">
            <div class="col-sm-4 mega-menu__col-left" style="background-image: url('<?= $background['url'] ?>')">
                <div class="btn-wrapper wrapper">
                    <a href="<?= get_permalink($industriesPageId) ?>" class="btn btn--white">
                        <?= get_field('industries_button_label', 'options') ?>
                    </a>
                </div>
            </div>
            <div class="col-sm-8">
                <?php if ($columns): ?>
                    <div class="row">
                        <?php foreach ($columns as $column): ?>
                            <div class="col-sm-6 col-md-4">
                                <ul class="mega-menu__links">
                                    <?php foreach ($column as $industry): ?>
                                        <li>
                                            <a href="#"
                                               data-href="<?= get_permalink($industriesPageId) ?>#i-<?= $industry->term_id ?>"
                                               data-control="scroll-to"
                                               data-target="#industry-<?= $industry->term_id ?>"
                                               data-offset-top="150"
                                               class="industires-mega-link">
                                                <?= $industry->name ?>
                                                <span class="btn btn--square"></span>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>