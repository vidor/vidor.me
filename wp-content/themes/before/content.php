
<article id="post-<?php the_ID(); ?>" <?php post_class('normal-post'); ?>>
<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
	
	<header class="entry-header">
		<?php the_title();?>
	</header><!-- .entry-header -->
	
	<div class="main">
		<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
  			the_post_thumbnail(array(180,180));
		} ?>		
	</div>

	<footer class="entry-meta">
		<?php the_time('F j, Y'); ?><span><?php comments_number( '0', '1', '%' ); ?></span>
	</footer><!-- #entry-meta -->
</a>
</article><!-- #post-<?php the_ID(); ?> -->
