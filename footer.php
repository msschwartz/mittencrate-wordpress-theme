    
    </div><!-- #main -->
    
    <footer id="mastfoot">
    
      <div id="mastfoot-links">
        <div class="container">
        
          <div id="mastfoot-links-inner">
        
            <img id="mastfoot-logo" src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-with-subtext.svg" />
            
            <nav id="mastfoot-navigation">
              <?php if( is_user_logged_in() ) : ?>
                <?php wp_nav_menu( array( 'menu' => 'logged-in' ) ); ?>
              <?php else : ?>
                <?php wp_nav_menu( array( 'menu' => 'logged-out' ) ); ?>
              <?php endif; ?>
            </nav>
            
            <div id="mastfoot-social" class="social-font">
              <a href="http://facebook.com/mittencrate" target="blank">&#xE801;</a>
              <a href="http://twitter.com/MittenCrate" target="blank">&#xE802;</a>
              <a href="http://instagram.com/mittencrate" target="blank">&#xE803;</a>
              <a href="http://www.pinterest.com/mittencrate" target="blank">&#xE800;</a>
              <a href="mailto:info@mittencrate.com" target="blank">&#xE804;</a>
            </div>
            
          </div>
        
        </div>
      </div>
        
      <div id="mastfoot-copy" class="bg-light-gray text-center">
        Copyright &copy; <?php echo date('Y'); ?> - Mitten Crate LLC. - All Rights Reserved.
      </div>
      
    </footer><!-- #mastfoot -->
    
  </div><!-- #page -->

  <?php wp_footer(); ?>
</body>
</html>
