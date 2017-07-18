function setorderid(orderid,price)
{
	  var params = {};
	    if(document) {
        params.domain = document.domain || ''; 
        params.url = document.URL || ''; 
        params.referrer = document.referrer || ''; 
    }   

	   params.morderid=orderid;
	  params.morderprice=price;
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

