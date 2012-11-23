<?php

register_nav_menus(array(
	'top'=>'头部导航',
));


if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
}

function web589_thumbnail($size="thumbnail"){
	global $post;
	$args=array('post_type'=>'attachment','post_mime_type'=>'image','post_parent'=>$post->ID,'order'=>'asc');
	$images=get_children($args);
	if(has_post_thumbnail()) return get_the_post_thumbnail($post->ID,$size);
	else if($images){
		$attachment_id=key($images);
		return wp_get_attachment_image($attachment_id,$size);
	}
	else {
		$preg="/(<img )([^>]*)(>)/"; 
		$content=$post->post_content;
		preg_match($preg,$content,$img);
		return $img[0];
	}
}


register_sidebar(array(
	'id'=>'right',
	'name'=>'侧边栏',
	'before_title'  => '<h3 class="widgettitle">',
	'after_title'   => '</h3>'
));

add_filter('get_search_form','web589_search_form');
function web589_search_form($form){
    $form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
    <input type="text" value="' . get_search_query() . '" name="s" id="s" />
    <button type="submit" id="searchsubmit" value="确认"></button>
    </form>';

    return $form;	
}

function web589_crumbs($sep='&gt;&gt;',$home='首页'){
	$par=web589_get_parrents($sep);
	if(!empty($par)){
		$num=count($par);
		$m=1;
		echo '<a href="'.get_bloginfo('url').'">'.$home.'</a>'.$sep;
		foreach($par as $link=>$name){
			if($m==$num) echo $name;
			else echo '<a href="'.$link.'">'.$name.'</a>'.$sep;
			$m++;
		}
	}
}

add_action('wp_footer','w_qing');
function w_qing(){
	//echo base64_decode('PGRpdiBpZD0id19saW5rIj50aGVtZSBieSDlpKfkvqA8YSBocmVmPSJodHRwOi8vd3d3LndlYjU4OS5jb20iIHRhcmdldD0iX2JsYW5rIj7nvZHnq5nlu7rorr48L2E+PC9kaXY+');
}

function web589_get_parrents($sep){
	if(is_category()){
		$par=get_ancestors(get_query_var('cat'),'category');
		$num=count($par);
		for($i=$num;$i>=1;$i--){
			$j=$i-1;
			$id=$par[$j];
			$array[get_category_link($id)]=get_cat_name($id);
		}
		$array[get_category_link(get_query_var('cat'))]=get_cat_name(get_query_var('cat'));
	}
	if(is_page()){
		$par=get_ancestors(get_the_ID(),'page');
		$num=count($par);
		for($i=$num;$i>=1;$i--){
			$j=$i-1;
			$id=$par[$j];
			$page=get_page($id);
			$array[get_page_link($id)]=$page->post_title;
		}
		$cur_page=get_page(get_the_ID());
		$array[get_page_link(get_the_ID())]=$cur_page->post_title;		
	}
	if(is_single()){
		$cats=get_the_category();
		foreach($cats as $cat){
			foreach($cats as $child){
				if(!cat_is_ancestor_of($cat,$child)) $id=$cat->cat_ID;
			}
		}		
		$par=get_ancestors($id,'category');
		$num=count($par);
		for($i=$num;$i>=1;$i--){
			$j=$i-1;
			$p_id=$par[$j];
			$array[get_category_link($p_id)]=get_cat_name($p_id);
		};
		$array[get_category_link($id)]=get_cat_name($id);						
		$array[get_permalink()]=get_the_title();
	}
	if(is_tag()){
		$tag=get_tag(get_query_var('tag_id'));
		$array[]=$tag->name;
	}
	if(is_day() ||is_month() ||is_year()){
		$array[]=wp_title('',false);
	}	
	return $array;
}

add_filter('excerpt_length','web589Q_excerpt_length');
function web589Q_excerpt_length(){
	return 300;
}
