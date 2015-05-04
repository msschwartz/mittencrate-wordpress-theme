<?php

$subscribeProduct = get_product( 24 );
$tryOrGiftProduct = get_product( 26 );

// if before the 15th, grab current month
// else, grab next month
$date = new DateTime();
$day = intval($date->format('d'));
if ($day >= 15) { 
  $date->add(new DateInterval('P1M'));
}

get_header(); ?>

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    
    <div id="shop-page">
    
      <div id="shop-header">
        
        <div class="container">
           
          <div id="shop-monthly-box" class="shop-box <?php if (!$subscribeProduct->is_in_stock()) echo 'sold-out'; ?>">
            <div class="bg-transparent-white">
              <h3>MONTHLY <span class="line-break"><br /></span>MEMBERSHIP</h3>
              <hr />
              <div class="shop-price">
                <sup>$</sup><span class="shop-price-dollars">35</span> <sup>/ Month</sup>
              </div>
              <div class="shop-description">Renews monthly, <span class="line-break"><br /></span>cancel anytime.</div>
              <div class="shop-description-fine-print">&nbsp;</div>
              <div><a href="<?php echo $subscribeProduct->add_to_cart_url(); ?>" class="button button-brown">Join Now</a></div>
              <div class="sold-out-overlay"></div>
            </div>
          </div>
          
          <div id="shop-one-time-box" class="shop-box <?php if (!$tryOrGiftProduct->is_in_stock()) echo 'sold-out'; ?>">
            <div class="bg-transparent-white">
              <h3>ONE-TIME <span class="line-break"><br /></span>ORDER</h3>
              <hr />
              <div class="shop-price">
                <sup>$</sup><span class="shop-price-dollars">35</span> <sup>+ Shipping</sup>
              </div>
              <div class="shop-description">Try or give as a gift.<span class="line-break"><br />&nbsp;</span></div>
              <div class="shop-description-fine-print" style="color:red">Backordered until <?php echo $date->format('F'); ?> 15th</div>
              <div><a onclick="return confirm('Backordered until <?php echo $date->format('F'); ?> 15th, are you sure?');" href="<?php echo $tryOrGiftProduct->add_to_cart_url(); ?>" class="button button-brown">Get the Crate</a></div>
              <div class="sold-out-overlay"></div>
            </div>
          </div>
          
          <div class="clearfix"></div>
            
        </div><!-- .container -->
        
      </div><!-- #shop-header -->
      
      
      <div id="shop-content">
      
        <div class="container">
      
          <div id="shop-proudly-michigan" class="title-with-left-right-lines hidden-sm">
            <span class="line"></span>
            <h3>PROUDLY MICHIGAN</h3>
            <span class="line"></span>
          </div>
          
          <div class="row">
            <div class="col-md-6">
              <h3>MONTHLY MEMBERS</h3>
              <p>Each month you’ll receive a carefully curated selection of delicious foods, crafted in small batches by independent food producers from around the great state of Michigan.</p>
              <p class="no-bottom-margin">
                <i class="fa fa-circle"></i> <strong>FREE SHIPPING!</strong><br />
                <i class="fa fa-circle"></i> Order by the 1st of the month to receive the following month’s crate<br />
                <i class="fa fa-circle"></i> Membership crates ship the 15th of every month
              </p>
            </div>
            <div class="col-md-12 visible-sm">
              <hr />
            </div>
            <div class="col-md-6">
              <h3>ONE-TIME ORDERS</h3>
              <p>Treat yourself or send a crate to friends and family and see what “Michigan Made” is all about. Share these goodies with family and friends or keep them all to yourself. The choice is yours!</p> 
              <p class="no-bottom-margin">
                <i class="fa fa-circle"></i> <strong>$7 flat rate shipping</strong><br />
                <i class="fa fa-circle"></i> One-time orders ship weekly<br />
                <i class="fa fa-circle"></i> The perfect gift for any occasion
              </p>
            </div>
          </div>
          
        </div><!-- .container -->
        
      </div><!-- #shop-content -->
      
    </div><!-- #shop-page -->

  <?php endwhile; endif; ?>
  
<?php get_footer(); ?>
