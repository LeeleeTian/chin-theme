<?php
/**
 * Template Name: Contact
 */

$phone = get_field('contact_phone_number', 'options');
$internationalPhone = get_field('contact_international_phone_number', 'options');
$fax = get_field('contact_fax_number', 'options');
$email = get_field('contact_email_address', 'options');
$addresses = get_field('addresses', 'options');
?>
<?= View::make('page/top_banner', [
    'header' => get_field('top_banner_text'),
    'image' => get_field('top_banner_image'),
    'video' => get_field('top_banner_video'),
    'backgroundVideo' => get_field('top_banner_background_video')
]) ?>
<div class="pc">
    <div class="container">
        <div class="row">
            <div class="col-md-2 pc__grey grey1">&nbsp;</div>
            <div class="col-md-3 pc__grey grey2">
                <?= View::make('page/sidebar', [
                    'phone' => $phone,
                    'internationalPhone' => $internationalPhone,
                    'fax' => $fax,
                    'email' => $email,
                    'addresses' => $addresses,
                    'social' => true
                ]) ?>
            </div>
            <div class="col-md-9 col-lg-9 col-lg2-6">
                <div class="pc__content contact-form">
                    <?php
                        $enableTestimonial  = get_field('enable_contact_form_testimonial', 'options');
                        $testimonialHeading = get_field('testimonial_heading', 'options');
                        $testimonialContent = get_field('testimonial_content', 'options');
                        $testimonialAuthor  = get_field('testimonial_author', 'options');
                    ?>
                    <?php if ($enableTestimonial): ?>
                        <div class="contact-form-testimonial">
                            <h1><?= $testimonialHeading ?></h1>
                            <div class="contact-form-testimonial__block">
                                <q><?= $testimonialContent ?></q>
                                <div class="contact-form-testimonial__block-author"><?= $testimonialAuthor ?></div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php
                    if (ICL_LANGUAGE_CODE == 'zh-hans') {
                        echo do_shortcode('[contact-form-7 id="1732" title="Chinese Contact form"]');
                    } else {
                        echo do_shortcode('[contact-form-7 id="18" title="Contact form"]');
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php get_template_part('templates/map'); ?>
    </div>
</div>
