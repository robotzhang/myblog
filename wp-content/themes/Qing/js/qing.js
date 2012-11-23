// JavaScript Document

jQuery(document).ready(function($){
	$('.widget ul li:last-child, #comments_list li:last-child').css('border-bottom','none');
	$('.widget li').mouseover(function(){$(this).css('background-color','white')});
	$('.widget li').mouseout(function(){$(this).css('background-color','#ddd')});
	$('.widget #searchform input#s').val('搜索');
	$('.widget #searchform input#s').focus(function(){
		var s_word=$(this).val();
		if(s_word=='搜索') $(this).val('');
	});
	$('.widget #searchform input#s').blur(function(){
		var s_word=$(this).val();
		if(s_word=='') $(this).val('搜索');
	});		
	$('.thumbnail img').corner('5px');
	$('.cat a,.tags a').corner('2px');
	$('.widgettitle,.widget #searchform').corner('4px');
	$('.widget ul,.widget .tagcloud, .widget #calendar_wrap, #comments_list').corner('bottom 4px');	
});
