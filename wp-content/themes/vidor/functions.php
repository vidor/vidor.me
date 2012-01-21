<?php

/**
 * Tell WordPress to run twentyeleven_setup() when the 'after_setup_theme' hook is run.
 */
add_action( 'after_setup_theme', 'vidor_setup' );

if ( ! function_exists( 'vidor_setup' ) ):

function vidor_setup() {
	
	// Disable the Wordpress Admin Bar for all but admins.
	if (!current_user_can('administrator')):
	  show_admin_bar(false);
	endif;

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// Add default posts and comments RSS feed links to <head>.
	add_theme_support( 'automatic-feed-links' );

	// This theme uses Featured Images (also known as post thumbnails) for per-post/per-page Custom Header images
	add_theme_support( 'post-thumbnails' );

	// We'll be using post thumbnails for custom header images on posts and pages.
	// We want them to be the size of the header image that we just defined
	// Larger images will be auto-cropped to fit, smaller ones will be ignored. See header.php.
	set_post_thumbnail_size( 180, 119, true );
    
    add_image_size( 'gallery', 180, 119, true );

	add_image_size( 'galleria-thumbnail', 40, 40, true );
	add_image_size( 'galleria', 800, 531 );
	add_image_size( 'galleria-full', 1280, 800);
	
	add_image_size( 'large', 0, 0 );
	
	//remove Media Settings default value.
	update_option( 'thumbnail_size_h', 0 );
	update_option( 'thumbnail_size_w', 0 );
	update_option( 'large_size_h', 0);
	update_option( 'large_size_w', 0);
	update_option( 'medium_size_h', 0);
	update_option( 'medium_size_w', 0);
}

function vidor_title() {
	
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );
	
}

endif;
