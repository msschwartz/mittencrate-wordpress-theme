<?php get_header(); ?>

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <div id="home-page">
      
      <section id="home-hero-mobile" class="home-section">
        <div id="home-hero-mobile-title" class="home-huge-cursive-title">Eat. Love. Michigan.</div>
        <div class="container home-top-bottom-padding">
          <div id="home-hero-mobile-excerpt" class="text-blue">Mitten Crate takes the guesswork out of discovering unique, great tasting, Michigan products.</div>
          <div id="home-hero-mobile-cta"><a href="/shop/" class="button button-brown">Get Started</a></div>
        </div>
      </section><!-- #home-hero-mobile -->
      
      <section id="home-hero" class="home-section">
        <div class="container">
          <div id="home-hero-content">
            <div id="home-hero-title" class="home-huge-cursive-title">Eat. Love. Michigan.</div>
            <div id="home-hero-excerpt">Mitten Crate takes the guesswork out of discovering unique, great tasting, Michigan products.</div>
            <div id="home-hero-cta"><a href="/shop/" class="button button-brown">Get Started</a></div>
          </div>
        </div>
      </section><!-- #home-hero -->
      
      <div class="home-bar home-bar-brown">Enjoy a Taste of Michigan.</div>
      
      <section id="home-pitch" class="home-section">
        <div class="brown-arrow-down"></div>
        <div id="home-pitch-inner">
          <div class="container home-top-bottom-padding">
            <div id="home-pitch-content">
                <div class="home-section-title text-blue">Michigan. Delivered.</div>
                <p>Michigan's local food scene is exploding with new artisan products and specialty goods. Mitten Crate sends a deliciously curated assortment right to your doorstep every month. We strive to bring you the best tasting and most unique products made right here in Michigan. Sign up yourself, or send a crate to family and friends, and see what "<strong>Michigan Made</strong>" is all about!</p>
                <div><a href="/shop/" class="button button-blue">Get Started</a></div>
            </div>
          </div>
        </div>
        <img id="home-pitch-mobile-products-img" src="<?php echo get_stylesheet_directory_uri(); ?>/images/home-pitch-products-bg.png" />
      </section><!-- #home-pitch -->
      
      <!-- Seen on -->
      <div id="home-seen-on" class="bg-blue">
        <div class="logo-slide">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/home-seen-logo-modeld.png" />
        </div>
        <div class="logo-slide">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/home-seen-logo-hour.png" />
        </div>
        <div class="logo-slide">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/home-seen-logo-fox2.png" />
        </div>
        <div class="logo-slide">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/home-seen-logo-awesome.png" />
        </div>
        <div class="logo-slide">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/home-seen-logo-local4.png" />
        </div>
        <div class="logo-slide">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/home-seen-logo-puremi.png" />
        </div>
      </div>
      
      <section id="home-how-it-works" class="home-section bg-light-gray text-center">
        <div class="container home-top-bottom-padding">
          <div class="home-section-title">How it Works</div>
          <div class="how-it-works-item how-it-works-item-left">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/home-how-icon-choose.png" />
            <div class="home-section-title">Choose</div>
            <p class="no-bottom-margin">Decide between a membership or a one-time order.</p>
          </div>
          <div class="how-it-works-item how-it-works-item-center">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/home-how-icon-deliver.png" />
            <div class="home-section-title">Receive</div>
            <p class="no-bottom-margin">Memberships ship the 15th of every month, one-timers ship the beginning of every week.</p>
          </div>
          <div class="how-it-works-item how-it-works-item-right">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/home-how-icon-enjoy.png" />
            <div class="home-section-title">Enjoy</div>
            <p class="no-bottom-margin">Enjoy the taste of Michigan with every bite!</p>
          </div>
          <div class="clearfix"></div>
          <hr />
          <div><a href="/shop/" class="button button-brown">Get Started</a></div>
        </div>
      </section><!-- #home-how-it-works -->
      
      <section id="home-gleaners" class="home-section">
        <div class="container home-top-bottom-padding">
          <div id="home-gleaners-content">
            <div class="home-section-title text-blue">Giving Back</div>
            <p>Mitten Crate has made a commitment to the community by pledging to donate three meals for every single crate produced. Coupled with hosting charity events, Mitten Crate donates thousands of meals every year. Feel good about supporting local businesses and helping us give back to your community.</p>
            <div class="clearfix"></div>
            <div><a href="/shop/" class="button button-blue">Get Started</a></div>
          </div>
          <a id="home-gleaners-link" href="http://www.mittencrate.com/gleaners">
            <img class="normal" src="<?php echo get_stylesheet_directory_uri(); ?>/images/home-gleaners-normal.png" />
            <img class="hover" src="<?php echo get_stylesheet_directory_uri(); ?>/images/home-gleaners-hover.png" />
          </a>
        </div>
      </section><!-- #home-gleaners -->
      
      
      <section id="home-meet-founders" class="home-section">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/home-meet-founders-bg.jpg" />
        <div id="home-meet-founders-content">
          <div class="container">
            <table>
              <tr>
                <td class="home-top-bottom-padding">
                  <div class="home-huge-cursive-title">Meet The Founders</div>
                  <p class="no-bottom-margin">Cory and Andrew share a passion for food and an adoration for their beautiful home state of Michigan. From the very first crates packed in Andrew’s kitchen, they have been committed to connecting food lovers with food makers from all over this great state.</p>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </section><!-- #home-meet-founders -->
      
      <section id="home-meet-founders-mobile" class="home-section">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/home-meet-founders-mobile.jpg" />
        <div class="container home-top-bottom-padding">
          <div class="home-huge-cursive-title">Meet The Founders</div>
          <p class="no-bottom-margin">Cory and Andrew share a passion for food and an adoration for their beautiful home state of Michigan. From the very first crates packed in Andrew’s kitchen, they have been committed to connecting food lovers with food makers from all over this great state.</p>
        </div>
      </section><!-- #home-meet-founders-mobile -->
      
      
      <div class="home-bar home-bar-brown">
        <a href="mailto:info@mittencrate.com">Michigan Made Food Maker? Get in Touch, We’re Always Tasting!</a>
      </div>
      
      <section id="home-subscribe" class="home-section">
        <div class="container text-center">
          <div><a href="/shop/" class="button button-brown">Click Here to Get Started</a></div>
        </div>
      </section><!-- #home-subscribe -->

    </article>

  <?php endwhile; endif; ?>

<?php get_footer(); ?>
