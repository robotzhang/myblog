<?php 
get_header();

if(is_category()) $title=get_cat_name(get_query_var('cat'));
if(is_tag()) $title=urldecode(get_query_var('tag'));
if(is_date()){
	$y=get_query_var('year') ? get_query_var('year').'年 ' : '';
	$m=get_query_var('monthnum') ? get_query_var('monthnum').'月 ' : '';
	$d=get_query_var('day') ? get_query_var('day').'日 ' : '';
	$title=$y.$m.$d.' 存档';
}

?>

	<div id="main">
		<div id="content">
			<h1 id="archive_title"><?php echo $title; ?></h1>
			<div id="crumbs"><?php web589_crumbs(); ?></div>
			<?php include_once('loop.php'); ?>
		</div>
		<?php get_sidebar();?>
	</div>
<?php get_footer();?>