<!DOCTYPE html>
<html>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title><?php wp_title( '|', true, 'right' ); ?></title>
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  
  <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32" />
  <link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16" />
  
  <?php wp_head(); ?>
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
  