<?php
if (!isset($post)) {
    $post = get_post();
}
$ancestors = get_post_ancestors($post);
array_walk($ancestors, function (&$item) {
    $item = get_post($item);
});
$ancestors = array_reverse($ancestors);

if (!isset($title)) {
    $title = $post->post_title;
}
$backgroundImage = $image['url'];
?>
<div class="top-banner">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if (isset($is_show)&& $is_show): ?>
                    <div class="d-flex">
                        <div class="flex-item video-text service" style="background-color: <?= $bg_color ?>">
                            <?= $bg_text ?>
                        </div>
                        <div class="flex-item">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= $youtube ?>?rel=0&modestbranding=1&loop=1&playlist=<?= $youtube ?>" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="top-banner__image" style="background-image: url('<?= $backgroundVideo ? '' : $backgroundImage ?>');">
                    <?php if (isset($breadcrumbs)): ?>
                        <?= $breadcrumbs ?>
                    <?php else: ?>
                        <ul class="top-banner__breadcrumbs">
                            <?php foreach ($ancestors as $k => $ancestor): ?>
                                <li>
                                    <a href="<?= get_permalink($ancestor) ?>"><?= $ancestor->post_title ?></a>
                                </li>
                            <?php endforeach; ?>
                            <?php if (!isset($skipBreadcrumbsTitle) || $skipBreadcrumbsTitle === false): ?>
                                <li>
                                    <?= $title ?>
                                </li>
                            <?php endif; ?>
                        </ul>
                    <?php endif; ?>
                    <h1 class="top-banner__title"><?= $title ?></h1>
                    <?php if (isset($categories)): ?>
                        <?= $categories ?>
                    <?php endif; ?>
                    <?php if (isset($header)): ?>
                        <p class="top-banner__header"><?= $header ?></p>
                    <?php endif; ?>
                    <div class="top-banner__overlay"></div>
                    <?php if ($video) : ?>
                    <div class="top-banner__play-link">
                        <a href="<?= $video ?>" class="play-link" data-video-popup>
                            <i class="fa fa-play icon"></i>
                            <span>Play Video</span>
                        </a>
                    </div>
                    <?php endif; ?>
                    <?php if ($backgroundVideo) : ?>
                    <div class="top-banner__background-video">
                        <video class="video" autoplay loop muted poster="<?= $image['url'] ?>">
                            <source src="<?= $backgroundVideo['url'] ?>" type="<?= $backgroundVideo['mime_type'] ?>" />
                        </video>
                    </div>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
