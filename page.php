<?php get_header(); ?>

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <div class="white-page-container">
      
      <div class="gray-title-bar">
        <div class="container">
          <h1><?php the_title(); ?></h1>
        </div>
      </div><!-- .gray-title-bar -->
      
      <div class="page-content">
        <div class="container">
          <?php the_content(); ?>
        </div>
      </div><!-- .page-content -->
      
    </div><!-- .white-page-container -->

  <?php endwhile; endif; ?>

<?php get_footer(); ?>
