<?php get_header(); ?>

  <div class="white-page-container">
  
    <div class="container">
      
      <div id="post">

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          
          <div id="post-header">
            <?php if ( has_post_thumbnail() ) : ?>
              <?php the_post_thumbnail(); ?>
            <?php endif; ?>
            <h1><?php the_title(); ?></h1>
          </div><!-- #post-header -->
          
          <div id="post-content">
            <?php the_content(); ?>
          </div><!-- #post-content -->
          
        <?php endwhile; endif; ?>
            
      </div><!-- #post -->
          
          
      <div id="post-sidebar">
        <?php dynamic_sidebar( 'post-sidebar' ); ?>
      </div><!-- #post-sidebar -->

    </div><!-- .container -->
  
  </div><!-- .white-page-container -->
  
<?php get_footer(); ?>
