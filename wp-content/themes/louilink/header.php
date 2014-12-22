<?php

$debug_class = (!empty($_REQUEST['debug'])) ? ' debug' : '';

?><!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php wp_title(' | ', true, 'right'); ?><?php bloginfo('name'); ?></title>
    <link href="//fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet" type="text/css">
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/css/normalize.css" rel="stylesheet" type="text/css">
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/css/style.css" rel="stylesheet" type="text/css">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-5P78PF"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5P78PF');</script>
<!-- End Google Tag Manager -->

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-48524824-1', 'auto');
  ga('send', 'pageview');

</script>
    <div class="page<?php echo $debug_class; ?>">

        <header id="page-header" class="page-header">
            <nav class="social-media">
                <div class="container">
                    <ul>
                        <li class="facebook"><a href="http://facebook.com/louilink">Facebook</a></li>
                        <li class="google-plus"><a target="_blank" href="https://plus.google.com/b/102125200569166655661/+Louilink/posts">Google+</a></li>
                        <li class="youtube"><a target="_blank" href="https://www.youtube.com/user/TheLouilink">Youtube</a></li>
                        <li class="twitter"><a target="_blank" href="http://twitter.com/louilink">Twitter</a></li>
                    </ul>
                </div>
            </nav>

            <div class="page-header-main">
                <div class="container">
                    <a class="branding" href="/">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png" alt="<?php echo get_bloginfo('name'); ?>">
                    </a>

                    <nav class="primary-nav clearfix">
                        <?php wp_nav_menu(array('depth' => 1, 'menu' => 'Primary Nav' )); ?>
                    </nav>
                </div>
            </div>

            <?php if ($primary_nav_subs = louilink_get_primary_nav_subs()) : ?>
                <?php echo louilink_render_view('primary-nav-subs', array('primary_nav_subs' => $primary_nav_subs)); ?>
            <?php endif; ?>
        </header>