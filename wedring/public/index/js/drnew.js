/*资讯和最新动态的JS*/
/*最新动态的JS*/
$(function(){
	$('.newesthing_cort-nav li').each(function(index, element) {
        $(this).click(function(){
			$(this).addClass('newesthing_cort-check').siblings().removeClass('newesthing_cort-check');
		});
    });
});
/*资讯首页的JS*/
/*banner的轮播*/
$(function(){
	var t = 0;
	function toauto(){
		if(t==$('.newindex_all-first-banner li').length-1){  //判断是不是显示到最后一张
			t=0;
		}else{
			t++;
		}
		show();
	};
	//淡入淡出动画
	function show(){
		clearInterval(timer);
		$('.newindex_all-first-banner li').eq(t).stop(true,true).fadeIn(800).siblings().fadeOut(800);
		$('.newindex_all-first-page li').eq(t).addClass('page_click').siblings().removeClass('page_click');
			timer=setInterval(toauto,3500)
	};
	//自动切换
	var timer = timer = setInterval(toauto,3500);
	$('.newindex_all-first-page li').each(function(index, element) {
        $(this).hover(function(){
			t=index;
			show(500);
		});
    });
});
/*右边的banner*/
$(function(){
	var t = 0;
	function toauto(){
		if(t==$('.newindex_all-right-first li').length-1){
			t=0;
		}else{
			t++;
		};
		show();
	};
	function show(){
		clearInterval(timer);
		$('.newindex_all-right-first li').eq(t).fadeIn(800).siblings().fadeOut(800);
		$('.newindex_all-right-smalldian li').eq(t).addClass('newindex_all-right-small-hover').siblings().removeClass('newindex_all-right-small-hover');
		 	timer = setInterval(toauto,3500);
	};
	var timer = timer = setInterval(toauto,3500);
	$('.newindex_all-right-smalldian li').each(function(index, element) {
        $(this).hover(function(){
			t = index;
			show(500);
		});
    });
	$('newindex_all-right-first').hover(function(){
		clearInterval(timer);
	},function(){
		timer = setInterval(toauto,3500);
	});
});
/*点击修改样式*/
$(function(){
	$('.newindex_all-nav li').each(function(index, element) {
        $(this).click(function(){
			$(this).addClass('newindex_all-nav-click').siblings().removeClass('newindex_all-nav-click');
		});
    });
});
/*右边点击修改样式*/
$(function(){
	$('.newindex_all-right-hotnav li').each(function(index, element) {
        $(this).click(function(){
			$(this).addClass('newindex_all-right-hotnav-click').siblings().removeClass('newindex_all-right-hotnav-click');
		});
    });
});




