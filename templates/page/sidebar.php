<div class="pc__sidebar">
    <div class="pc__nav">
        <?php if (isset($header) && !empty($header)): ?>
            <p class="pc__sidebar__header"><?= $header ?></p>
        <?php endif; ?>

        <?php if (isset($menu)): ?>
            <?= $menu ?>
        <?php endif; ?>

        <?php if (isset($services) && is_array($services)): ?>
            <?php foreach ($services as $service): ?>
                <a href="<?= get_permalink($service) ?>"
                   class="services__individual__sidebar__link col-md-12 col-sm-6"
                   style="background-image: url('<?= get_field('menu_background', $service)['url'] ?>');">
                    <?= $service->post_title ?>
                </a>
            <?php endforeach; ?>
            <div class="clearfix"></div>
        <?php endif; ?>

        <?php if (isset($workContent) && isset($workLink)): ?>
            <div class="pc__sidebar__work">
                <p class="pc__sidebar__work__header"><?= Lingo::get('label.our_work-case_studies') ?></p>
                <p class="pc__sidebar__work__content">
                    <?= $workContent ?>
                    <a href="<?= $workLink ?>" class="btn btn--white">
                        <?= Lingo::get('label.view_case_studies') ?>
                    </a>
                </p>
            </div>
        <?php endif; ?>

        <?php if (isset($phone) || isset($internationalPhone) || isset($fax) || isset($email)): ?>
            <div class="pc__sidebar__section">
                <?php if (isset($phone)): ?>
                    <div class="pc__sidebar__section__wrapper phone col-xs-12 col-sm-6 col-md-12">
                        <p class="pc__sidebar__section__header"><?= Lingo::get('label.telephone') ?></p>
                        <p class="pc__sidebar__section__content">
                            <a href="tel:<?= $phone ?>"><?= $phone ?></a>
                        </p>
                    </div>
                <?php endif; ?>
                <?php if (isset($internationalPhone)): ?>
                    <div class="pc__sidebar__section__wrapper phone col-xs-12 col-sm-6 col-md-12">
                        <p class="pc__sidebar__section__header"><?= Lingo::get('label.international_telephone') ?></p>
                        <p class="pc__sidebar__section__content">
                            <a href="tel:<?= $internationalPhone ?>"><?= $internationalPhone ?></a>
                        </p>
                    </div>
                <?php endif; ?>
                <?php if (isset($fax)): ?>
                    <div class="pc__sidebar__section__wrapper fax col-xs-12 col-sm-6 col-md-12">
                        <p class="pc__sidebar__section__header"><?= Lingo::get('label.fax') ?></p>
                        <p class="pc__sidebar__section__content">
                            <?= $fax ?>
                        </p>
                    </div>
                <?php endif; ?>
                <?php if (isset($email)): ?>
                    <div class="pc__sidebar__section__wrapper email col-xs-12 col-sm-6 col-md-12">
                        <p class="pc__sidebar__section__header"><?= Lingo::get('label.email') ?></p>
                        <p class="pc__sidebar__section__content">
                            <a href="mailto:<?= $email ?>"><?= $email ?></a>
                        </p>
                    </div>
                <?php endif; ?>
                <div class="clearfix"></div>
            </div>
        <?php endif; ?>

        <?php if (isset($addresses) && is_array($addresses)): ?>
            <div class="pc__sidebar__section">
                <?php foreach ($addresses as $address): ?>
                    <div class="pc__sidebar__section__wrapper address col-xs-12 col-sm-6 col-md-12">
                        <p class="pc__sidebar__section__header"><?= $address['header'] ?></p>
                        <p class="pc__sidebar__section__content">
                            <?= $address['address'] ?>
                        </p>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if (isset($social) && $social === true): ?>
            <div class="pc__sidebar__section">
                <div class="pc__sidebar__section__wrapper">
                    <p class="pc__sidebar__section__header"><?= Lingo::get('label.social_media') ?></p>
                    <p class="pc__sidebar__section__content">
                        <?= View::make('social/icons', [
                            'icons' => get_field('social_accounts', 'options')
                        ]) ?>
                    </p>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>