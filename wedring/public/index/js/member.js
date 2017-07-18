/*会员中心的JS*/
/*会员首页的li选项*/
$(function () {
    $('.member_cortr-sec li').each(function (index, element) {
        $(this).hover(function () {
            $('.member_cortr-sec li').eq(index).addClass('mb_border');
        }, function () {
            $('.member_cortr-sec li').eq(index).removeClass('mb_border');
        });
    });
});
/*内容显示隐藏*/
$(function(){
	$('.member_all-nav-ul li').each(function(index, element) {
        $(this).click(function(){
			$('.member_all-nav-ul li').eq(index).addClass('member_all-nav-click').siblings().removeClass('member_all-nav-click');
			/*内容的显示隐藏*/
			$('.member_news-it').eq(index).show().siblings().hide();
		});
    });
});
/*点击添加备注显示隐藏文字*/
$(function(){
	$('.service-handle-td3').click(function(){
		$('.word_ps').hide();
		$('.service-handle-td3').find('textarea').focus();
		var _this = $(this);
		$(this).find('textarea').blur(function(){
			if($.trim($(this).val()) == ""){
				_this.find('.word_ps').show();
			}
		})
	});
});
/*地址的选择*/
/*
$(function(){
	$('.shop_adress-top').each(function(index, element) {
        $(this).click(function(){
			$(this).addClass('check_bk').siblings().removeClass('check_bk');
		});
    });
});
*/
/*商品描述*/
$(function () {
    $('.member_ask-choose i').each(function (index, element) {
        $(this).click(function () {
            $(this).toggleClass("ask-choose-click");
        });
    });
});

/*输入框点击改变颜色*/
$(function () {
    $(".member_person-cort_left input").focus(function () {
        $(this).addClass("checkinput_color");
    }).blur(function () {
        $(this).removeClass("checkinput_color");
    });
});
/*填写地址的输入框改变颜色（2014年9月10日更新）*/
$(function () {
    $(".shop_adress-add input").focus(function () {
        $(this).addClass("checkinput_color");
        $(this).css('color', '#000');
    }).blur(function () {
        $(this).removeClass("checkinput_color");
    });
});
/*点击出现填写地址*/
$(function(){
	$('.member_adress-addtop').click(function(){
		$(this).toggleClass('member_adress-clicktop');
		$('.shop_adress-add').toggle();
	});
});
/*密码的输入框改变颜色*/
$(function () {
    $(".member_password-find input").focus(function () {
        $(this).addClass("checkinput_color");
    }).blur(function () {
        $(this).removeClass("checkinput_color");
    });
});
/*手机邮箱验证填写框改变颜色*/
$(function () {
    $(".member_person-all input").focus(function () {
        $(this).addClass("checkinput_color");
    }).blur(function () {
        $(this).removeClass("checkinput_color");
    });
});
/*删除选择项按钮增加样式*/
$(function(){
	$('.news-custre-del .bt2').hover(function(){
		$(this).toggleClass('bt1');
	});
});

/*聚焦有样式失焦去除样式*/
$(function(){
	$(".invoice_write input").focus(function(){
		$(this).addClass("checkinput_color");
  	}).blur(function(){
		$(this).removeClass("checkinput_color");
  	});
});

/*增加个人中心切换 相关系列等*/
$(function () {
    $('.themb_cp li').each(function (index, element) {
        $(this).click(function () {
            $(this).addClass("themb_cp-click").siblings().removeClass('themb_cp-click');
        });
    });
});


/*点击消失隐藏  纪念日*/
$(function () {
    $('.allitmb .mbjnr_bj').each(function (index, element) {
        $(this).click(function () {
            $('.member_jnrcor-show').eq(index).hide();
            $('.member_jnrcor-bj').eq(index).show();
        });
    });
    $('.allitmb-tel .mbjnr_bj').each(function (index, element) {
        $(this).click(function () {
            $('.member_telshow').eq(index).hide();
            $('.member_telbj').eq(index).show();
        });
    });
})
