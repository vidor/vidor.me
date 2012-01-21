<!DOCTYPE html>
<!--[if IE 6]><html id="ie6" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 7]><html id="ie7" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8]><html id="ie8" <?php language_attributes(); ?>><![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!--><html <?php language_attributes(); ?>><!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title><?php vidor_title()?></title>
	
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!-- 1140px Grid styles for IE -->
<!--[if lte IE 9]><link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style-ie.css" type="text/css" media="screen" /><![endif]-->

<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<!--css3-mediaqueries-js - http://code.google.com/p/css3-mediaqueries-js/ - Enables media queries in some unsupported browsers-->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/css3-mediaqueries.js"></script>

<?php 
 wp_enqueue_script(
 	array('jquery'),
 	'1.0',
 	true
 );
 
wp_head();?>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/app.js"></script>
</head>

<body <?php body_class(); ?>>

<div id="page" class="hfeed">
	<header id="branding" role="banner" class="container">
			<hgroup class="row">
				<h1 id="site-title" class="threecol"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="首页" rel="home"><span><?php bloginfo( 'name' ); ?></span></a></h1>
                <?php if( is_singular() ) : ?>
                <div id="single-title" class="ninecol last">
                    <h2 id="title"><?php the_title()?></h2>
                	<div class="entry-meta">
            			<div class="entry-date"><?php the_time('n-j, Y'); ?></div>
            			<div class="entry-foto-count"><?php $images =& get_children('post_type=attachment&post_mime_type=image&post_parent=' . $post->ID );echo count($images);?></div>
            			<div class="entry-comment-count"> <?php comments_number( '0', '1', '%' ); ?></div>
            		</div><!-- #entry-meta -->  
                </div>
                <?php else : ?>
				    <h2 id="site-description" class="ninecol last"><?php bloginfo( 'description' ); ?></h2>
                <?php endif; ?>
			</hgroup>

	</header><!-- #branding -->