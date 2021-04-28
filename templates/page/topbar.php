<?php
$phone = get_field('contact_phone_number', 'options');
$email = get_field('contact_email_address', 'options');
$lang = icl_get_languages('skip_missing=0');
?>
<div class="header__top">
    <div class="container">
        <div class="row mobile-box">
            <div class="col-sm-3 header-social text-center-sm text-center-xs">
                <?= View::make('social/icons', [
                    'icons' => get_field('social_accounts', 'options')
                ]) ?>
            </div>
            <div class="col-sm-9  header-contact text-right  text-center-sm text-center-xs">
                <ul class="header__top__contact">
                    <a href="<?= get_permalink(getenv('PAGE_CONTACT')) ?>" class="btn btn--transparent btn--red free-quote">
                        <p>
                            <?= Lingo::get('label.header_free_quote') ?>
                        </p>
                    </a>
                    <li class="header__top__contact--phone">
                        <a href="tel:<?= $phone ?>"><?= $phone ?></a>
                    </li>
                    <li class="header__top__contact--email">
                        <a href="mailto:<?= $email ?>"><?= $email ?></a>
                    </li>
                </ul>
                <span class="header__top__lang">
                    <?php if (ICL_LANGUAGE_CODE == 'en') : ?>
                        <a href="<?= isset($lang['zh-hans']) ? $lang['zh-hans']['url'] : '/?lang=zh-hans' ?>">中文</a>
                    <?php elseif (ICL_LANGUAGE_CODE == 'zh-hans') : ?>
                        <a href="<?= $lang['en']['url'] ?>">EN</a>
                    <?php endif; ?>
                </span>
            </div>
        </div>
    </div>
</div>