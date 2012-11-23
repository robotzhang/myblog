	<div id="footer">
		<?php if( is_home() && !is_paged() ): ?>
		<div id="friendlink"><h4>友情链接：</h4><?php wp_list_bookmarks(array('show_images'=>false,'categorize'=>false,'title_li'=>''));?></div>
		<?php endif; ?>
		<div id="copyright" class="cb">©<?php echo date('Y');?> <a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a> All rights reserved.</div>
	<?php wp_footer();?>
	</div>
</body>
</html>
