/*共有JS*/
/*导航显示隐藏*/
$(function () {
    /*banner里的按钮样式切换*/
    /*$('.bt1').hover(function(){
    $(this).toggleClass('bt2');
    })*/
    /*导航左边内容显示隐藏*/
    $(".nav-ul li").each(function (index, el) {
        $(this).hover(function () {
            $(this).addClass('hover_li');
            if (index != 0 && index != 1) {
                $('.nav-div').eq(index - 2).show();
            };
        }, function () {
            $(this).removeClass('hover_li');
            $('.nav-div').hide();
        });
    });
    /*导航右边内容显示隐藏*/
    $(".lipos").hover(function () {
        $(this).addClass('hover_li');
        $(".theright_div").show();
    }, function () {
        $(this).removeClass('hover_li');
        $('.theright_div').hide();
    });
});
/*tab淡入淡出自动切换(new)*/
$(function () {
    var i = 0;
    /*控制导航*/
	var mit = 0;
	var ft = 0;
	var opat = 0;
	var lis=$('.ul-tab li').width();
    //淡入淡出动画
    function show() {
        $('.all_tab li').eq(i).stop(true, true).fadeIn(800).siblings().fadeOut(800);
    };
    function opa(){
		mit+=1;
		opat++;
		$('.ul_jdrun').css('width',mit+"px");
		$('.ul_bkjt-hover').css('width',opat+"px");
		var maxWidth = 980;
		//当箭头大于195时恢复默认0
		if(opat>=195){
			opat=0;
		}
		if(mit>=980){
			mit=0;
			ft=0;
			i=0;
			opat=0;
			show();
			$('.ul_bkjt').animate({'left':ft},500);
			$('.ul_bkjt-hover').animate({'left':ft},450);
		}
		if(mit%(980/5)==0 && mit != 0){
			ft+=lis;
			$('.ul_bkjt').animate({'left':ft},500);
			$('.ul_bkjt-hover').animate({'left':ft},450);
			i++;
	        show();
		}
	} ;
	var Ftimer = setInterval(opa, 30);
	$('.ul-tab li').each(function (index) {
        $(this).click(function () {
			$(this).addClass('click_tab').siblings().removeClass('click_tab');
			i = index;
            show();
            clearInterval(Ftimer);
            $('.ul_jdt').css('background','#ffd7d4')
            $('.ul_jdrun').hide();
            $('.ul_bkjt').hide();
        });
    });
    $('.ul-tab li').each(function (index) {
        $(this).hover(function () {
			$(this).addClass('hover_tab');
        },function(){
        	$(this).removeClass('hover_tab')
        });
    });
});
/*验证弹窗*/
$(function () {
	$('.buycort_right').find('.bt2').click(function () {
		$('.yz_password').show();
		$('.backall').show();
	});
    $('.yz_close').click(function () {
        $('.yz_password').hide();
        $('.backall').hide();
    });
});

function yanzhen() {
    $('.yz_password').show();
    $('.backall').show();
}



/*注册登录弹窗*/
/*点击增加样式（注册登录的边框）*/
$(function () {
    $('.tck_zcdl-ul li').each(function (index, element) {
        $(this).click(function () {
            $('.tck_zcdl-ul li').eq(index).addClass("zcdl_sp").siblings().removeClass("zcdl_sp");
            $('.tck_dl').eq(index).show().siblings().hide();
        });
    });
    $('.yz_close').click(function () {
        $('.tck_zcdl').hide();
        $('.backall').hide();
    });
    /*出现注册登录
    $('.button .bt2').click(function () {
        $('.tck_zcdl').show();
        $('.backall').show();
    });*/
});
/*填写框颜色*/
$(function () {
    $('input').blur(function () {
        $('.yzm_input').removeClass("clickit_bk");
        $('.zc_input').removeClass("clickit_bk");
        $('.the_input').removeClass("clickit_bk");
    });
    $('.the_input').each(function (index, element) {
        $(this).click(function () {
            $(this).addClass('clickit_bk').siblings().removeClass("clickit_bk");
            $('.the_input').eq(index).find('i').hide();
            $('.al_Input').eq(index).focus();
        });
        var _this = $(this);
        $(this).find('input').blur(function () {
            if ($.trim($(this).val()) == "") {
                _this.find('i').show();
            };
        });
    });
    /*验证码*/
    $('.yz_input').click(function () {
        $('.yzm_input').addClass('clickit_bk');
    });
    $('.zc_input').each(function (index, element) {
        $(this).click(function () {
            $(this).addClass('clickit_bk').siblings().removeClass("clickit_bk");
            $(this).find('i').hide();
            $(this).find("input").focus();
        });
        var _this = $(this);
        $(this).find('input').blur(function () {
            if ($.trim($(this).val()) == "") {
                _this.find('i').show();
            };
        });
    });
});
/*按钮改变颜色*/
/*增加样式*/
$(function () {
    $('.bt1').hover(function () {
        $(this).toggleClass('hover_button');
    });
});
$(function () {
    $('.bt2').hover(function () {
        $(this).toggleClass('hover_bt2');
    });
});
$(function () {
    $('.btton').hover(function () {
        $(this).toggleClass('tother_hover');
    });
});

