<?php 
/*
Template Name: Single Project Template
*/
get_header();
?>

<?php 
	// fn come with pods
	// snags current slug
	$slug = pods_v('last', 'url');

	// snags pods obj
	$mypod = pods('project', $slug);

	// set vars
	$name = $mypod->field('name');
	$permalink = $mypod->field('permalink');
?>

<!-- testing pulling in correct info -->
<p><?php echo $name; ?></p>


<?php get_footer(); ?>