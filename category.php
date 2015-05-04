<?php get_header(); ?>

  <div class="white-page-container">
  
    <div class="container">
      
      <div id="post">
      
        <p><i><?php printf( 'Category: %s', single_cat_title( '', false ) ); ?></i></p>

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          
          <div class="category-post">
          
            <h1>
              <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
            </h1>
              
            <div class="entry-excerpt">
              <?php the_excerpt(); ?>
            </div><!-- .entry-excerpt -->
            
          </div>
          
        <?php endwhile; endif; ?>
        
        <?php mittencrate2014_paging_nav(); ?>
            
      </div><!-- #post -->
          
          
      <div id="post-sidebar">
        <?php dynamic_sidebar( 'post-sidebar' ); ?>
      </div><!-- #post-sidebar -->

    </div><!-- .container -->
  
  </div><!-- #page-with-no-header -->
  
<?php get_footer(); ?>
