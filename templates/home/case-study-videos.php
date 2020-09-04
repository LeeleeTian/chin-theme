<?php
$label = get_field('view_work_label');
$caseStudy1 = get_field('case_study_1')[0];
$caseStudy2 = get_field('case_study_2')[0];
$link = get_field('view_work_link');
$linkText = get_field('view_work_link_text');
$image = get_field('view_work_image');
if (get_field('enable_view_work')) :
?>
<div class="container case-study-video">
    <div class="col-12 case-study-video__wrapper">
        <div class="case-study-video__videos">
            <div class="case-study__1">
                <div class="case-study__top" style="background-image: url(<?= get_field('cs_background', $caseStudy1)['url'] ?>)">
                    <div class="overlay"></div>
                    <div class="play-link-wrapper">
                        <a href="<?= get_field('cs_video', $caseStudy1); ?>" class="play-link" data-video-popup>
                            <i class="fa fa-play icon"></i>
                            <span>Play Video</span>
                        </a>
                    </div>
                </div>
                <div class="case-study__bottom">
                    <h4 class="business-name"><?= $caseStudy1->post_title ?></h4>
                    <p class="client-name"><?= get_field('cs_client_name', $caseStudy1) ?></p>
                </div>
            </div>
            <div class="case-study__2">
                <div class="case-study__top" style="background-image: url(<?= get_field('cs_background', $caseStudy2)['url'] ?>)">
                    <div class="overlay"></div>
                    <div class="play-link-wrapper">
                        <a href="<?= get_field('cs_video', $caseStudy2); ?>" class="play-link" data-video-popup>
                            <i class="fa fa-play icon"></i>
                            <span>Play Video</span>
                        </a>
                    </div>
                </div>
                <div class="case-study__bottom">
                    <h4 class="business-name"><?= $caseStudy2->post_title ?></h4>
                    <p class="client-name"><?= get_field('cs_client_name', $caseStudy2) ?></p>
                </div>
            </div>
        </div>
        <div class="case-study-video__image">
            <div class="wrapper">
                <img class="image" src="<?= $image['url']; ?>" alt="<?= $image['alt']; ?>">
                <div class="overlay"></div>
            </div>
        </div>
        <div class="case-study-video__content">
            <div class="wrapper">
                <h2 class="heading"><?= $label ?></h2>
                <div style="margin-left: auto;">
                    <a href="<?= $link ?>" class="btn btn--red"><?= $linkText ?></a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
