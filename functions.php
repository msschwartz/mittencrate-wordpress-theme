<?php



/**
 * Set up theme defaults and registers support for various WordPress features.
 */
function mittencrate2014_setup() {

  // This theme styles the visual editor to resemble the theme style.
  //add_editor_style( array( 'css/editor-style.css', twentyfourteen_font_url() ) );

  // Enable support for Post Thumbnails
  add_theme_support( 'post-thumbnails' );
  set_post_thumbnail_size( 900, 528, true );
  
  // home-page-box is used for the blog tiles
  add_image_size( 'home-page-box', 600, 300 );

  // This theme uses wp_nav_menu() in two locations.
  register_nav_menus( array(
    'primary' => 'Primary Menu',
  ) );
  
}
add_action( 'after_setup_theme', 'mittencrate2014_setup' );




function add_featured_image_instruction( $content ) {
    return $content .= '<p>Please use resolution: 900 x 528</p>';
}
add_filter( 'admin_post_thumbnail_html', 'add_featured_image_instruction');




function mittencrate2014_widgets_init() {
  register_sidebar( array(
    'name' => 'Post Sidebar',
    'id' => 'post-sidebar',
    'description' => 'Appears on posts',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3><hr />',
  ) );
}
add_action( 'widgets_init', 'mittencrate2014_widgets_init' );




/**
 * Enqueue scripts and styles for the front end.
 */
function mittencrate2014_scripts() {
  
  $mitten_theme = wp_get_theme();
  
  // Fonts
  $fontsUri ='http://fonts.googleapis.com/css?family=Montserrat:400,700|Pacifico|Open+Sans:300italic,400italic,600italic,700italic,400,300,600,700';
  wp_enqueue_style( 'mittencrate2014-google-font', $fontsUri, array(), null );
  wp_enqueue_style( 'mittencrate2014-icon-font', get_stylesheet_directory_uri() . '/css/font-awesome.css', array(), null );
  
  // Slick carousel
  wp_enqueue_style( 'slick-caraousel-style', 'http://cdn.jsdelivr.net/jquery.slick/1.3.7/slick.css' );
  wp_enqueue_script( 'slick-caraousel-script', 'http://cdn.jsdelivr.net/jquery.slick/1.3.7/slick.min.js', array( 'jquery' ) );
  
  // Main stylesheet and script
  wp_enqueue_style( 'mittencrate2014-style', get_stylesheet_uri(), array(), $mitten_theme->get( 'Version' ) );
  wp_enqueue_style( 'mittencrate2014-home', get_stylesheet_directory_uri() . '/css/home.css', array(), $mitten_theme->get( 'Version' ) );
  wp_enqueue_style( 'mittencrate2014-shop', get_stylesheet_directory_uri() . '/css/shop.css', array(), $mitten_theme->get( 'Version' ) );
  wp_enqueue_style( 'mittencrate2014-blog', get_stylesheet_directory_uri() . '/css/blog.css', array(), $mitten_theme->get( 'Version' ) );
  
  wp_enqueue_script( 'mittencrate2014-functions', get_stylesheet_directory_uri() . '/js/functions.js', array( 'jquery' ) );
  
  // Menu script
  wp_enqueue_script( 'mittencrate2014-menu', get_stylesheet_directory_uri() . '/js/menu.js', array( 'jquery' ) );
  
  // blog javascript
  wp_enqueue_script( 'mittencrate2014-blog', get_stylesheet_directory_uri() . '/js/blog.js', array( 'jquery' ), '1.3' );
  wp_localize_script( 'mittencrate2014-blog', 'admin_ajax_url', admin_url( 'admin-ajax.php' ) );
  
  // home javascript
  wp_enqueue_script( 'mittencrate2014-home', get_stylesheet_directory_uri() . '/js/home.js', array( 'jquery' ), '1.4' );
  
}
add_action( 'wp_enqueue_scripts', 'mittencrate2014_scripts' );




/**
 * Blog uses ajax for grabbing posts.
 *
 * Response is an array of posts:
 * { url: "http://m.com/slug/", title: "My Title", date: "July 25, 2014", image_url: "http://m.com/image.jpg", views: 23 }
 */
function mittencrate2014_ajax_posts() {
  global $wpdb;
  $response = array();
  
  error_log('hello');
  error_log( print_r($_POST, true) );
  
  $args = array(
    'posts_per_page' => (empty($_POST['posts_per_page']) ? 10 : $_POST['posts_per_page']),
    'paged' => (empty($_POST['paged']) ? 1 : $_POST['paged'])
  );
  
  $the_query = new WP_Query( $args );
  
  if ( $the_query->have_posts() ) {
    
    while ( $the_query->have_posts() ) {
      $the_query->the_post();
      
      $image_url = get_stylesheet_directory_uri() . '/images/blog-no-image.jpg';
      $image_info = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'home-page-box' );
      if ( ! $image_info ) {
        $image_info = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
      }
      if ( $image_info ) {
        $image_url = $image_info[0];
      }
      
      $views = 0;
      if ( function_exists ( 'wpp_get_views' ) ) {
        $views = wpp_get_views( get_the_ID() );
      }
      
      $response[] = array(
        'url' => get_permalink(),
        'title' => get_the_title(),
        'date' => get_the_date(),
        'image_url' => $image_url,
        'views' => $views
      );
    }
    
  }
  
  wp_send_json( $response );
  die();
}
add_action( 'wp_ajax_nopriv_ajax_get_posts_action', 'mittencrate2014_ajax_posts' );
add_action( 'wp_ajax_ajax_get_posts_action', 'mittencrate2014_ajax_posts' );





