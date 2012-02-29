<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 */

get_header(); ?>
    <div id="main" class="row">
		<div id="primary" class="container">

			<?php if ( have_posts() ) : ?>
            
                <?php $col = 4; $n = 0;?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <a class="post-link" href="<?php the_permalink(); ?>" rel="bookmark">
                
                		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
                			<!-- todo -->
                		<?php else : ?>
                        
                		<div class="entry-thumbnail">
                			<?php if ( has_post_thumbnail() ) { //the_post_thumbnail(array('title' => "")); 
                				$thumbnail = wp_get_attachment_image_src ( get_post_thumbnail_id ( $post->ID ) , 'galleria') ;
                			} ?>
                			<img src="<?php echo $thumbnail[0]; ?>" />
                		</div><!-- .entry-thumbnail -->
                		<?php endif; ?>
                        
                        <div class="entry-content">
                        
                        	<div class="entry-meta">
                    			<div class="entry-date"><?php the_time('n-j, Y'); ?></div>
                                <div class="entry-count">
                        			<div class="entry-foto-count"><?php $images =& get_children('post_type=attachment&post_mime_type=image&post_parent=' . $post->ID ); echo count($images);?></div>
                        			<div class="entry-comment-count"> <?php comments_number( '0', '1', '%' ); ?></div>
                                </div>
                    		</div><!-- #entry-meta -->
                            
                        	<div class="entry-header">
                    			<?php if ( is_sticky() ) : ?>
                    				<!-- todo -->
                    			<?php else : ?>
                    			<h1 class="entry-title"><?php the_title(); ?></h1>
                    			<?php endif; ?>
                    		</div><!-- .entry-header -->
                            
                            <div class="entry-excerpt">
                                <?php the_content('...');?>
                            </div>
                        
                        </div><!-- .entry-content -->
                
                        
                    </a>
                	</article><!-- #post-<?php the_ID(); ?> -->
                    
                        

				<?php endwhile; ?>


			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<div class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'twentyeleven' ); ?></h1>
					</div><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyeleven' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>

		</div><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>