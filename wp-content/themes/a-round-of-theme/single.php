<?php
 /* 
 Template Name: Single Post Template 
 */
 get_header();
?>

<!-- not using PODS; using blog built in methods -->

<section id="portfolio-projects">
  <div class="container blog">
  	<!-- REF; https://developer.wordpress.org/themes/basics/the-loop/ -->
    <?php if(have_posts()) : while (have_posts()) : the_post(); ?>
  	<h1><?php the_title(); ?></h1>
    <div class="project-image">
      <div class="img" style="background: url('<?php the_post_thumbnail_url('medium'); ?>'); background-size: cover !important; background-position: center center !important;"></div>
    </div>
    <div class="content-area">
    	<div class="inner">
    	 <?php the_content(); ?>
    	</div>
    	<div class="widgets">
    		<?php get_sidebar( 'right-sidebar' ); ?>
    	</div>
    </div>
  </div>
  <?php endwhile; ?>
    <?php else : ?>
      <div>
        <h1>Blogs Coming Soon</h1>
      </div>
    <?php endif; ?>
</section>

<?php get_footer(); ?>
