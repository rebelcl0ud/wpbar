<?php 
	// https://developer.wordpress.org/reference/functions/add_theme_support/
	// https://developer.wordpress.org/reference/functions/add_post_type_support/
	function post_thumbnails() {
		add_theme_support( 'post-thumbnails' );
		add_post_type_support( 'page', 'excerpt' );
	}

	add_action('after_setup_theme', 'post_thumbnails');

?>