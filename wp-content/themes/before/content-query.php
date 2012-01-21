<?php

	$the_title = get_the_title();
	$the_content = get_the_content();
	$the_date = get_the_date();

	$images =& get_children('post_type=attachment&post_mime_type=image&order=asc&orderby=menu_order&post_parent=' . $post->ID );

	
	$images_count = count($images);
	
	$images_json = array();
	

	foreach($images as $image) {
		array_push($images_json, array('image' => array_shift(wp_get_attachment_image_src($image->ID, 'medium')), 'big' => array_shift(wp_get_attachment_image_src($image->ID, 'large')), 'title' => $image->post_title, 'thumb' => wp_get_attachment_thumb_url($image->ID), 'theme' => $image->post_excerpt));
		//$thumbnails .= '<li><a href="#"><img src="' . wp_get_attachment_thumb_url($image->ID) . '" title="' . $image->post_title . '" height="80" width="80" /></a></li>';
	}

