<!DOCTYPE html>
<html>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title><?php wp_title( '|', true, 'right' ); ?></title>
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  
  <link rel="icon" type="image/png" href="<?php echo home_url( '/' ); ?>favicon-32x32.png" sizes="32x32" />
  <link rel="icon" type="image/png" href="<?php echo home_url( '/' ); ?>favicon-16x16.png" sizes="16x16" />
  
  <?php wp_head(); ?>
  
  <!-- Facebook Remarketing Pixel -->
  <script>
    (function() {
      var _fbq = window._fbq || (window._fbq = []);
      if (!_fbq.loaded) {
        var fbds = document.createElement('script');
        fbds.async = true;
        fbds.src = '//connect.facebook.net/en_US/fbds.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(fbds, s);
        _fbq.loaded = true;
      }
      _fbq.push(['addPixelId', '819002998153413']);
    })();
    window._fbq = window._fbq || [];
    window._fbq.push(['track', 'PixelInitialized', {}]);
  </script>
  <noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?id=819002998153413&amp;ev=PixelInitialized" /></noscript>
  
</head>

<body <?php body_class(); ?>>

  <div id="page">

    <header id="masthead">
    
      <div class="container">
    
        <a id="masthead-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.svg" />
        </a>

        <a id="masthead-mobile-menu-icon" href="#"><i class="fa fa-bars"></i></a>
        <nav id="masthead-navigation">
          <?php if( is_user_logged_in() ) : ?>
            <?php wp_nav_menu( array( 'menu' => 'logged-in' ) ); ?>
          <?php else : ?>
            <?php wp_nav_menu( array( 'menu' => 'logged-out' ) ); ?>
          <?php endif; ?>
        </nav>
        
      </div><!-- .container -->
      
    </header><!-- #masthead -->

    <div id="main">
  