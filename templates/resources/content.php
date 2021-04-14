<!-- resources Unit page -->

<ul class="resources__list">

    <?= View::make('resources/items', ['posts' => $posts]) ?>
</ul>
<?php if ($total > 4) : ?>
    <div class="row resources__pagination">
        <a class="text-center" href="2" data-href="<?= esc_url(admin_url('admin-ajax.php')) ?>">
            <span class="resources__pagination__label"><?= Lingo::get('label.load_more') ?></span>
            <span class="resources__pagination__loader hide"><?= Lingo::get('label.loading') ?></span>
        </a>
    </div>
<?php endif; ?>