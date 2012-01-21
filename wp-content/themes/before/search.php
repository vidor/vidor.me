<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

?>


			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'twentyeleven' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				</header>
				
				<ul>

				<?php /* Start the Loop */ $n = 0;?>
				
				<?php while ( have_posts() ) : the_post(); ?>
					<?php if ($post->post_type=='page') continue; ?>
					
			    <li class="<?php echo $n % 2 == 0 ? 'even' : 'odd' ?>">
			    	<?php the_post_thumbnail('thumbnail');?>
			    	<div class="recent-post-meta">
			    		<h3><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
			    		<p class="meta-date"><?php the_date()?></p>
						<?php $images =& get_children('post_type=attachment&post_mime_type=image&post_parent=' . $post->ID );
							$images_count = count($images);
						?>    		
			    		<div class="meta-count"><span><?php echo '图片(' .$images_count . ')' ?></span><?php comments_popup_link( '还没有评论', '评论(1)', '评论(%)', 'comments-link', 'Comments are off for this post'); ?></div>
			    	</div>
			    	<div class="num"><?php echo ++$n ?></div>
			    </li>

				<?php endwhile; ?>
				</ul>

				<?php twentyeleven_content_nav( 'nav-below' ); ?>

			<?php else : ?>


			<?php endif; ?>

