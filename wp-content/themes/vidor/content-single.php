
    <article id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>


		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
			<!-- todo -->
		<?php else : ?>
    		<div class="entry-content">
    			<?php the_content();?>
    		</div><!-- .entry-content -->
            
            <div class="entry-gallery">
            
        	    <?php $images =& get_children('post_type=attachment&post_mime_type=image&post_parent=' . $post->ID ); $n = 0; ?>
                <?php foreach($images as $image): ?>
                <?php $n++;?>
                <div class="threecol <?php if($n % 4 == 0) echo 'last';?>"><a href="#">
                    <div class="entry-gallery-image"><img src="<?php echo array_shift(wp_get_attachment_image_src($image->ID, 'gallery'))?>" /></div>
       
                </a></div>
                <?php endforeach;?>                
            </div>
		<?php endif; ?>
		


	</article><!-- #post-<?php the_ID(); ?> -->


<?php //   array_push($images_json, array('image' => array_shift(wp_get_attachment_image_src($image->ID, 'medium')), 'big' => array_shift(wp_get_attachment_image_src($image->ID, 'large')), 'title' => $image->post_title, 'thumb' => wp_get_attachment_thumb_url($image->ID), 'theme' => $image->post_excerpt));?>