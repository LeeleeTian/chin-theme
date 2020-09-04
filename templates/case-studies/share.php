<?php
$link = get_field('cs_link')
?>

<div class="container">
    <div class="cs__share">
        <div class="row">
            <div class="col-sm-4 col-md-offset-2 text-center-sm">
                <div class="wrapper">
                    <?php if ($link): ?>
                        <a href="<?= $link ?>" target="_blank" class="cs__share__more">
                            <?= Lingo::get('label.view_live_case_study') ?> <span class="btn btn--square"></span>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-sm-8 col-md-4 text-right text-center-sm">
                <div class="wrapper">
                    <span class="cs__share__label"><?= Lingo::get('label.share_this') ?></span>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?= get_permalink() ?>" target="_blank" class="cs__share__btn facebook">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a href="https://twitter.com/intent/tweet?url=<?= get_permalink() ?>" target="_blank" class="cs__share__btn twitter">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?= get_permalink() ?>" target="_blank" class="cs__share__btn linkedin">
                        <i class="fa fa-linkedin"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>