/*搜索框点击变颜色*/
$(function () {
    $(".search input").focus(function () {
        $('.search').addClass("clickit_bk");
        $('.search input').addClass("clickit_bk");
    }).blur(function () {
        $('.search').removeClass("clickit_bk");
        $('.search input').removeClass("clickit_bk");
    });
});
/*鼠标移过增加透明度*/
$(function () {
    $('.news-ul li').each(function (index, element) {
        $(this).hover(function () {
            $('.ul-top').eq(index).addClass('ul_opacity');
            $('.ul-center a').eq(index).addClass('opacity_word');
        }, function () {
            $('.ul-top').eq(index).removeClass('ul_opacity');
            $('.ul-center a').eq(index).removeClass('opacity_word');
        });
    });
});
/*底部链接（鼠标移过增加高度）*/
$(function () {
    $('.orther_know').hover(function () {
        var otheight = $('.orther_know').height();
        $('.linkorther_know').css("height", otheight + "px");
        $('.orther_know').css("height", 100 + "px");
    }, function () {
        $('.linkorther_know').css("height", 35 + "px");
        $('.orther_know').css("height", 100 + "px");
    });
});
/*点击改变文本框输入颜色*/
$('input').focus(function () {
    $(this).css('color', '#000');
});
$('input').blur(function () {
    var val = $('input').val()
    if (val == "") {
        $(this).css('color', '#a6a6a6');
    } else {
        $(this).css('color', '#000');
    };
});
/*底部hover*/
$(function(){
	$('.Service_ul li').each(function (index, element){
		$(this).hover(function(){
			$('.Service_ul div').eq(index).addClass('Service_ul-img_hover');
			$('.Service_ul p').eq(index).addClass('Service_ulp_hover')
		},function(){
			$('.Service_ul div').eq(index).removeClass('Service_ul-img_hover');
			$('.Service_ul p').eq(index).removeClass('Service_ulp_hover')
		});
	});
});
/*新加百科*/
/*banner滚动*/
$(function () {
    var i = 0;
    function autoPlay() {
        if (i == $('.bkleft_banner li').length - 1) {  //判断是不是显示到最后一张，如果是下一张就显示第一张
            i = 0;
        } else {     //如果不是现实最后一张，就显示下一张，索引值+1
            i++;
        }
        show();  //执行动画
    };

    //淡入淡出动画
    function show() {
        clearInterval(timer);
        $('.bkleft_banner li').eq(i).stop(true, true).fadeIn(800).siblings().fadeOut(800);
        $('.small-xd span').eq(i).addClass("bs_dian").siblings().removeClass("bs_dian");
        timer = setInterval(autoPlay, 3500);
    };
    //自动切换
    var timer = timer = setInterval(autoPlay, 3500);
    $('.small-xd span').each(function (index) {
        $(this).hover(function () {
            i = index;
            show(500);
        });
    });
    //鼠标滑过添加透明度
    $('.bkleft_banner li').each(function (index, element){
    	$(this).hover(function(){
    		$(this).addClass('to_opacity');
    	},function(){
    		$(this).removeClass('to_opacity');
    	});
    });
    /*标题滑动*/
    $('.bkfirst_ul li').each(function (index, element){
    	$(this).hover(function(){
    		$(this).addClass('ts_list').siblings().removeClass("ts_list");
    	});
    });
});

/*新加JS*/
$(function(){
    //查询点击
    $('.loverit_write span').click(function () {
        $(this).addClass('cxit_click');
        $('.loverit_word').hide();
        //$('.loverit_wrong').show();
    });
    //鼠标移入出现提示移出消失提示
    $('.loverit_center').hover(function () {
        $('.loverit_word').show();
    }, function () {
        $('.loverit_word').hide();
        $('.loverit_wrong').hide();
    })
	/*点击改变颜色*/
	$('.lit_txt').focus(function () {
	    $(this).addClass('clickit_bk');
	});
	$('.lit_txt').blur(function () {
    	$(this).removeClass('clickit_bk');
    });
});




