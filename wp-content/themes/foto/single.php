<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

    <div id="main" class="row">
    
			<div id="content" role="main" class="container">

				<nav id="nav-single"></nav><!-- #nav-single -->

				<?php get_template_part( 'content', 'single' ); ?>
                    
                <div id="comment-container"><?php comments_template( '', true ); ?></div>

			</div><!-- #content -->
	</div><!-- #main -->
			
<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>