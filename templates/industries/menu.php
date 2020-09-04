<p class="pc__sidebar__header"><?= Lingo::get('label.industries') ?></p>
<ul class="industries__categories">
    <?php foreach ($categories as $category): ?>
        <li>
            <a data-control="scroll-to" data-target="#industry-<?= $category->term_id ?>" data-offset-top="150">
                <?= $category->name ?>
                <span class="btn btn--square"></span>
            </a>
        </li>
    <?php endforeach; ?>
</ul>