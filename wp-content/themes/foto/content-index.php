<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<a class="post-link" href="<?php the_permalink(); ?>" rel="bookmark">
		<div class="entry-thumbnail">
		<?php if ( has_post_thumbnail() ) { //the_post_thumbnail(array('title' => "")); 
			$thumbnail = wp_get_attachment_image_src ( get_post_thumbnail_id ( $post->ID ) , 'galleria') ;
		} ?>
		<img src="<?php echo $thumbnail[0]; ?>" />
		</div>
		
		<div class="entry-content">
		<div class="entry-content-inner">
		
			<div class="entry-header">
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</div><!-- .entry-header -->
			
			<div class="entry-date"><?php the_time('n-j, Y'); ?></div>
			<div class="entry-count">
				<div class="entry-foto-count"><?php $images =& get_children('post_type=attachment&post_mime_type=image&post_parent=' . $post->ID ); echo count($images);?></div>
				<div class="entry-comment-count"> <?php comments_number( '0', '1', '%' ); ?></div>
			</div>
			

		</div>
		</div><!-- .entry-content -->

	</a>
</article><!-- #post-<?php the_ID(); ?> -->