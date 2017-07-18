/*关于我们页面的JS*/
$(function(){
	/*点击显示隐藏*/
	$('.abc_left h3').each(function(index) {
		$(this).click(function(){
			$('.abc_left h4').show();
		});
	});
	$('.abc_left h4').each(function(index) {
		$('.abc_left h4').eq(index).click(function(){
		    $('.abc_left a').removeClass("specl_other");
		    $('.abc_left a').eq(index).addClass('specl_other');
		});
	});
	/*导航切换*/
	$('.newesthing_cort-nav li').each(function(index, element) {
        $(this).click(function(){
			$(this).addClass('newesthing_cort-check').siblings().removeClass('newesthing_cort-check');
		});
    });
})
/*小导航固定*/
/*
$(window).scroll(function(){
    if ($(window).scrollTop() >= 190) {
		$(".abc_left").addClass("abc_leftfix");
	}
else {
		$(".abc_left").removeClass("abc_leftfix");
	};
	$('.abc_left li').click(function(){
		$("html,body").stop(true, false).animate({"scrollTop": $('.zbk_top').offset().top-0},500); 
	})
});
*/

/*$(function () {
    STO = setInterval(scroll_slide, 2);
});
function scroll_slide() {
    $(".abc_leftfix").css({ "top": $(document).scrollTop() - $(".abc_leftfix").height() / 2 + 49 + "px" });
    if ($(".footer").offset().top - $(document).scrollTop() - 202 < $(".abc_leftfix").height()) {
        $(".abc_leftfix").css({ "top": $(".footer").offset().top - $(".abc_leftfix").height() - 386 + "px" });
    }
}*/

/*购买流程切换  （1106）*/
$(function () {
    /*导航一切换*/
    /*$('.ttop_right li').each(function (index, element) {
    $(this).click(function () {
    $('.ttop_right span').removeClass('sptdnav-left');
    $(this).addClass('ttop_spli').siblings().removeClass('ttop_spli');
    $('.ttop_right li').eq(index + 1).find('span').addClass('sptdnav-left').siblings().removeClass('sptdnav-left');
    $('.ttop_right i').removeClass('sptdnav-right');
    $('.ques_ul li').removeClass('spclick');
    $('.buy_question').show();
    $('.common_question').hide();
    });
    $('.ttop_right li').eq(5).click(function () {
    $('.ttop_right i').addClass('sptdnav-right');
    });
    });*/
    $('.question_allnav-top li').each(function (index, element) {
        $(this).click(function () {
            $(this).addClass('questionnav-click').siblings().removeClass('questionnav-click');
            $('.question_allnav-bottom li').eq(index).addClass('bs_show').siblings().removeClass('bs_show');
        })
    });
    /*左边导航切换*/
    $('.ques_ul li').each(function (index, element) {
        $(this).click(function () {
            $(this).addClass('spclick').siblings().removeClass('spclick');
            //上面的效果消失
            $('.ttop_right span').removeClass('sptdnav-left');
            $('.ttop_right li').removeClass('ttop_spli');
            //右边内容
            $('.buy_question').hide();
            $('.common_question').show();
        });
    });
    /*问题切换*/
    $('.com-question li').each(function (index, element) {
        $('.com-question h4').eq(index).click(function () {
            $('.com-question div').hide();
            $('.com-question div').eq(index).show();
        });
    });
})