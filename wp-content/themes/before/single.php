<?php

	get_header();
	
	while ( have_posts() ) : the_post();

	include_once('content-query.php');

	include_once('content-template.php');
	
	endwhile;

	get_footer();

?>