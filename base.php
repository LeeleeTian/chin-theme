<?php get_template_part('templates/head'); ?>
<body <?php body_class(ICL_LANGUAGE_CODE == 'zh-hans' ? 'lang-ch' : ''); ?>>
<?php if (Config::isProduction()): ?>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-1907795-1', 'auto');
        ga('send', 'pageview');
        ga('create', 'UA-91986137-1', 'auto', 'truetrack');
        ga('truetrack.send', 'pageview');
    </script>
<?php endif; ?>
  <!--[if lt IE 9]>
    <div class="alert alert-warning">
      <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'roots'); ?>
    </div>
  <![endif]-->

  <?php
    do_action('get_header');
    // Use Bootstrap's navbar if enabled in config.php
    get_template_part('templates/header-top-navbar');
  ?>

    <div class="wrap" role="document">
        <main class="main" role="main">
            <?php include roots_template_path(); ?>
        </main><!-- /.main -->
    </div><!-- /.wrap -->

  <?php get_template_part('templates/footer'); ?>

</body>
</html>
