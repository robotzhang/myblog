<?php get_header();?>
	<div id="main">
		<div id="content">
			<h1 id="archive_title">搜索词：<?php echo get_query_var('s'); ?></h1>
			<?php include_once('loop.php'); ?>
		</div>
		<?php get_sidebar();?>
	</div>
<?php get_footer();?>