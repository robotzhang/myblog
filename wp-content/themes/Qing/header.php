<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 9]>
<html id="ie9" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8) | !(IE 9) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />	
<title><?php global $page, $paged;
wp_title( '|', true, 'right' );
bloginfo( 'name' );
if ( $paged >= 2 || $page >= 2 )
	echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );
?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name');?> &raquo; Feed" href="<?php bloginfo('rss_url');?>" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name');?> &raquo; 评论 Feed" href="<?php bloginfo('comments_rss2_url');?>"/>	
<?php
	wp_enqueue_script('jquery');
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
	wp_head();
?>
<script type="text/javascript" src="<?php bloginfo('template_url');?>/js/corner.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url');?>/js/qing.js"></script>
</head>
<body <?php body_class(); ?>>
	<div id="top">
		<div id="header">
			<div id="h_left">
				<a href="<?php bloginfo('url');?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>"><img src="<?php bloginfo('template_url'); ?>/images/logo.png" title="<?php echo esc_attr(get_bloginfo('name')); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>logo"/><h1 style="display:none;"><?php bloginfo('name'); ?></h1></a>				
                                <span><?php bloginfo('description');?></span>
			</div>
			<div id="h_right">
				<?php wp_nav_menu(array('theme_location'=>'top','fallback_cb'=>'','container_id'=>'top_nav'));?>
			</div>
		</div>
	</div>
