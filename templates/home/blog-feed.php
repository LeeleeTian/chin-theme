<?php
require get_template_directory() . '/vendor/autoload.php';
try {
    $feed = Zend\Feed\Reader\Reader::import(getenv('BLOG_FEED_URL'));
    $i = 0;
} catch (Exception $e) {
    $feed = null;
}
?>
<?php if ($feed !== null): ?>
    <div class="blog">
        <div class="container">
            <a href="<?= getenv('BLOG_URL') ?>" target="_blank" class="blog__more">
                <?= Lingo::get('label.view_more') ?>
                <span class="btn btn--square"></span>
            </a>
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="heading-red"><?= Lingo::get('label.chinsight_blog_feed') ?></h2>
                </div>
            </div>
            <div class="row blog__row">
                <?php foreach ($feed as $entry): ?>
                    <?php
                    if ($i > 2) {
                        break;
                    }
                    $i++;
                    ?>
                    <div class="col-lg-4 col-md-12">
                        <a class="blog__entry" href="<?= $entry->getLink() ?>" target="_blank">
                            <div class="blog__entry__content">
                                <p class="blog__entry__date"><?= $entry->getDateModified()->format('d.m.Y') ?></p>
                                <p class="blog__entry__title">
                                    <?= substr(strip_tags($entry->getTitle()), 0, 60) ?><?= strlen(strip_tags($entry->getTitle())) > 60 ? '...' : '' ?>
                                </p>
                                <p class="blog__entry__body">
                                    <?= substr(strip_tags($entry->getContent()), 0, 200) ?><?= strlen(strip_tags($entry->getContent())) > 200 ? '...' : '' ?>
                                </p>
                            </div>
                            <div class="wrapper">
                                <span class="blog__entry__more">
                                    <span class="blog__entry__more__label"><?= Lingo::get('label.read_more') ?></span>
                                </span>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
