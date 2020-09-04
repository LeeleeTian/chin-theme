<form method="post" action="" data-action="<?= esc_url(admin_url('admin-ajax.php')) ?>" class="form-inline">
    <div class="col-md-12 footer__newsletter__thankyou">
        <h3><?= Lingo::get('label.newsletter_thanks') ?></h3>
    </div>
    <input type="hidden" name="action" value="newsletter_form">
    <div class="form-group col-md-3 col-sm-6">
        <input type="text" name="newsletter_firstname" class="form-control" placeholder="<?= Lingo::get('label.first_name') ?>">
        <small><?= Lingo::get('label.newsletter_firstname_error') ?></small>
    </div>
    <div class="form-group col-md-3 col-sm-6">
        <input type="text" name="newsletter_lastname" class="form-control" placeholder="<?= Lingo::get('label.last_name') ?>">
        <small><?= Lingo::get('label.newsletter_lastname_error') ?></small>
    </div>
    <div class="form-group col-md-3 col-sm-12">
        <input type="text" name="newsletter_mail" class="form-control" placeholder="<?= Lingo::get('label.email_address') ?>">
        <small><?= Lingo::get('label.newsletter_email_error') ?></small>
    </div>
    <div class="form-group col-md-3 col-sm-12">
        <button type="submit" class="btn btn--white"><?= Lingo::get('label.sign_up') ?></button>
    </div>
</form>