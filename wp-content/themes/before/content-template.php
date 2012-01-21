<!--Top Bar-->
<div id="top-bar">
	<h1><a id="logo" title="Home" href="<?php bloginfo('home');?>"><span>唯多点米</span></a></h1>

	<?php if( is_home()) :
			//for next post
		if( $home_page->have_posts() ) : $home_page->the_post();
			 //$have_prev_post = true;
			 $prev_post_title = get_the_title();
			 $prev_post_link = get_permalink();
		endif;?>
		
		<div id="prev-post" class="post-link"><span class="arrow">&larr;</span><a href="<?php echo $prev_post_link ?>"><?php echo $prev_post_title?></a></div>		
	
	<?php elseif( is_single() ) : ?>
		<div id="prev-post" class="post-link"><?php previous_post_link('<span class="arrow">&larr;</span>%link'); ?></div>
		<div id="next-post" class="post-link"><?php next_post_link('%link<span class="arrow">&rarr;</span>'); ?></div>
	<?php endif;?>

</div><!-- top bar -->

<div id="wrap">
	<div id="header">
			<h1 id="post-title"><?php echo $the_title ?><span><?php the_date('m d, Y')?></span></h1>
			<a href="#" id="content-toggle">一些文字</a>
	</div>
	
	<div id="content"><div id="content-inner"><?php the_content();?></div></div>
	
	<div id="galleria"></div>
</div>

<?php comments_template( '', true ); ?>




<script type="text/javascript" id="script-code">
	Galleria.loadTheme('<?php echo get_bloginfo( 'template_directory' ) . '/js/galleria.classic.js'?>');

	$("#galleria").galleria({
		data_source: <?php echo json_encode($images_json);?>,
	    width: 800,
	    height: 531,
	    fullscreenCrop: true
	    });
</script>

<!--[if IE 6]>
	<script type="text/javascript" src="<?php echo get_bloginfo( 'template_directory' ) . '/js/DD_belatedPNG_0.0.8a-min.js'?>"></script>
	<script type="text/javascript">
		DD_belatedPNG.fix('#top-bar, .galleria-info, #galleria, .galleria-corner, #logo, .slide-arrow a, .galleria-thumbnail-icon a, .galleria-fullscreen a, #content, #content-toggle');
	</script>
<![endif]-->

