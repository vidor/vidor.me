
    <article id="post-<?php the_ID(); ?>" <?php post_class( ); ?>>


		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
			<!-- todo -->
		<?php else : ?>

        	    <?php $images =& get_children('post_type=attachment&post_mime_type=image&post_parent=' . $post->ID ); $n = 0; ?>
                <?php foreach($images as $image): ?>
                    <div class="entry-gallery-image">
                        <img class="<?php echo 'image-' . $image->ID; ?>" src="<?php echo array_shift(wp_get_attachment_image_src($image->ID, 'gallery'))?>" />
                        <div class="entry-gallery-image-title"><p><?php echo $image->post_title;?></p></div>
                    </div>
                <?php endforeach;?> 

		<?php endif; ?>
		


	</article><!-- #post-<?php the_ID(); ?> -->


<?php //   array_push($images_json, array('image' => array_shift(wp_get_attachment_image_src($image->ID, 'medium')), 'big' => array_shift(wp_get_attachment_image_src($image->ID, 'large')), 'title' => $image->post_title, 'thumb' => wp_get_attachment_thumb_url($image->ID), 'theme' => $image->post_excerpt));?>