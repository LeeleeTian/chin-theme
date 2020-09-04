<div class="quote-banner">
    <div class="wrapper">
        <div class="col-md-6">
            <p class="quote-banner__content"><?= strip_tags(Lingo::get('label.request_quote')) ?></p>
        </div>
        <div class="col-md-6 text-right text-center-sm">
            <a href="<?= get_permalink(getenv('PAGE_CONTACT')) ?>" class="btn btn--white"><?= Lingo::get('label.get_free_quote') ?></a>
        </div>
    </div>
</div>