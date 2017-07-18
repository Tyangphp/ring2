$(function(){
	/*淡入淡出*/
	var i = 0;
	/*中间的ul*/
	var els=$(".ul_center li");
	var maxIndex = els.length;
	//淡入淡出动画
	function show(){
		els.eq(i).stop(true,true).fadeIn(800).siblings().fadeOut(800);
		$('.bc_left li').eq(i).addClass("li_border").siblings().removeClass("li_border");
	};		
	/*左边的ul*/
	$('.bc_left li').each(function(index){
		$(this).hover(function(){
			i=index;
			show(500);
		});
	});
	
	/*轮播图*/
	// 容器 （ul）
	var ul = $(".bc_left");
    // 容器里面的li
    var lis = ul.find("li");
    // 当前index
    var curIndex = 0;
    // 最大INDEX，因为每页显示4个，所有不能到最后一个，要-3.代表最后一页
    var BmaxIndex = lis.length-3;
    // 每个li的高度
    var PHeight = lis.height();
  
    function Tshow(index){
        ul.stop(true,true).animate({"marginTop":-index*(PHeight+22)+"px"},500);
    }
    // 上一个
	$(".top").click(function(){
		if(curIndex - 1 < 0){
			return false;
		}
		curIndex -=1;
		Tshow(curIndex);
	});
	// 下一个
	$(".bottom").click(function(){
		if(curIndex + 1 > BmaxIndex){
			return false;
		}
		curIndex +=1;
		Tshow(curIndex);
	});	
	 /*// 上一个
	$(".top").click(function(){
		if(curIndex - 1 < 0){
			$('.top').hide();
			return false;
		}
		$('.bottom').show();
		curIndex -=1;
		Tshow(curIndex);
	});
	// 下一个
	$(".bottom").click(function(){
		if(curIndex + 1 >= BmaxIndex){
			$('.bottom').hide();
			return false;	
		}
		curIndex +=1;
		Tshow(curIndex);
		$('.top').show();
	});	*/
	
	/*向右的按钮*/
	$(".big_next").click(function(){
        i = i+1 >=maxIndex ? 0 :i+1;
        show();
		//让右边与右边配对
		Tshow(Math.floor(i/2));
    });
});

$(function () {
    /*所有的参数点击加样式*/
    $('.thr_first i').click(function () {
        $(this).addClass("iborder").siblings().removeClass("iborder");
    });
    /*钻戒点击参数加样式*/
    $('.more_ul li').click(function () {
        $(this).addClass("moreul_sp").siblings().removeClass("moreul_sp");
    });
    /*刻字*/
    $(".write_choose").click(function () {
        $("#ipt_font").val($("#ipt_font").val() + ($(this).text()).charAt());
        //html改成text也可以执行
    });
    $(".mwrite_choose").click(function () {
        $("#manFont").val($("#manFont").val() + ($(this).text()).charAt());
    });
    $(".wwrite_choose").click(function () {
        $("#womanFont").val($("#womanFont").val() + ($(this).text()).charAt());
    });

    /*预览效果点击显示*/
    $(".ylxg").click(function () {
        $('.kzyl').show();
        var kz = $('.kzyl');
        kz.html($("#ipt_font").val())
        //html改成text也可以执行
    });
});
/*推荐产品*/
$(function(){
	/*轮播图*/
	// 容器 （ul）
	var Bul = $(".tjks_ul");
    // 容器里面的li
    var Blis = Bul.find("li");
    // 当前index
    var curIndex = 0;
    // 最大INDEX，因为每页显示4个，所有不能到最后一个，要-3.代表最后一页
    var BmaxIndex = Blis.length-3;
	//li的数量
	var liength =Blis.length;
    // 每个li的宽度
    var pWidth = Blis.width();
    // 容器宽度 ，不然li的 FLOAT left会换行
    Bul.css("width",pWidth*(BmaxIndex+liength)+"px");
    function show(index){
        Bul.stop(true,true).animate({"marginLeft":-index*(pWidth+54)+"px"},500);
    }
	$(".pre").click(function(){
		if(curIndex - 1 < 0){
			return false;
		}
		curIndex -=1;
		show(curIndex);
	});
	$(".next").click(function(){
		if(curIndex + 1 > BmaxIndex){
			return false;
		}
		curIndex +=1;
		show(curIndex);
	});		
});

/*浏览记录*/
$(function(){
	/*轮播图*/
	// 容器 （ul）
	var Cul = $(".read_ul");
    // 容器里面的li
    var Clis = Cul.find("li");
    // 当前index
    var curIndex = 0;
    // 最大INDEX，因为每页显示4个，所有不能到最后一个，要-3.代表最后一页
    var CmaxIndex = Clis.length-1;
	//li的数量
	var liength =Clis.length;
    // 每个li的宽度
    var pWidth = Clis.width();
    // 容器宽度 ，不然li的 FLOAT left会换行
    Cul.css("width",(pWidth+10)*(CmaxIndex+liength)+"px");
    function show(index){
        Cul.stop(true,true).animate({"marginLeft":-index*(pWidth+10)+"px"},500);
    }
	$(".read_pre").click(function(){
		if(curIndex - 1 < 0){
			return false;
		}
		curIndex -=1;
		show(curIndex);
	});
	$(".read_next").click(function(){
		if(curIndex + 1 > CmaxIndex){
			return false;
		}
		curIndex +=1;
		show(curIndex);
	});		
});

/*聚焦隐藏*/
$(function () {
    try {
        clearDefault("sirname", "先生姓名");
        clearDefault("password", "身份证号码");
    }
    catch (e)
    { }
});
/*页面初始，显示轮播图第一个*/
$(function () {
    try {
        $(".bc_left li").eq(0).mouseover();
    }
    catch (e) { }
})

/*收藏样式*/
function favoritesCss(isF) {
    if (isF) {
        $(".share span").eq(0).addClass("share_scclick");
        $(".share span").eq(0).text("已收藏商品");
        $(".share span").eq(0).unbind("click");
    }
    else {
        $(".share span").eq(0).removeClass("share_scclick");
        $(".share span").eq(0).text("收藏商品");
        $(".share span").eq(0).click(favoritesEvent);
    }
}

/*固定小导航*/
/*小导航固定*/
$(window).scroll(function(){
	if ($(window).scrollTop() >= 700) {
		$(".allthenav").addClass("buyxq-dw");
	}
	else {
		$(".allthenav").removeClass("buyxq-dw");
	};
});
/*箭头变大*/
$(function () {
    $('.big_next').hover(function () {
        $(this).addClass('big_next-hover');
    }, function () {
        $(this).removeClass('big_next-hover');
    })
})