/*高级搜索*/
$(function () {
    /*详情评论等的切换*/
    $('.gdnav_ul li').each(function (index) {
        $(this).click(function () {
            $("html,body").stop(true, false).animate({ "scrollTop": 600+'px'}, 500);
            $(this).addClass("gdnav_sp").siblings().removeClass("gdnav_sp");
            $('.xqbuy_it').eq(index).show().siblings().hide();
        });
    });
    /*显示高级搜索*/
    $('.choose_more').click(function () {
        $('.gj_search').slideDown();
        $("html,body").stop(true, false).animate({ "scrollTop": 700 + 'px' }, 500);
    });
    $('.toclose').click(function () {
        $('.gj_search').slideUp();
        $("html,body").stop(true, false).animate({ "scrollTop": 0 + 'px' }, 500);
    });
});

/*新加高级搜索*/
$(function () {
    $('.tz_border input').focus(function () {
        $(this).addClass('clickit_bk');
    }).blur(function () {
        $(this).removeClass('clickit_bk');
    });

    /*鼠标移过提示*/
    $('.the_color b').each(function (index, el) {
        $(this).hover(function () {
            $('.the_color i').eq(index).addClass("hover_border");
            $('.the_color em').eq(index).show();
        }, function () {
            $('.the_color i').eq(index).removeClass("hover_border");
            $('.the_color em').eq(index).hide();
        });
    });
});
/*结果的调用*/
function result_hover() {
    /*搜索重置变色*/
    $('.the_cz').hover(function () {
        $(this).toggleClass('the_cz-hover');
    });
    $('.the_ljss').hover(function () {
        $(this).toggleClass('the_ljss-hover');
    });
    /*高级搜索结果*/
    $('.result li').each(function (index, el) {
        $(this).hover(function () {
            $(this).addClass('result_hover');
        }, function () {
            $(this).removeClass('result_hover');
        });
    });
};
/*调用*/
$(function () {
    result_hover();
})