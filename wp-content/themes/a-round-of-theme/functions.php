<?php 
	// https://developer.wordpress.org/reference/functions/add_theme_support/
	// https://developer.wordpress.org/reference/functions/add_post_type_support/
	function post_thumbnails() {
		add_theme_support( 'post-thumbnails' );
		add_post_type_support( 'page', 'excerpt' );
	}
	add_action('after_setup_theme', 'post_thumbnails');

	// https://developer.wordpress.org/themes/functionality/sidebars/#examples
	// https://developer.wordpress.org/themes/functionality/sidebars/#load-your-sidebar
	function portfolio_widgets_init() {
		register_sidebar( array (
			'name'          => __('right-sidebar', 'portfolio'),
			'id'            => 'sidebar-1',
			'before_widget' => '<div id="%1$s" class="widget-box %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3> '
		));

		register_sidebar( array (
			'name'          => __('bottom-sidebar', 'portfolio'),
			'id'            => 'bottom-sidebar-2',
			'before_widget' => '<div id="%1$s" class="widget-box %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3> '
		));
	}
	add_action('widgets_init', 'portfolio_widgets_init');

?>