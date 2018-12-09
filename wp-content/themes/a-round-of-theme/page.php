<!-- brings in header -->
<?php get_header(); ?>

<section class="page-template">
	<div class="container">
		<!-- pages created -->
		<?php if(have_posts()) : while (have_posts()) : the_post(); ?>
		<?php the_content(); ?>
		<?php endwhile; endif; ?>
	</div>
</section>

<!-- brings in footer -->
<?php get_footer(); ?>