<?php
$label = get_field('video_label');
$auto = get_field('auto_play_video');
$poster = get_field('auto_play_poster');
$video = get_field('video_url');
if (get_field('enable_video_banner')) :
?>
<div class="container play-banner">
    <div class="play-banner-wrapper">
        <div class="background-video">
            <?php if($auto) : ?>
            <video class="video" autoplay loop muted poster="<?= $poster ? $poster['url'] : '' ?>">
                <source src="<?= $auto['url'] ?>" type="<?= $auto['mime_type'] ?>" />
            </video>
            <?php elseif ($poster) : ?>
                <img class="image" src="<?php echo $poster['url']; ?>" />
            <?php endif; ?>
        </div>
        <div class="video-content" back>
            <h2 class="heading"><?= $label ?></h2>
            <a href="<?= $video ?>" class="play-link" data-video-popup>
                <i class="fa fa-play icon"></i>
                <span>Play Video</span>
            </a>
        </div>
    </div>
</div>
<?php endif; ?>
