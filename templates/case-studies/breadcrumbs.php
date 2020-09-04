<ul class="top-banner__breadcrumbs">
    <li><a href="/"><?= Lingo::get('label.home') ?></a></li>
    <li><a href="<?= get_permalink(getenv('PAGE_OUR_WORK')) ?>"><?= Lingo::get('label.our_work') ?></a></li>
    <li><?= get_the_title() ?></li>
</ul>