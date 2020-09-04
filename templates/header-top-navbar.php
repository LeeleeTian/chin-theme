<?= View::make('page/topbar') ?>
<header class="banner navbar navbar-default" role="banner">
	<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo home_url(); ?>">
                        <img src="<?= TrueLib::getImageUrl('logo-new.png') ?>" alt="<?php bloginfo('name'); ?>">
                    </a>
                </div>
                <nav class="collapse navbar-collapse" role="navigation">
                    <?= View::make('page/topbar') ?>
                    <?php
                    if (has_nav_menu('primary_navigation')) {
                        wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav main-menu'));
                    }
                    ?>
                    <div class="search-wrapper">
                        <form method="get" action="<?= home_url(); ?>" data-control="search-expander" data-expand-toggle="#searchExpandToggle">
                            <input type="hidden" name="lang" value="<?= ICL_LANGUAGE_CODE ?>">
                            <button type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                            <input type="search" name="s" placeholder="Search this site...">
                        </form>
                        <button type="button" id="searchExpandToggle">
                            <i class="fa fa-search"></i>
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </nav>
            </div>
        </div>
	</div>
</header>
