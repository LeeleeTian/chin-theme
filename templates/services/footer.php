<?php
$content = get_field('work_long_content', 'options');
$link = get_field('work_link', 'options');
?>
<?php if ($content && $link): ?>
    <div class="services__footer">
        <h2 class="heading-red services__footer__title"><?= Lingo::get('label.our_work-case_studies') ?></h2>
        <p class="services__footer__content"><?= $content ?></p>
        <a href="<?= $link ?>" class="btn btn--square"></a>
    </div>
<?php endif; ?>