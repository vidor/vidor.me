
    <article id="post-<?php the_ID(); ?>" <?php post_class('threecol last'); ?>>
    <a class="permalink" href="<?php the_permalink(); ?>" rel="bookmark">

		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
			<!-- todo -->
		<?php else : ?>
        
		<div class="entry-content">
			<?php if ( has_post_thumbnail() ) { the_post_thumbnail();	} ?>
		</div><!-- .entry-content -->
		<?php endif; ?>
		
        <div class="entry-overlay">
        	<header class="entry-header">
    			<?php if ( is_sticky() ) : ?>
    				<!-- todo -->
    			<?php else : ?>
    			<h1 class="entry-title"><?php the_title(); ?></h1>
    			<?php endif; ?>
    
    		</header><!-- .entry-header -->
    		<footer class="entry-meta">
    			<div class="entry-date"><?php the_time('n. j, Y'); ?></div>
                <div class="entry-count">
        			<div class="entry-foto-count"><?php $images =& get_children('post_type=attachment&post_mime_type=image&post_parent=' . $post->ID ); echo count($images);?></div>
        			<div class="entry-comment-count"> <?php comments_number( '0', '1', '%' ); ?></div>
                </div>
    		</footer><!-- #entry-meta -->
        </div><!-- #entry-overlay -->
    </a>
	</article><!-- #post-<?php the_ID(); ?> -->
