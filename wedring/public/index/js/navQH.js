/*颜色切换导航条切换*/
var OrderByComplete = function () { };
$(function () {
    /*nav切换*/
    $(".drchoose_ul li").each(function (index, el) {
        $(this).click(function () {
            $(this).addClass('choose_hover').siblings().removeClass("choose_hover");
        });
    });
    /*筛选切换*/
    $(".choose-ks span").each(function (index, el) {
        $(this).click(function () {
            $(this).addClass('other_color').siblings().removeClass("other_color");
            $('.other_color').toggleClass('ota_color').siblings().removeClass("ota_color");
        });
    });
    /*筛选切换*/
    $(".hot-ks span").each(function (index, el) {
        $(this).click(function () {
            $(this).addClass('other_color').siblings().removeClass("other_color");
            $(this).toggleClass('ota_color').siblings().removeClass("ota_color");
            OrderByComplete();
        });
    });
});

/*产品图片的变换*/
function toshowit() {
    $('.by_top').each(function (index, element) {
        $(this).hover(function () {
            $('.bything-one').eq(index).stop(true, true).animate({ opacity: 0 }, 500);
            $('.bything-two').eq(index).stop(true, true).animate({ opacity: 1 }, 500);
        }, function () {
            $('.bything-two').eq(index).stop(true, true).animate({ opacity: 0 }, 500);
            $('.bything-one').eq(index).stop(true, true).animate({ opacity: 1 }, 500);
        });
    });
};
$(function () {
    toshowit();
});

/*高级搜索按钮鼠标移动改变颜色*/
$(function () {
    $('.choose_cz').hover(function () {
        $(this).toggleClass('choose_cz-hover');
    });
    $('.choose_serach').hover(function () {
        $(this).toggleClass('choose_serach-hover');
    });
});
$(function () {
    $('.the_cz').hover(function () {
        $(this).toggleClass('the_cz-hover');
    });
    $('.the_ljss').hover(function () {
        $(this).toggleClass('the_ljss-hover');
    });
});
/*小导航固定*/
$(window).scroll(function () {
    if ($(window).scrollTop() >= 380) {
        $(".dr_choose").addClass("Detail-dw");
        //$(".allchose_nav").addClass("Detail-dw");
    }
    else {
        $(".dr_choose").removeClass("Detail-dw");
        //$(".allchose_nav").removeClass("Detail-dw");
    };
});

/*高级搜索*/
$(function () {
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
    /*价格鼠标移过*/
    $('.theline i').each(function (index, el) {
        $(this).hover(function () {
            $('.theline i').eq(index).addClass("hover_border");
        }, function () {
            $('.theline i').eq(index).removeClass("hover_border");
        });
    });
    /*点击出现更多选择*/
    $('.more_xq').click(function () {
        $('.spthe_more').hide();
        $('.hide_jd').show();
    });
    /*点击消失更多选择*/
    $('.search_sq').click(function () {
        $('.spthe_more').show();
        $('.hide_jd').hide();
    });
    /*填写框点击变色*/
    $('.zs_txt').focus(function () {
        $(this).addClass('clickit_bk');
        $('.zs_search').addClass('clickit_bk');
    }).blur(function () {
        $(this).removeClass('clickit_bk');
        $('.zs_search').removeClass('clickit_bk');
    });
    /*填写框点击变色*/
    $('.search_text input').focus(function () {
        $(this).addClass('clickit_bk');
    }).blur(function () {
        $(this).removeClass('clickit_bk');
    });
    /*点击消失确认边框*/
    $('body').click(function () {
        $('.sea_qr').hide();
    })
    /*确认框*/
    $('.sea_post').each(function (index, el) {
        $('.sea_post').eq(0).click(function () {
            $('.sea_qr').eq(0).show();
            $('.sea_qr').eq(1).hide();
            return false;
        });
        $('.sea_post').eq(1).click(function () {
            $('.sea_qr').eq(1).show();
            $('.sea_qr').eq(0).hide();
            return false;
        });
    });
    /*产品排序*/
    $('.thesec_word-left b i').each(function (index, el) {
        $(this).click(function () {
            $(this).addClass('kspx_click').siblings().removeClass("kspx_click");
            $('.kspx_click').toggleClass('sxpx_click').siblings().removeClass("sxpx_click");
        });
    });
});


var GetLength = function (str) {
    var realLength = 0, len = str.length, charCode = -1;
    for (var i = 0; i < len; i++) {
        charCode = str.charCodeAt(i);
        if (charCode >= 0 && charCode <= 128) realLength += 1;
        else realLength += 2;
    }
    return realLength;
};

function cutstr(str, len) {
    var str_length = 0;
    var str_len = 0;
    str_cut = new String();
    str_len = str.length;
    for (var i = 0; i < str_len; i++) {
        a = str.charAt(i);
        str_length++;
        if (escape(a).length > 4) {
            //中文字符的长度经编码之后大于4  
            str_length++;
        }
        str_cut = str_cut.concat(a);
        if (str_length >= len) {
            str_cut = str_cut.concat("");
            return str_cut;
        }
    }
    //如果给定字符串小于指定长度，则返回源字符串；  
    if (str_length < len) {
        return str;
    }
}

$(function () {
    $("#ipt_font").bind('keyup', function () {
        if (GetLength($(this).val()) > 10) {
            $(this).val(cutstr($(this).val(), 10));
            return;
        }
    });

    $('.write_choose').click(function () {
        if (GetLength($("#ipt_font").val()) > 10) {
            $("#ipt_font").val(cutstr($("#ipt_font").val(), 10));
            return;
        }
    });

    //对戒 刻字长度限制
    $("#manFont").bind('keyup', function () {
        if (GetLength($(this).val()) > 10) {
            $(this).val(cutstr($(this).val(), 10));
            return;
        }
    });

    $('.mwrite_choose').click(function () {
        if (GetLength($("#manFont").val()) > 10) {
            $("#manFont").val(cutstr($("#manFont").val(), 10));
            return;
        }
    });

    $("#womanFont").bind('keyup', function () {
        if (GetLength($(this).val()) > 10) {
            $(this).val(cutstr($(this).val(), 10));
            return;
        }
    });

    $('.wwrite_choose').click(function () {
        if (GetLength($("#womanFont").val()) > 10) {
            $("#womanFont").val(cutstr($("#womanFont").val(), 10));
            return;
        }
    });
});


