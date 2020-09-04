<p class="pc__sidebar__header"><?= Lingo::get('label.faq_categories') ?></p>
<ul class="faq__categories">
    <?php foreach ($categories as $category): ?>
        <li>
            <a href="<?= get_category_link($category->term_id) ?>" <?= $categoryId == $category->slug ? 'class="active"' : ''?>>
                <?= $category->name ?>
                <span class="btn btn--square"></span>
            </a>
        </li>
    <?php endforeach; ?>
</ul>
