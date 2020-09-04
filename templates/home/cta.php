<?php
$email = get_field('contact_email_address', 'options');
?>
<div class="cta">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="cta__faq">
                    <div class="wrapper">
                        <p class="cta__header"><?= Lingo::get('label.faqs') ?></p>
                        <?php
                        if (ICL_LANGUAGE_CODE == 'en') {
                            $pageId = getenv('PAGE_FAQ');
                        } else {
                            $pageId = getenv('PAGE_CONTACT');
                        }
                        ?>
                        <a href="<?= get_permalink($pageId) ?>" class="btn btn--white"><?= Lingo::get('label.find_out_more') ?></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="cta__contact">
                    <div class="wrapper">
                        <p class="cta__header"><?= Lingo::get('label.call_us') ?> <?= get_field('contact_phone_number', 'options') ?></p>
                        <p class="cta__email"><a href="mailto:<?= $email ?>"><?= $email ?></a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="cta__image">
                    <div class="cta__image__img">
                        <div class="cta__image__overlay">
                            <p class="cta__image__header"><?= Lingo::get('label.request_quote') ?></p>
                            <a href="<?= get_permalink(getenv('PAGE_CONTACT')) ?>" class="btn btn--white"><?= Lingo::get('label.get_free_quote') ?></a>
                        </div>
                    </div>
                    <p class="cta__text"><?= Lingo::get('label.cta_footer') ?></p>
                </div>
            </div>
        </div>
    </div>
</div>