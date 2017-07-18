/*购物车的JS*/
$(function(){
	/*地址选项*/
	$('.shop_adress-top label').each(function(index, element) {
        $(this).click(function(){
			$('.shop_adress-top').eq(index).addClass('check_bk').siblings().removeClass('check_bk');
		});
    });
	/*点击改变选择样式,显示订单备注及开发票*/
	$('.shop_adress-details p').each(function(index, element) {
        $(this).click(function(){
			$(this).toggleClass('clickshow');
			$('.shop_adress-all').eq(index).toggle();
		});
    });	
	/*发票选项的填写*/
	$('#ticket_yes').click(function(){
		$('.tickets-write input').removeAttr("disabled");
		$('.tickets-write select').removeAttr("disabled");
	});
	/*发票选项的不可填写*/
	$('#ticket_no').click(function(){
		$('.tickets-write input').attr("disabled","true");
		$('.tickets-write select').attr("disabled","true");
	});
});

/*付款方式选择*/
$(function(){
	$('.shop_ofor-nav li').each(function(index, element) {
        $(this).click(function(){
			$(this).addClass('shop_ofor-nav-click').siblings().removeClass('shop_ofor-nav-click');
			$('.shop_ofor-post').eq(index).show().siblings().hide();
		});
    });
});
/*按钮的颜色*/
$(function () {
    $('.join_cart').hover(function () {
        $(this).toggleClass('join_carthover');
    });
    $('.bt1').hover(function () {
        $(this).toggleClass('bt1_hover');
    });
    $('.bt3').hover(function () {
        $(this).toggleClass('bt1_hover');
    });
});
/*填写框点击变色*/
$(function () {
    $(".shop_adress-Toadd input").focus(function () {
        $(this).addClass("clickit_bk");
        $(this).css('color', '#000');
    }).blur(function () {
        $(this).removeClass("clickit_bk");
    });
})