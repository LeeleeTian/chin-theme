<?php foreach ($posts as $post): ?>
    <div class="our-work__element">
        <div class="row our-work__element__top">
            <div class="col-md-6 col-lg-7">
                <h2 class="pc__content-heading"><?= $post->post_title ?></h2>
                <h3><?= get_field('cs_subheader', $post) ?></h3>
                <img src="<?= get_field('cs_client_logo', $post)['url'] ?>" alt="" class="our-work__element__logo img-responsive">
            </div>
            <div class="col-md-6 col-lg-5">
                <?php
                $video = get_field('cs_video', $post);
                if ($video) :
                ?>
                <div class="our-work__play-link">
                    <a href="<?= $video ?>" class="play-link red" data-video-popup>
                        <i class="fa fa-play icon"></i>
                        <span>Play Video</span>
                    </a>
                </div>
                <?php endif; ?>
                <div class="our-work__element__background">
                <?php if ($backgroundVideo = get_field('cs_background_video', $post)) : ?>
                    <video class="video" width="328" autoplay loop muted poster="<?= get_field('cs_background', $post)['url'] ?>">
                        <source src="<?= $backgroundVideo['url'] ?>" type="<?= $backgroundVideo['mime_type'] ?>" />
                    </video>
                <?php else : ?>
                    <img src="<?= get_field('cs_background', $post)['url'] ?>" alt="" class="img-responsive">
                <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="row our-work__element__bottom">
            <div class="col-md-6 col-lg-7">
                <p><?= get_field('cs_description', $post) ?></p>
                <a href="<?= get_permalink($post) ?>" class="our-work__element__more">
                    <?= Lingo::get('label.find_out_more') ?> <span class="btn btn--square"></span>
                </a>
            </div>
            <div class="col-md-6 col-lg-5">
                <p class="our-work__element__year"><b><?= Lingo::get('label.year') ?></b> <?= get_field('cs_year', $post) ?></p>
            </div>
        </div>
    </div>
<?php endforeach; ?>
