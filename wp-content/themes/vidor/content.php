
	<article id="post-<?php the_ID(); ?>" <?php post_class('threecol'); ?>>
    <a class="permalink" href="<?php the_permalink(); ?>" rel="bookmark">
		<header class="entry-header">
			<?php if ( is_sticky() ) : ?>
				<!-- todo -->
			<?php else : ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php endif; ?>

		</header><!-- .entry-header -->

		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
			<!-- todo -->
		<?php else : ?>
		<div class="entry-content">
			<?php if ( has_post_thumbnail() ) { the_post_thumbnail();	} ?>
		</div><!-- .entry-content -->
		<?php endif; ?>
		
		<?php $images =& get_children('post_type=attachment&post_mime_type=image&post_parent=' . $post->ID );
			  $images_count = count($images);?>

		<footer class="entry-meta">
			<div class="entry-date"><?php the_time('n. j, Y'); ?></div>
            <div class="entry-count">
    			<div class="entry-foto-count"><?php echo $images_count; ?></div>
    			<div class="entry-comment-count"> <?php comments_number( '0', '1', '%' ); ?></div>
            </div>
		</footer><!-- #entry-meta -->
    </a>
	</article><!-- #post-<?php the_ID(); ?> -->