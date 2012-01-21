<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>
    <div id="main">
		<div id="primary" class="">
			<div id="content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<nav id="nav-single">
					</nav><!-- #nav-single -->

					<?php get_template_part( 'content', 'single' ); ?>
                    
                    <div id="comment-container" class="container"><div class="row">
					    <?php comments_template( '', true ); ?>
                    </div></div>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>