<?php
$langBg = get_field('language_services_background', 'options');
$langVid = get_field('language_services_video', 'options');
$langVidBg = get_field('language_services_video_bg', 'options');
$langLink = get_post_meta(get_field('language_service_nav_trigger', 'options'), '_menu_item_object_id', true);

$mrkBg = get_field('marketing_services_background', 'options');
$mrkVid = get_field('marketing_services_video', 'options');
$mrkVidBg = get_field('marketing_services_video_bg', 'options');
$mrkLink = get_post_meta(get_field('marketing_service_nav_trigger', 'options'), '_menu_item_object_id', true);
?>
<div class="home__services">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="heading-red"><?= Lingo::get('label.our_services') ?></h2>
            </div>
        </div>
        <div class="row home__services__tiles">
            <div class="col-sm-6 home__services__tiles--left">
                <?php if ($langVid) : ?>
                <div class="play-link-wrapper">
                    <a href="<?= $langVid ?>" class="play-link red" data-video-popup>
                        <i class="fa fa-play icon"></i>
                        <span>Play Video</span>
                    </a>
                </div>
                <?php endif; ?>
                <div class="tile-bg-wrapper tile-bg-wrapper--left">
                    <?php if ($langVidBg) : ?>
                    <div class="tile-bg-video-wrap">
                        <video class="tile-bg-video video" width="328" autoplay loop muted poster="<?= $langBg ? $langBg['sizes']['large'] : '' ?>">
                            <source src="<?= $langVidBg['url'] ?>" type="<?= $langVidBg['mime_type'] ?>" />
                        </video>
                    </div>
                    <?php else: ?>
                    <div class="image" style="background-image: url('<?= $langBg ? $langBg['sizes']['large'] : '' ?>')"></div>
                    <?php endif; ?>
                </div>
                <div class="tile-text tile-text--left">
                    <div class="tile-text__inner">
                        <h3 class="tile-title"><?= get_the_title($langLink); ?></h3>
                        <a href="<?= get_the_permalink($langLink) ?>" class="tile-link tile-link--red">View <i class="icon-right icon-right--red icon-right--hover--white"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6  home__services__tiles--right">
                <?php if ($mrkVid) : ?>
                <div class="play-link-wrapper">
                    <a href="<?= $mrkVid ?>" class="play-link red" data-video-popup>
                        <i class="fa fa-play icon"></i>
                        <span>Play Video</span>
                    </a>
                </div>
                <?php endif; ?>
                <div class="tile-bg-wrapper tile-bg-wrapper--right">
                    <?php if ($mrkVidBg) : ?>
                    <div class="tile-bg-video-wrap">
                        <video class="tile-bg-video video" width="328" autoplay loop muted poster="<?= $mrkBg ? $mrkBg['sizes']['large'] : '' ?>">
                            <source src="<?= $mrkVidBg['url'] ?>" type="<?= $mrkVidBg['mime_type'] ?>" />
                        </video>
                    </div>
                    <?php else: ?>
                    <div class="image" style="background-image: url('<?= $mrkBg ? $mrkBg['sizes']['large'] : '' ?>')"></div>
                    <?php endif; ?>
                </div>
                <div class="tile-text tile-text--right">
                    <div class="tile-text__inner">
                        <h3 class="tile-title"><?= get_the_title($mrkLink); ?></h3>
                        <a href="<?= get_the_permalink($mrkLink) ?>" class="tile-link tile-link--purple">View <i class="icon-right  icon-right--purple icon-right--hover--white"></i></a>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
