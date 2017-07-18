/*


	
	
	new Magnifier("Magnifier",{
		pPath:'',	//大图路径
		sWidth:100,//小框宽度
		sHeight:100,//小框高度
		sOpacity:0.4,//小框透明度
		pWidth:500,	//大图宽
		pHeight:500,//大图高
		mLeft:85,	//大图距离小图左边的距离
		mTop:0		//大图距离小图上边的距离	
	});

*/

function Magnifier(id,opt){
	this.defaults = {
		pPath:'',	//大图路径
		sWidth:100,//小框宽度
		sHeight:100,//小框高度
		sOpacity:0.4,//小框透明度
		pWidth:500,	//大图宽
		pHeight:500,//大图高
		mLeft:25,	//大图距离小图左边的距离
		mTop:0		//大图距离小图上边的距离
	}
	var _this = this;
	this.obj = document.getElementById(id);
	if(opt){
		for(var o in opt){
			this.defaults[o] = opt[o];
		}
	}
	this.defaults.pPath =  this.defaults.pPath == '' ? this.obj.getElementsByTagName('img')[0].src : this.defaults.pPath;//默认大图路径
	this.posX = 0;
	this.posY = 0;
	this.oSmall = null;
	this.bigElement = null;
	this.bigImage = null;
	this.obj.onmouseover = function(e){
		_this.enter(e);
	};
}
Magnifier.prototype.enter = function(e){
	var _this = this;
	var e = e || event;
	if(this.oSmall == null){
		//添加小框框
		this.oSmall = document.createElement('span');
		this.oSmall.style.position = 'absolute';
		this.oSmall.style.left = 0;
		this.oSmall.style.top = 0;
		this.oSmall.style.display = 'block';
		this.oSmall.style.width = this.defaults.sWidth +'px';
		this.oSmall.style.height = this.defaults.sHeight +'px';
		this.oSmall.style.background = '#999';
		this.oSmall.style.border = '1px solid #000';
		this.oSmall.style.cursor = 'move';
		this.oSmall.style.opacity = this.defaults.sOpacity;
		this.oSmall.style.filter = 'alpha(opacity='+(this.defaults.sOpacity*100)+')';
		this.oSmall.style.zoom = 1;
		this.obj.appendChild(this.oSmall);
	}else{
		this.oSmall.style.display = 'block';
	}
	
	
	if(this.bigElement == null){
		//添加大图
		this.bigElement = document.createElement('div');
		this.bigImage = document.createElement('img');
		var img = new Image();
		var _this = this;
		img.src = this.defaults.pPath;
		this.bigImage.src = this.defaults.pPath;
		this.bigElement.appendChild(this.bigImage);
		this.obj.appendChild(this.bigElement);
		this.bigImage.style.position = 'absolute';
		img.onload = function(){
			_this.bigImage.style.width = img.width+'px';
			_this.bigImage.style.height = img.height+'px';
		}
		this.bigElement.style.position = 'absolute';
		this.bigElement.style.overflow = 'hidden';
		this.bigElement.style.width =  this.defaults.pWidth +'px';
		this.bigElement.style.height =  this.defaults.pHeight +'px';
		this.bigElement.style.top =  this.defaults.mTop +'px';
		this.bigElement.style.right = - (parseInt( this.css(this.bigElement,'width') ) + this.defaults.mLeft) +'px';
		this.bigElement.style.border = '1px solid #ccc';
		this.bigElement.style.zIndex = '99998';
	}else{
		this.bigElement.style.display = 'block';
	}
	
	
	this.posX = $(this.obj).offset().left + this.oSmall.offsetWidth/2;
	this.posY = $(this.obj).offset().top + this.oSmall.offsetHeight/2;
	document.onmousemove = function(e){
		_this.move(e);
	}
	this.obj.onmouseout = function(){
		_this.out();
	}
}
Magnifier.prototype.move = function(e){
	var e = e || event;
	var tt = document.documentElement.scrollTop || document.body.scrollTop;
	var ll = document.documentElement.scrollLeft || document.body.scrollLeft;
	//限制小框移动范围
	var l = ll + e.clientX - this.posX;
	var t = tt + e.clientY - this.posY;
	if(l < 0){
		l = 0;
	}else if(l >  this.obj.offsetWidth - this.oSmall.offsetWidth ){
		l =  this.obj.offsetWidth - this.oSmall.offsetWidth ;
	}
	if(t < 0){
		t = 0;
	}else if(t >  this.obj.offsetHeight - this.oSmall.offsetHeight ){
		t =  this.obj.offsetHeight - this.oSmall.offsetHeight ;
	}
	this.oSmall.style.left = l + 'px';
	this.oSmall.style.top = t + 'px';
	
	var percentX = l/(this.oSmall.offsetWidth-this.obj.offsetWidth);
	var percentY = t/(this.oSmall.offsetHeight-this.obj.offsetHeight);
	/*大图移动位置*/
	this.bigImage.style.left = percentX * (this.bigImage.offsetWidth-this.bigElement.offsetWidth) + "px";
	this.bigImage.style.top = percentY * (this.bigImage.offsetHeight-this.bigElement.offsetHeight) + "px";	
}
Magnifier.prototype.out = function(e){
	document.onmousemove = null;
	this.oSmall.style.display = 'none';
	this.bigElement.style.display = 'none';
}
Magnifier.prototype.css = function(obj,attr){
	return obj.currentStyle ? obj.currentStyle[attr] : window.getComputedStyle(obj,null)[attr];
}