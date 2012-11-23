<?php while(have_posts()): the_post();?>

	<div class="thumbnail"><?php echo web589_thumbnail(array(64,64)); ?></div>
	<div id="<?php the_ID()?>" <?php post_class();?>>
		<div class="triangle"></div>
		<div class="p_top"></div>
		<div class="p_middle">
			<h2><a href="<?php the_permalink();?>" title="<?php the_title_attribute(array('before'=>'查看 ','after'=>' 的文章'));?>"><?php the_title(); ?></a></h2>
			<div class="meta"><?php comments_popup_link('没有评论','评论(1)','评论(%)');?> <?php edit_post_link(); ?></div>			
			<div class="time"><?php the_time(); ?></div>
			<div class="content cb"><?php if(is_singular()) the_content(); else the_excerpt(); ?></div>
			<div class="more"><a href="<?php the_permalink();?>" title="<?php the_title_attribute(array('before'=>'查看 ','after'=>' 的文章'));?>">未完，继续阅读</a>&rarr;</div>
		</div>
		<div class="p_bottom">
			<span class="cat">分类：<?php the_category(',');?></span>
			<span class="tags">标签：<?php the_tags('',',','');?></span>
		</div>
	</div>
	<div class="cb"></div>

<?php endwhile;?>

<div id="page_navi"><?php posts_nav_link(); ?></div>