/*新加右边悬浮客服*/
$(function () {
    //+号变化
    $('.floatbig_show').hover(function () {
        $(this).addClass('floatbig_show-hover');
    }, function () {
        $(this).removeClass('floatbig_show-hover');
    });
    //-号变化
    $('.floatbig_hide').hover(function () {
        $(this).addClass('floatbig_hide-hover');
    }, function () {
        $(this).removeClass('floatbig_hide-hover');
    });
    //小客服变化
    $('.floatsmall_center-kf').hover(function () {
        $(this).addClass('floatsmall_center-kfhover');
    }, function () {
        $(this).removeClass('floatsmall_center-kfhover');
    });
    //大客服变化
    $('.floatbig_center-kf').hover(function () {
        $(this).addClass('floatbig_center-kfhover');
    }, function () {
        $(this).removeClass('floatbig_center-kfhover');
    });
    //小的出现大的隐藏
    $('.floatbig_hide').click(function () {
        $('.float_big').animate({ "right": -77 + 'px' }, 500);
        $('.float_small').animate({ "right": 2 + 'px' }, 500);
    });
    //大的出现小的隐藏
    $('.floatbig_show').click(function () {
        $('.float_small').animate({ "right": -77 + 'px' }, 500);
        $('.float_big').animate({ "right": 2 + 'px' }, 500);
    });
});
/*超过显示返回顶部*/
$(function () {
    $(window).scroll(function () {
        if ($(window).scrollTop() > 200) {
            $('.comeback').show();
        } else {
            $('.comeback').hide();
        };
        //鼠标点击回到顶部
        $('.comeback').click(function () {
            $("html,body").stop(true, false).animate({ "scrollTop": 0 + 'px' }, 300)
        })
    });
    //鼠标移过改变样式
    $('.comeback').hover(function () {
        $(this).addClass('comeback_hover');
    }, function () {
        $(this).removeClass('comeback_hover');
    });
});


/*新加banner滚动*/
$(function () {
    var i = 0;
    function autoPlay() {
        if (i == $('.indexbanner li').length - 1) {  //判断是不是显示到最后一张，如果是下一张就显示第一张
            i = 0;
        } else {     //如果不是现实最后一张，就显示下一张，索引值+1
            i++;
        }
        show();  //执行动画
    };

    //淡入淡出动画
    function show() {
        if (timer) { clearInterval(timer); }
        $('.indexbanner li').eq(i).stop(true, true).fadeIn(800).siblings().fadeOut(800);
        $('.indexbanner_bottom li').eq(i).addClass("click_inbanner").siblings().removeClass("click_inbanner");
        timer = setInterval(function () {
            autoPlay();
        }, 4000);
    };
    //自动切换
    var timer = setInterval(function () {
        autoPlay();
    }, 4000);
    $('.indexbanner_bottom li').each(function (index) {
        $(this).click(function () {
            i = index;
            show();
        });
    });
    $('.indexbanner-all').mouseover(function () {
        if (timer) { clearInterval(timer); }
    });
    $('.indexbanner-all').mouseleave(function () {
        if (timer) { clearInterval(timer); }
        timer = setInterval(function () {
            autoPlay();
        }, 4000);
    });
});


