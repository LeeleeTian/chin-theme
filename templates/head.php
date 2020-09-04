<!DOCTYPE html>
<!--[if IE 7]>
<html class="no-js ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="no-js ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 9]>
<html class="no-js ie ie9" <?php language_attributes(); ?>>
<![endif]-->
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) | !(IE 9)  ]><!-->
<html class="no-js" <?php language_attributes(); ?>>
<!--<![endif]-->
	<head>
		<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-PJNHVN5');</script>

        <script type="text/javascript">
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'AW-959679486/iWQOCLXfoYkBEP6XzskD', {
                'phone_conversion_number': '+61 3 8602 6300'
            });
            gtag('config', 'AW-959679486/o114CPOsr4kBEP6XzskD', {
              'phone_conversion_number': '1300 792 446'
            });
        </script>
		<!-- End Google Tag Manager -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title><?php wp_title('|', true, 'right'); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<link rel="icon" href="<?= TrueLib::getImageURL('favicon.png') ?>">
		<?php wp_head(); ?>
		<!--[if IE 8]>
		<script type="text/javascript" src="<?= bloginfo('template_url') ?>/assets/vendor/respond.min.js"></script>
        <![endif]-->
		<script>
		function gtag_report_conversion(url) {
		  var callback = function () {
		    if (typeof(url) != 'undefined') {
		      window.location = url;
		    }
		  };
		  gtag('event', 'conversion', {
		      'send_to': 'AW-959679486/8LzlCP6Px4kBEP6XzskD',
		      'transaction_id': '',
		      'event_callback': callback
		  });
		  return false;
		}
		</script>
        <!--Start of Zendesk Chat Script-->
        <script type="text/javascript">
        window.$zopim||(function(d,s){var z=$zopim=function(c){
        z._.push(c)},$=z.s=
        d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
        _.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute('charset','utf-8');
        $.src='https://v2.zopim.com/?5zJPcewle5h7dLtLG3FCP1vUJ2hEKnse';z.t=+new Date;$.
        type='text/javascript';e.parentNode.insertBefore($,e)})(document,'script');
        </script>
        <!--End of Zendesk Chat Script-->
	</head>
