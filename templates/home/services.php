<?php
$langBg = get_field('language_services_background', 'options');
$langVid = get_field('language_services_video', 'options');
$langVidBg = get_field('language_services_video_bg', 'options');
$langLink = get_post_meta(get_field('language_service_nav_trigger', 'options'), '_menu_item_object_id', true);

$mrkBg = get_field('marketing_services_background', 'options');
$mrkVid = get_field('marketing_services_video', 'options');
$mrkVidBg = get_field('marketing_services_video_bg', 'options');
$mrkLink = get_post_meta(get_field('marketing_service_nav_trigger', 'options'), '_menu_item_object_id', true);

$left_v = get_field('left_video','options');
$right_v = get_field('right_video','options');
$left_t = get_field('left_title','options');
$right_t = get_field('right_title','options');
$left_l = get_field('left_link','options');
$right_l = get_field('right_link','options');

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
                <?php if ($langVid && false ) : ?>
                <div class="play-link-wrapper">
                    <a href="<?= $langVid ?>" class="play-link red" data-video-popup>
                        <i class="fa fa-play icon"></i>
                        <span>Play Video</span>
                    </a>
                </div>
                <?php endif; ?>
                <div class="tile-bg-wrapper tile-bg-wrapper--left">
                    <?php if ($left_v) : ?>
                    <div class="tile-bg-video-wrap">
                        <video class="tile-bg-video video" width="100%" loop controls poster="<?= $langBg ? $langBg['sizes']['large'] : '' ?>">
                            <source src="<?= $left_v['url'] ?>" type="<?= $left_v['mime_type'] ?>" />
                        </video>
                    </div>
                    <?php else: ?>
                    <div class="image" style="background-image: url('<?= $langBg ? $langBg['sizes']['large'] : '' ?>')"></div>
                    <?php endif; ?>
                </div>
                <div class="tile-text tile-text--left">
                    <div class="tile-text__inner">
                        <h3 class="tile-title"><?= $left_t ?></h3>
                        <a href="<?= $left_l ?>" class="tile-link tile-link--red">View <i class="icon-right icon-right--red icon-right--hover--white"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6  home__services__tiles--right">
                <?php if ($mrkVid && false ) : ?>
                <div class="play-link-wrapper">
                    <a href="<?= $mrkVid ?>" class="play-link red" data-video-popup>
                        <i class="fa fa-play icon"></i>
                        <span>Play Video</span>
                    </a>
                </div>
                <?php endif; ?>
                <div class="tile-bg-wrapper tile-bg-wrapper--right">
                    <?php if ($right_v) : ?>
                    <div class="tile-bg-video-wrap">
                        <video class="tile-bg-video video" width="100%" controls loop poster="<?= $mrkBg ? $mrkBg['sizes']['large'] : '' ?>">
                            <source src="<?= $right_v['url'] ?>" type="<?= $right_v['mime_type'] ?>" />
                        </video>
                    </div>
                    <?php else: ?>
                    <div class="image" style="background-image: url('<?= $mrkBg ? $mrkBg['sizes']['large'] : '' ?>')"></div>
                    <?php endif; ?>
                </div>
                <div class="tile-text tile-text--right">
                    <div class="tile-text__inner">
                        <h3 class="tile-title"><?= $right_t ?></h3>
                        <a href="<?= $right_l ?>" class="tile-link tile-link--purple">View <i class="icon-right  icon-right--purple icon-right--hover--white"></i></a>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