$(function () {
    $(".love_doit2").hide();
    $(".loverit_wrong2").hide();
    $(".loverit_word2").hide();

    $("#btnsub").click(function () {
        var txtCard = $("#textIDCard").val();
        txtCard = chkHalf(txtCard);
        var txtName = $("#textName").val();
        var Area = $("#txtArea").val();
        $(".loverit_wrong p").html("信息填写不正确，请重新输入。");
        if (txtName == "") {
            $(".loverit_wrong").show();
            return false;
        }
        if (txtCard == "") {
            $(".loverit_wrong").show();
            return false;
        }
     
        var reg = false;
        var sex = "";
        if (Area == 0)//中国大陆
        {
           
            reg = IdentityCodeValid(txtCard);
            //sex = getChinaSex(txtCard);
            //if (reg) {
            //    if (sex != "M") {
            //        $(".loverit_wrong p").html("很遗憾，仅支持男性身份验证。");
            //        $(".loverit_wrong").show();
            //        return;
            //    }
            //}
        }
        else if (Area == 1)//中国香港
        {
            reg = validateHKCard(txtCard);
        }
        else if (Area == 2) {//中国澳门
            reg = validateAMCard(txtCard);
            //sex = getTWSex(txtCard);
            //if (reg) {
            //    if (sex != "M") {
            //        $(".loverit_wrong p").html("很遗憾，仅支持男性身份验证。");
            //        $(".loverit_wrong").show();
            //        return;
            //    }
            //}
        }
        else if (Area == 3) {//中国台湾
            reg = validateTWCard(txtCard);
        }


        if (!reg) {
            $(".loverit_wrong").show();
            return false;
        }

        $.get("/API/DarryringYzAPI.ashx", { action: 'yzgm', card: txtCard, name: txtName }, function (data) {
            var json = $.parseJSON(data);
            if (json.Status == "0") {//未购买
                $(".toyz_begin").hide();
                $("#ng").text(json.Name);
                $(".wgm").show();
                return false;
            }
            //购买过
            if (json.Status == "1") {
                $(".toyz_begin").hide();
                $("#cg").text(json.Name);
                $(".gmg").show();
                return false;
            }
        });
    });


    $("#btnsub2").click(function () {
        var txtCard = $("#textIDCard").val();

        txtCard = chkHalf(txtCard);
        var txtName = $("#textName").val();
        var Area = $("#txtArea").val();
        $(".loverit_wrong p").html("信息填写不正确，请重新输入。");
        if (txtName == "") {
            $(".loverit_wrong").show();
            return false;
        }
        if (txtCard == "") {
            $(".loverit_wrong").show();
            return false;
        }

        //        if (!(/(^\d{15}$)|(^\d{17}([0-9]|X)$)/.test(txtCard))) {
        //            $(".loverit_wrong2").show();
        //            return false;
        //        }

        //if (!(IdentityCodeValid(txtCard) || validateHKCard(txtCard) || validateTWCard(txtCard) || validateAMCard(txtCard))) {
        //    $(".loverit_wrong2").show();
        //    return false;
        //}

        var reg = false;
        var sex = "";
        if (Area == 0)//中国大陆
        {
            reg = IdentityCodeValid(txtCard);

            //sex = getChinaSex(txtCard);

            //if (reg) {
            //    if (sex != "M") {
            //        $(".loverit_wrong p").html("很遗憾，仅支持男性身份验证。");
            //        $(".loverit_wrong").show();
            //        return;
            //    }
            //}
        }
        else if (Area == 1)//中国香港
        {
            reg = validateHKCard(txtCard);
        }
        else if (Area == 2) {//中国澳门
            reg = validateAMCard(txtCard);
            //sex = getTWSex(txtCard);
            //if (reg) {
            //    if (sex != "M") {
            //        $(".loverit_wrong p").html("很遗憾，仅支持男性身份验证。");
            //        $(".loverit_wrong").show();
            //        return;
            //    }
            //}
        }
        else if (Area == 3) {//中国台湾
            reg = validateTWCard(txtCard);

        }
        if (!reg) {
            $(".loverit_wrong").show();
            return false;
        }

        $.get("/API/DarryringYzAPI.ashx", { action: 'yz', card: txtCard, name: txtName }, function (data) {
            var json = $.parseJSON(data);
            if (json.Status == "0") {
                window.location.href = "/dryz/ng_" + json.Name + ".html";
                return false;
            }
            if (json.Status == "1") {
                window.location.href = "/dryz/cg_" + json.Name + "_" + json.GName + "_" + json.Dates + "_" + json.Id + ".html";
                return false;
            }
            if (json.Status == "2") {
                window.location.href = "/dr_ng2.aspx?name=" + json.Name;
                return false;
            }
        });
    });
});


function IdentityCodeValid(code) {
    var city = { 11: "北京", 12: "天津", 13: "河北", 14: "山西", 15: "内蒙古", 21: "辽宁", 22: "吉林", 23: "黑龙江 ", 31: "上海", 32: "江苏", 33: "浙江", 34: "安徽", 35: "福建", 36: "江西", 37: "山东", 41: "河南", 42: "湖北 ", 43: "湖南", 44: "广东", 45: "广西", 46: "海南", 50: "重庆", 51: "四川", 52: "贵州", 53: "云南", 54: "西藏 ", 61: "陕西", 62: "甘肃", 63: "青海", 64: "宁夏", 65: "新疆", 71: "台湾", 81: "香港", 82: "澳门", 91: "国外 " };
    var tip = "";
    var pass = true;
    var isIDCard = /^[1-9]\d{7}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}$/; //15位身份证
    if (code.length == 15) {
        if (isIDCard.test(code)) {
            pass = true;
        }
    }
    else {
        if (!code || !/^\d{6}(18|19|20)?\d{2}(0[1-9]|1[0-2])(0[1-9]|[0-2]\d|3[01])\d{3}(\d|X)$/i.test(code)) {
            tip = "身份证号格式错误";
            pass = false;
        } else if (!city[code.substr(0, 2)]) {
            //tip = "地址编码错误";
            tip = "身份证号格式错误";
            pass = false;
        }
        else {
            //18位身份证需要验证最后一位校验位
            if (code.length == 18) {

                code = code.split('');
                //∑(ai×Wi)(mod 11)
                //加权因子
                var factor = [7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2];
                //校验位
                var parity = [1, 0, 'X', 9, 8, 7, 6, 5, 4, 3, 2];
                var sum = 0;
                var ai = 0;
                var wi = 0;
                for (var i = 0; i < 17; i++) {
                    ai = code[i];
                    wi = factor[i];
                    sum += ai * wi;
                }
                var last = parity[sum % 11];
                if (parity[sum % 11] != code[17]) {
                    //tip = "校验位错误";
                    tip = "身份证号格式错误";
                    pass = false;
                }
            }
            else {
                pass = false;
            }
        }
    }
    //if (!pass) alert(tip);
    return pass;
}

