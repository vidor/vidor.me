
    <article id="post-<?php the_ID(); ?>" <?php post_class( ); ?>>


		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
			<!-- todo -->
		<?php else : ?>

        	    <?php $images =& get_children('post_type=attachment&post_mime_type=image&post_parent=' . $post->ID ); $n = 0;  $images_json = array();?>
                <?php foreach($images as $image): ?>
		            <?php $src = array_shift(wp_get_attachment_image_src($image->ID, 'galleria')); ?>
		                <div class="entry-gallery-image">
		                    <img class="<?php echo 'image-' . $image->ID; ?>" src="<?php echo $src;?>" />
		                    <div class="entry-gallery-image-title"><p><?php echo $image->post_title;?></p></div>
		                </div>
		            <?php array_push($images_json, array('image' => array_shift(wp_get_attachment_image_src($image->ID, 'large')), 'title' => $image->post_title, 'thumb' => array_shift(wp_get_attachment_image_src($image->ID, 'gallery')) ));?>    
                <?php endforeach;?> 

		<?php endif; ?>
		


	</article><!-- #post-<?php the_ID(); ?> -->

	<!--Thumbnail Navigation-->
	<div id="prevthumb" class="supersized"></div>
	<div id="nextthumb" class="supersized"></div>
	
	<!--Arrow Navigation-->
	<a id="prevslide" class="load-item supersized"></a>
	<a id="nextslide" class="load-item supersized"></a>
	
	<div id="thumb-tray" class="load-item supersized">
		<div id="thumb-back" class="supersized"></div>
		<div id="thumb-forward" class="supersized"></div>
	</div>
	
	<!--Time Bar-->
	<div id="progress-back" class="load-item supersized">
		<div id="progress-bar" class="supersized"></div>
	</div>
	
	<!--Control Bar-->
	<div id="controls-wrapper" class="load-item supersized">
		<div id="controls">
			
			<a id="play-button"><img id="pauseplay" src="<?php echo get_template_directory_uri(); ?>/images/supersized/pause.png"/></a>
		
			<!--Slide counter-->
			<div id="slidecounter">
				<span class="slidenumber"></span> / <span class="totalslides"></span>
			</div>
			
			<!--Slide captions displayed here-->
			<div id="slidecaption"></div>
			
			<!--Thumb Tray button-->
			<a id="tray-button"><img id="tray-arrow" src="<?php echo get_template_directory_uri(); ?>/images/supersized/button-tray-up.png"/></a>
			
			<!--Navigation-->
			<ul id="slide-list"></ul>
			
		</div>
	</div>



<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/supersized.3.2.7.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/supersized.shutter.js"></script>
<script type="text/javascript">
			jQuery(function($){
				
				$.supersized({
				
					// Functionality
					slideshow               :   1,			// Slideshow on/off
					autoplay				:	1,			// Slideshow starts playing automatically
					start_slide             :   1,			// Start slide (0 is random)
					stop_loop				:	0,			// Pauses slideshow on last slide
					random					: 	0,			// Randomize slide order (Ignores start slide)
					slide_interval          :   3000,		// Length between transitions
					transition              :   6, 			// 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
					transition_speed		:	1000,		// Speed of transition
					new_window				:	1,			// Image links open in new window/tab
					pause_hover             :   0,			// Pause slideshow on hover
					keyboard_nav            :   1,			// Keyboard navigation on/off
					performance				:	1,			// 0-Normal, 1-Hybrid speed/quality, 2-Optimizes image quality, 3-Optimizes transition speed // (Only works for Firefox/IE, not Webkit)
					image_protect			:	1,			// Disables image dragging and right click with Javascript
															   
					// Size & Position						   
					min_width		        :   0,			// Min width allowed (in pixels)
					min_height		        :   0,			// Min height allowed (in pixels)
					vertical_center         :   1,			// Vertically center background
					horizontal_center       :   1,			// Horizontally center background
					fit_always				:	0,			// Image will never exceed browser width or height (Ignores min. dimensions)
					fit_portrait         	:   1,			// Portrait images will not exceed browser height
					fit_landscape			:   0,			// Landscape images will not exceed browser width
									   
					// Components							
					slide_links				:	'blank',	// Individual links for each slide (Options: false, 'num', 'name', 'blank')
					thumb_links				:	1,			// Individual thumb links for each slide
					thumbnail_navigation    :   0,			// Thumbnail navigation
					slides 					:  	<?php echo json_encode($images_json) ?>,												
					// Theme Options			   
					progress_bar			:	1,			// Timer for each slide							
					mouse_scrub				:	0
					
				});
		    });
</script>

