<?php
$promoted = get_field('footer_promoted_page', 'options');
$addresses = array_slice(get_field('addresses', 'options'), 0, 2);
?>
<footer class="footer">
    <div class="container">
        <div class="footer__newsletter">
            <div class="row">
                <div class="col-md-3">
                    <div class="footer__newsletter__text text-center-xs text-center-sm">
                        <h3 class="footer__newsletter__header"><?= get_field('footer_newsletter_header', 'options') ?></h3>
                        <p class="footer__newsletter__subtext"><?= get_field('footer_newsletter_subtext', 'options') ?></p>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="footer__newsletter__form text-center-sm">
                        <?= View::make('form/newsletter') ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer__twitter">
            <div class="row">
                <div class="col-md-3">
                    <p class="footer__twitter__label"><?= $promoted->post_title ?></p>
                    <div class="footer__twitter__promoted">
                        <?= get_field('page_excerpt', $promoted->ID) ?>
                        <a href="<?= get_permalink($promoted->ID) ?>">
                            <?= Lingo::get('label.read_more') ?> <span class="btn btn--square"></span>
                        </a>
                    </div>
                </div>
                <?= View::make('footer/twitter') ?>
            </div>
        </div>
        <div class="footer__logo">
            <div class="row">
                <div class="col-md-2 col-xl-1 text-center-sm text-center-xs">
                    <a href="<?php echo home_url(); ?>/">
                        <img class="logo img-responsive" src="<?= TrueLib::getImageUrl('footer-logo-25.png') ?>" alt="<?php bloginfo('name'); ?>">
                    </a>
                </div>
                <div class="col-md-6 text-center-sm  text-center-xs">
                    <?php foreach ($addresses as $k => $address): ?>
                        <a href="<?= get_permalink(getenv('PAGE_CONTACT')) ?>" class="footer__logo__office office_<?= $k ?>"><?= $address['header'] ?></a>
                    <?php endforeach; ?>
                </div>
                <div class="col-md-4 col-xl-5 text-right text-center-sm text-center-xs">
                    <?= View::make('social/icons', [
                        'icons' => get_field('social_accounts', 'options')
                    ]) ?>
                </div>
            </div>
        </div>
        <div class="footer__copy">
    	    <div class="row">
                <div class="col-sm-6 text-center-xs">
                    <div class="copy">
                        <?=TrueLib::getFooterCopyright() ?>
                        <?php wp_nav_menu(['menu' => 'footer_menu', 'menu_class' => 'footer__copy__menu']); ?>
                    </div>
                </div>
                <div class="col-sm-6 text-center-xs">
                    <div class="true-footer-block">
                        <a href="https://kongfuseo.com.au/" title="Web Design Melbourne" target="_blank">
                            <div class="normal-text">
                                <img src="<?= TrueLib::getImageURL('common/seo-company.png?b=3') ?>" alt="Kongfuseo" class="retina-image" width="20" height="20" />
                            </div>
                            <div class="hover-text">kongfuseo.com.au</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