/*
 验证台湾身份证号码
*/
function validateTWCard(idCard) {
    if (!(/(^[a-zA-Z]\d{9}$)/.test(idCard))) {
        return false;
    }
    else {
        return true;
    }
}
/*
验证香港身份证号码
*/
function validateHKCard(idCard) {
    var regex = /^[a-zA-Z]\d{6}\([0-9a-zAZ-Z]\)$/;
    if (regex.test(idCard)) {
        return true;
    }
    else {
        return false;
    }
}
/*
验证澳门身份证号码
*/
function validateAMCard(idCard) {
    var regex = /^[1|5|7][0-9]{6}\([0-9a-zAZ-Z]\)$/;
    if (regex.test(idCard)) {
        return true;
    }
    else {
        return false;
    }
}

//判断全角字符，返回新字符串
function chkHalf(str) {
    for (var i = 0; i < str.length; i++) {
        var strCode = str.charCodeAt(i);
        if ((strCode > 65248) && strCode < 65375 || (strCode == 12288)) {
            str = str.replace(str[i], String.fromCharCode(strCode - 65248));
        } else {
            str = str.replace(str[i], String.fromCharCode(strCode));
        }
    }
    return str;
}

/** 
     * 根据身份编号获取性别 
     *  大陆身份证
     * @param idCard 
     *            身份编号 
     * @return 性别(M-男，F-女，N-未知) 
     */
function getChinaSex(idcard) {
    var sex = "N";
    var sCardNum = "";
    if (idcard.length == 15) {
        sCardNum = idcard.substring(13, 14);
    }
    else if (idcard.length == 18) {
        sCardNum = idcard.substring(16, 17);
    }

    if (parseInt(sCardNum) % 2 != 0) {
        sex = "M";
    } else {
        sex = "W";
    }
    return sex;
}

function getTWSex(idcard) {
    var sex = "N";
    var sCardNum = idcard.substring(1, 2);

    if (sCardNum == "1") {
        sex = "M";
    } else if (sCardNum == "2") {
        sex = "W";
    }
    return sex;
}


/*点击关闭温馨提示（0127）*/
/*20150226去掉
$(function () {
    function gsshow() {
        $('.backall').show();
        $('.ts_warm').show();
    };
    function gshide() {
        $('.ts_warm').fadeOut();
        $('.backall').fadeOut();
    };

    function fshow() {
        var co = getcookie("msg");
        switch (co) {
            case "1":
                gsshow();
                setCookie("msg", "12");
            case "12":
                gsshow();
                setCookie("msg", "123");
                break;
            case "123":
                gsshow();
                setCookie("msg", "1234");
                break;
            case null:
                gsshow();
                setCookie("msg", "1");
                break;
        }
        //        if (getcookie("msg") != "123") {

        //            gsshow();

        //            setCookie("msg", "1");
        //            //document.cookie = "msg=" + "1";
        //        }
    }
    fshow();
    $('.ts_warm-close').click(function () {
        gshide();
    });
    setTimeout(gshide, 10000)
});
function getcookie(name) {
    var arr, reg = new RegExp("(^| )" + name + "=([^;]*)(;|$)");

    if (arr = document.cookie.match(reg))

        return unescape(arr[2]);
    else
        return null;
}

function setCookie(name, value) {
    
    var exp = new Date();
    exp.setTime(exp.getTime() + 1 * 60 * 60 * 1000);
    document.cookie = name + "=" + escape(value) + ";expires=" + exp.toGMTString();
} 
*/