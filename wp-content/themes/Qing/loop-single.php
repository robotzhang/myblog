<?php while(have_posts()): the_post();?>

	<div id="crumbs"><?php web589_crumbs(); ?></div>
	<div class="thumbnail"><?php echo get_avatar(get_the_author_meta('ID'),64); ?></div>
	<div id="<?php the_ID()?>" <?php post_class();?>>
		<div class="triangle"></div>
		<div class="p_top"></div>
		<div class="p_middle">		
			<h1><a href="<?php the_permalink();?>" title="<?php the_title_attribute(array('before'=>'查看 ','after'=>' 的文章'));?>"><?php the_title(); ?></a></h1>
			<span class="time"><?php the_time(); ?></span>
			<span class="meta"><?php comments_popup_link('没有评论','1 评论','% 评论');?> <?php edit_post_link(); ?></span>
			<div class="content"><?php if(is_singular()) the_content(); else echo mb_strimwidth( get_the_excerpt(),0,300 ); ?></div>
			<div id="pages"><?php wp_link_pages();?></div>
		</div>
		<div class="p_bottom">
			<?php if(is_single()): ?>
			<span class="cat">分类：<?php the_category(',');?></span>
			<span class="tags">标签：<?php the_tags('',',','');?></span>
			<?php endif; ?>
		</div>

		<div id="comments" class="cb"><?php comments_template();?></div>

	</div>

<?php endwhile;?>