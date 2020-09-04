<?php
$langBg = get_field('language_services_background', 'options');
$langLink = get_post_meta(get_field('language_service_nav_trigger', 'options'), '_menu_item_object_id', true);

$mrkBg = get_field('marketing_services_background', 'options');
$mrkLink = get_post_meta(get_field('marketing_service_nav_trigger', 'options'), '_menu_item_object_id', true);

?>

<div class="mega-menu services-landing" >
    <div class="container">
        <div class="row mega-menu__row mega-menu--serivces">
            <div class="col-sm-6">
                <div class="tile-wrapper tile-wrapper--left" style="background-image: url('<?= $langBg ? $langBg['sizes']['large'] : '' ?>')">
                    <div class="tile-inner">
                        <h3 class="tile-title"><?= get_the_title($mrkLink) ?></h3>
                        <a href="<?= get_the_permalink($langLink) ?>" class="tile-link tile-link--red">View <i class="icon-right icon-right--white icon-right--hover--red"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="tile-wrapper tile-wrapper--right" style="background-image: url('<?= $mrkBg ? $mrkBg['sizes']['large'] : '' ?>')">
                    <div class="tile-inner">
                        <h3 class="tile-title"><?= get_the_title($mrkLink) ?></h3>
                        <a href="<?= get_the_permalink($mrkLink) ?>" class="tile-link tile-link--purple">View <i class="icon-right icon-right--white icon-right--hover--purple"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
