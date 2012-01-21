<?php

	get_header();

	//showposts = 2, show the first post on home page, second for next post link.
	$home_page = new WP_Query(array('orderby' => 'date', 'order' => 'DESC', 'showposts' => 2));
	
	if( $home_page->have_posts() ) : $home_page->the_post(); 
	
		include_once('content-query.php');

	endif;
	
	include_once('content-template.php');

	get_footer();
?>