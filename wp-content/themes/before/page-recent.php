<?php /* Template Name: Recent-Page */ ?>
<h1>最新20篇</h1>
<ul id="recent-posts">
<?php
    $recentPosts = new WP_Query();
    $recentPosts->query('showposts=20');
	$n = 0;
?>
<?php while ($recentPosts->have_posts()) : $recentPosts->the_post(); ?>
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