<?php
$background = get_field('sm_background', 'options');
$columns = get_field('sm_columns', 'options');
?>
<div class="mega-menu">
    <div class="container">
        <div class="row mega-menu__row">
            <div class="col-sm-4 mega-menu__col-left" style="background-image: url('<?= $background['url'] ?>')">
                <div class="wrapper">
                    <h1><?= get_the_title(getenv('PAGE_OUR_SERVICES')) ?></h1>
                    <a href="<?= get_permalink(getenv('PAGE_OUR_SERVICES')) ?>" class="btn btn--white">
                        <?= get_field('sm_button_label', 'options') ?>
                    </a>
                </div>
            </div>
            <div class="col-sm-8">
                <?php if ($columns): ?>
                    <div class="row">
                        <?php foreach ($columns as $column): ?>
                            <div class="col-sm-6 col-md-4">
                                <?php if ($column['links'] && count($column['links']) > 0): ?>
                                    <ul class="mega-menu__links">
                                        <?php foreach ($column['links'] as $link): ?>
                                            <li>
                                                <a href="<?= get_permalink($link['link']) ?>">
                                                    <?= $link['link']->post_title ?>
                                                    <span class="btn btn--square"></span>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>