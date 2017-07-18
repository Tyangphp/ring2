
/*底部添加*/
$(function(){
    window.onscroll = window.onresize = window.onload = function () {
        var ndiv = document.getElementById("openbnt");
        var sTop = document.documentElement.scrollTop || document.body.scrollTop;
        var cHeight = document.documentElement.clientHeight || document.body.clientHeight;
        nid = (cHeight - ndiv.offsetHeight) / 2;
        if (navigator.appVersion.indexOf("MSIE 6") > -1) {
            ndiv.style.top = parseInt(sTop + nid) + "px";
        } else {
            ndiv.style.top = nid + "px";
        }

        //商品下架 自动返回
        var url = window.location.href;
        if (url.indexOf("underGoods") > 0) {
            setTimeout("history.go(-1);", 5000);
            var i = 5;
            setInterval(function () {
                i = i - 1;
                document.getElementById("time").innerHTML = i;
            }, 1000);
        }
    }
//    var i = 5;
//    $(function () {
//        var count = 0;
//        count = count + 1;
//        function setshow() {
//            if ($(".news_tc").is(":hidden")) {
//                $('.news_tc').css('display', 'block');
//                setTimeout(sethide, 10000);
//            }
//        }
//        if (count <= 1) {
//            setTimeout(setshow, 20000);
//        }
//        function sethide() {
//            $('.news_tc').css('display', 'none');
//            setTimeout(setshow, 180000);
//        }
//        $('.tocclose').click(function () {
//            $('.news_tc').hide();
//        });
//        $('.sszs').click(function () {
//            $('.news_tc').hide();
//        });

//    });
       
    function openserver() {
        $("#Ffloat_kefu").show("slow");
        $("#bridgehead").show("slow");
        $("#openbnt").hide("slow");
    }

    function closebnt() {
        document.getElementById("bridgehead").style.display = 'none';
        $("#Ffloat_kefu").hide("slow");
        $("#openbnt").show("slow");
    }
});



