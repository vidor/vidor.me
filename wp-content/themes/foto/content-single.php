	<div id="galleria" style=""></div>
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
		            <?php array_push($images_json, array('image' => array_shift(wp_get_attachment_image_src($image->ID, 'medium')), 'big' => array_shift(wp_get_attachment_image_src($image->ID, 'large')), 'title' => $image->post_title, 'thumb' => array_shift(wp_get_attachment_image_src($image->ID, 'gallery')), 'theme' => $image->post_excerpt));?>    
                <?php endforeach;?> 

		<?php endif; ?>
		


	</article><!-- #post-<?php the_ID(); ?> -->
    
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/galleria-1.2.6.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            Galleria.loadTheme('<?php echo get_template_directory_uri(); ?>/js/galleria.vidor.js');
            $('#galleria').galleria({
                dataSource: <?php  echo json_encode($images_json); ?>,
                imageCrop: true
            });
        });
    </script>
