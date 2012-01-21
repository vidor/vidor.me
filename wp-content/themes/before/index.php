<?php get_header(); ?>
<!--Top Bar-->
<div id="top-bar">
	<h1><a id="logo" title="Home" href="http://<?php bloginfo('site_url')?>"><span>唯多点米</span></a></h1>
</div><!-- top bar -->

<div id="primary">

	<?php if ( have_posts() ) : ?>

		<?php $latest = 0; ?>
		<?php while ( have_posts() ) : the_post();
			
			if(!$latest) get_template_part( 'content', 'latest' );
			else  get_template_part( 'content');
			
			$latest++;
		
		endwhile; ?>


	<?php endif; ?>

</div>

<?php get_footer(); ?>