// Accordion shortcode 
//
// [accordion title="title"]collapsable content here[/accordion]
//
function accordion_handler( $atts, $content = "" ) {
  $a = shortcode_atts( array(
    'title' => 'Title',
  ), $atts );
  
  $output  = '<div class="accordion">';
  $output .=  '<div class="accordion-title"><span>' . $a['title'] . '</span></div>';
  $output .=  '<div class="accordion-content"><span>' . do_shortcode($content) . '</span></div>';
  $output .= '</div>';
  
  return $output;
}
add_shortcode( 'accordion', 'accordion_handler' );





// Custom add to cart message
function mc_add_to_card_message( $message, $product_id ) {  
  return sprintf( '&quot;%s&quot; was successfully added to your cart.', get_the_title( $product_id ) );
}
add_filter( 'wc_add_to_cart_message' , 'mc_add_to_card_message', 10, 2 );



// Wrap cart table in a table-responsive container
function mc_start_table_responsive_wrapper() {
  echo '<div class="table-responsive">';
}
add_action( 'woocommerce_before_cart_table', 'mc_start_table_responsive_wrapper' );

function mc_end_table_responsive_wrapper() {
  echo '</div><!-- .table-responsive -->';
}
add_action( 'woocommerce_after_cart_table', 'mc_end_table_responsive_wrapper' );





/**
 * Displays navigation to next/previous set of posts when applicable.
 *
 * @return void
 */
function mittencrate2014_paging_nav($pages = false) {
  global $paged;

  if (empty($paged)) {
    $paged = 1;
  }

  // only get total pages if not set
  if (!$pages) {
    global $wp_query;
    
    $pages = $wp_query->max_num_pages;
    
    if (!$pages) {
      $pages = 1;
    }
  }

  // Don't print empty markup if there's only one page.
  if ( $pages < 2 ) {
    return;
  }

  ?>
  <div class="paging-navigation">
    
    <?php if ( $paged < $pages ) : ?>
    <div class="nav-previous">
      <a href="<?php echo get_pagenum_link($paged + 1); ?>">&larr; Older posts</a>
    </div>
    <?php endif; ?>

    <?php if ( $paged > 1 ) : ?>
    <div class="nav-next">
      <a href="<?php echo get_pagenum_link($paged - 1); ?>">Newer posts &rarr;</a>
    </div>
    <?php endif; ?>
      
  </div><!-- .navigation -->
  <?php
}



/**
 * Do not allow renewals for 3-month subscriptions.
 */
function mc_do_not_allow_3_month_renewals( $subscription_can_be_renewed, $subscription, $subscription_key, $user_id ) {
  if( $subscription['product_id'] == 3622 ) {
    return false;
  }
  else {
    return $subscription_can_be_renewed;
  }
}
add_filter( 'woocommerce_can_subscription_be_renewed', 'mc_do_not_allow_3_month_renewals', 100, 4);



/**
 * Use SMTP for sending emails
 */
// function mc_phpmailer_setup( $phpmailer ) {
//   error_log('mc_phpmailer_setup');
//   $phpmailer->isSMTP();
//   $phpmailer->Encoding = 'base64';
//   $phpmailer->Host = PHPMAILER_Host;
//   $phpmailer->Port = PHPMAILER_Port;
//   $phpmailer->SMTPAuth = PHPMAILER_SMTPAuth;
//   $phpmailer->Username = PHPMAILER_Username;
//   $phpmailer->Password = PHPMAILER_Password;
// }
// add_action( 'phpmailer_init', 'mc_phpmailer_setup' );



// global additions to ALL email footers
function mc_email_footer() {
  echo '<hr />';
  echo '<div>You can check the status of your orders by logging in to <a href="' . home_url('/my-account/') . '">your account</a>.</div>';
  echo '<div>If you have any questions please check our <a href="' . home_url('/faq/') . '">FAQ page</a>.</div>';
}
add_action( 'woocommerce_email_footer', 'mc_email_footer', 9 );

// show "Ships By" section in subscription order emails
function show_estimated_ship_date_new_subscription_orders_email( $order ) {  
  $item = array_pop( $order->get_items() );
  if ( $order->status == 'processing' && $item['name'] != 'Try or Gift' ) {
    echo '<h2>Estimated Shipment Date</h2>';
    echo '<p>Your package ships by: <strong>' . new_orders_next_subscription_ship_date( $order->order_date ) . '</strong>.</p>';
  }
}
add_action( 'woocommerce_email_after_order_table', 'show_estimated_ship_date_new_subscription_orders_email' );


// show next subscription ship date on view order page (for subscriptions)
function show_estimated_ship_date_under_view_order_for_subscriptions( $order_id ) {
  $order = wc_get_order( $order_id );
  $item = array_pop( $order->get_items() );
  if ( $order->status == 'processing' && $item['name'] != 'Try or Gift' ) {
    echo '<h2>Estimated Shipment Date</h2>';
    echo '<p>Your package ships by: <strong>' . new_orders_next_subscription_ship_date( $order->order_date ) . '</strong>.</p>';
  }
}
add_action( 'woocommerce_view_order', 'show_estimated_ship_date_under_view_order_for_subscriptions' );


// next subscription shipment date string
function new_orders_next_subscription_ship_date( $order_date ) {
  $date = new DateTime( $order_date );
  $day = intval( $date->format('d') );
  if ($day > 1) {
    $date->add( new DateInterval('P1M') );
  }
  return $date->format('F') . ' 15th';
}
