<?php 
	// https://developer.wordpress.org/reference/
	function post_thumbnails() {
		add_theme_support( 'post-thumbnails' );
	}

	add_action('after_setup_theme', 'post_thumbnails');

?>