
function getCookie(cookie_name) {

    var allcookies = document.cookie;

    var cookie_pos = allcookies.indexOf(cookie_name);

    if (cookie_pos != -1) {


        cookie_pos += cookie_name.length + 1;

        var cookie_end = allcookies.indexOf(";", cookie_pos);


        if (cookie_end == -1) {

            cookie_end = allcookies.length;

        }

        var value = unescape(allcookies.substring(cookie_pos, cookie_end)); 

    }
    return value;
}

//咨询
function zx(mid)
{
	var mycookie = getCookie('__MGAToken');
       $.ajax({
        url: 'http://i.darryring.com/napi/setcookies.ashx',
        type: 'GET',
        dataType: 'jsonp',
	data:{cok:mycookie }
	
    });
	  var params = {};
	    if(document) {
        params.domain = document.domain || ''; 
        params.url = document.URL || ''; 
        params.referrer = document.referrer || '';
	params.cookie=getCookie('__MGAToken') ||''; 
    }   
	  params.mzx=mid;
	 //拼接参数串
    var args = ''; 
    for(var i in params) {
        if(args != '') {
            args += '&';
        }   
        args += i + '=' + encodeURIComponent(params[i]);
    }   
 
    //通过Image对象请求后端脚本
    var img = new Image(1, 1); 
    img.src = 'http://analytics.darryring.com/1.gif?' + args;
}

(function () {
    var mycookie = getCookie('__MGAToken');
       $.ajax({
        url: 'http://i.darryring.com/napi/setcookies.ashx',
        type: 'GET',
        dataType: 'jsonp',
	data:{cok:mycookie }
	
    });

    var params = {};
    //Document对象数据
    if(document) {
        params.domain = document.domain || ''; 
        params.url = document.URL || ''; 
        params.title = document.title || ''; 
        params.referrer = document.referrer || ''; 
	params.cookie=getCookie('__MGAToken') ||'';
    }   
    //Window对象数据
    if(window && window.screen) {
        params.sh = window.screen.height || 0;
        params.sw = window.screen.width || 0;
        params.cd = window.screen.colorDepth || 0;
    }   
    //navigator对象数据
    if(navigator) {
        params.lang = navigator.language || ''; 
    }   
    //解析_maq配置
    if(_maq) {
        for(var i in _maq) {
            switch(_maq[i][0]) {
                case '_setAccount':
                    params.account = _maq[i][1];
                    break;
                default:
                    break;
            }   
        }   
    }   
    //拼接参数串
    var args = ''; 
    for(var i in params) {
        if(args != '') {
            args += '&';
        }   
        args += i + '=' + encodeURIComponent(params[i]);
    }   
 
    //通过Image对象请求后端脚本
    var img = new Image(1, 1); 
    img.src = 'http://analytics.darryring.com/1.gif?' + args;
})();