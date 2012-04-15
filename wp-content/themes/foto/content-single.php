
    <article id="post-<?php the_ID(); ?>" <?php post_class( ); ?>>


		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
			<!-- todo -->
		<?php else : ?>
				<div id="post-title"><?php the_title();?></div>
				<div class="entry-content row section">
					<div id="entry-content-inner"><?php the_content();?></div>
				</div>
        	    <?php $images =& get_children('post_type=attachment&post_mime_type=image&post_parent=' . $post->ID ); $n = 0;  $images_json = array(); $ps_nav = array('content');?>
                <?php foreach($images as $image): ?>
		            <?php $src = array_shift(wp_get_attachment_image_src($image->ID, 'galleria')); ?>
		            <?php $big_src = array_shift(wp_get_attachment_image_src($image->ID, 'large')); ?>
						<div class="section">
		                <div class="entry-gallery-image max-width">
		                    <img class="middle-size <?php echo 'image-' . $image->ID; ?>" src="<?php echo $src;?>" />
		                    <img class="big-size" src="<?php echo $big_src?>" style="display: none" />
		                    <div class="entry-gallery-image-title"><p><?php echo $image->post_title;?></p></div>
		                </div>
						</div>
		            <?php array_push($images_json, array('image' => array_shift(wp_get_attachment_image_src($image->ID, 'large')), 'title' => $image->post_title, 'thumb' => array_shift(wp_get_attachment_image_src($image->ID, 'gallery')) ));
						  array_push($ps_nav, $image->post_title);
					?>    
                <?php endforeach;?> 

		<?php endif; ?>
		


	</article><!-- #post-<?php the_ID(); ?> -->
	<div id="ps-control"><div class="exit-fullscreen" style="display: none"></div><div class="prev"></div><div class="next"></div><div class="to-comment"><?php comments_number( '0', '1', '%' ); ?></div></div>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/pagescroller.min.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		//////// page scroller
		$('.post').pageScroller({ 
			scrollOffset: 0,
			navigation: <?php echo json_encode($ps_nav);?>,
			currentSection: 0
		});
		
		$('.next').click(function(){
			pageScroller.next();
		});
			
		$('.prev').click(function(){
			pageScroller.prev();
		});
		
		$('.to-comment').click(function() {
 			$('html, body').stop().animate({'scrollTop': $('#comment-container').offset().top});
 			$('li.active').removeClass('active');
		});
		
		//fix
		$('.pageScroll li a').html('');
		
		/////// fullscreen viewer
		var slide = $('.entry-gallery-image');

		slide.click(function() {
			if(!slide.hasClass('fullscreen') && $(window).width() > 1024) {
				slide.removeClass('max-width').addClass('fullscreen');
				slide.parent().addClass('fullscreen');
				resize();
				$('.next, .prev, .pageScroll').animate({'top': '+=51px'}, function() {$('.exit-fullscreen').fadeIn()});

				//////load big image
				slide.each(function() {
					$(this).find('.middle-size').hide();
					$(this).find('.big-size').show();
				});	
			} 
			pageScroller.goTo(slide.index($(this)) + 2);
		});
		
		//////////////////
		
		$('.exit-fullscreen').click(function() {
			$(this).fadeOut(function() {
				$('.next, .prev, .pageScroll').animate({'top': '-=51px'});
			});
			slide.removeClass('fullscreen').addClass('max-width');
			slide.parent().removeClass('fullscreen');
			slide.removeAttr('style');
			pageScroller.goTo($('li.scrollNav').index($('.active')) + 1);
			
			slide.each(function() {
				$(this).find('.big-size').hide();
				$(this).find('.middle-size').show().css('width', '100%');
			});
		});

		function resize () {
			var wWidth  = $(window).width();
			var wHeight = $(window).height();
			slide.width(wWidth);
			slide.height(wHeight);
			slide.find('img.big-size').each(function() {
				var imgWidth = $(this).width();
				var imgHeight = $(this).height();
				var hOffset = vOffset = 0;
				vOffset = -( imgHeight - wHeight ) / 2;
				hOffset = -( imgWidth - wWidth ) / 2;
				
				if( vOffset > 0 ) {
					$(this).height('100%'); $(this).width('auto');
					vOffset = 0;
				}
				
				if( hOffset > 0 ) {
					$(this).width('100%'); $(this).height('auto');
					hOffset = 0;
				}		
				
				$(this).css({top: vOffset, left: hOffset});
			});

		}

		$(window).resize(function() {
			if(slide.hasClass('fullscreen')) { 
				resize();

			}
			pageScroller.goTo($('li.scrollNav').index($('.active')) + 1);
		});
	});
</script>

