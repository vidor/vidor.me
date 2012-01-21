
<article id="post-<?php the_ID(); ?>" <?php post_class('latest-post'); ?>>
	<header class="entry-header">
		<?php the_title();?>
	</header><!-- .entry-header -->
	
	<div class="viewer">
		<?php if ( has_post_thumbnail() ) {?>
  			<?php the_post_thumbnail(array(1280, 800));?>
		<?php } ?>		
	</div>

	<footer class="entry-meta">
	</footer><!-- #entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->
