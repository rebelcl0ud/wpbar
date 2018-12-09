<!-- brings in header -->
<?php get_header(); ?>

<!-- pages created -->
<?php if(have_posts()) : while (have_posts()) : the_post(); ?>
<?php the_content(); ?>
<?php endwhile; endif; ?>

<!-- brings in footer -->
<?php get_footer(); ?>