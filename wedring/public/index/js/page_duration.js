(function (evt) {
	
	//event util
	evt = evt || (function() {
			var ua = (function(){var o={ie:0,opera:0,gecko:0,webkit:0,mobile:null};var ua=navigator.userAgent,m;if((/KHTML/).test(ua)){o.webkit=1}m=ua.match(/AppleWebKit\/([^\s]*)/);if(m&&m[1]){o.webkit=parseFloat(m[1]);if(/ Mobile\//.test(ua)){o.mobile="Apple"}else{m=ua.match(/NokiaN[^\/]*/);if(m){o.mobile=m[0]}}}if(!o.webkit){m=ua.match(/Opera[\s\/]([^\s]*)/);if(m&&m[1]){o.opera=parseFloat(m[1]);m=ua.match(/Opera Mini[^;]*/);if(m){o.mobile=m[0]}}else{m=ua.match(/MSIE\s([^;]*)/);if(m&&m[1]){o.ie=parseFloat(m[1])}else{m=ua.match(/Gecko\/([^\s]*)/);if(m){o.gecko=1;m=ua.match(/rv:([^\s\)]*)/);if(m&&m[1]){o.gecko=parseFloat(m[1])}}}}}return o})();
			var doc = document.documentElement;
			var body = document.body;
			
			var evt = {
				getPageX: function(e) {
					return ('pageX' in e) ? e.pageX : e.clientX + (doc && doc.scrollLeft || body && body.scrollLeft || 0) - (doc && doc.clientLeft || body && body.clientLeft || 0);
				},
			
				getPageY: function(e) {
					return ('pageY' in e) ? e.pageY : e.clientY + (doc && doc.scrollTop  || body && body.scrollTop  || 0) - (doc && doc.clientTop  || body && body.clientTop  || 0);
				}
			};
		
			if (document.addEventListener) { // W3C
				evt.on = function(el, type, handler) {		
					el.addEventListener(type, handler, false);
					return handler;
				};
				
				evt.on2 = evt.on;
				
				evt.un = function(el, type, handler) {
					el.removeEventListener(type, handler, false);
				};
				
				evt.stopPropagation = function(e) {
					e.stopPropagation();
				};
				
				evt.preventDefault = function(e) {
					e.preventDefault();
				};
				
				evt.getTarget = function(e) {
					return e.target;
				};

				evt.getRelTarget = function(e) {
					return e.relatedTarget;
				};
			} else { // IE
				evt.on = function(el, type, handler) {					
					el.attachEvent('on' + type, handler);
				};
				
				evt.on2 = function(el, type, handler) {
					var actualHandler = function() {
						handler.call(el, window.event);
					};
					el.attachEvent('on' + type, actualHandler);
					// Return the 'actualHandler' reference, so that you can un it later.
					return actualHandler;	
				};
				
				evt.un = function(el, type, handler) {
					el.detachEvent('on' + type, handler);
				};
				
				evt.stopPropagation = function(e) {
					e.cancelBubble = true;
				};
				
				evt.preventDefault = function(e) {
					e.returnValue = false;
				};
				
				evt.getTarget = function(e) {
					return e.srcElement;
				};
				evt.getRelTarget = function(e) {
					return e.fromElement === e.srcElement ? e.toElement : e.fromElement;
				};
			}
			
			evt.stop = function(e) {
				evt.stopPropagation(e);
				evt.preventDefault(e);
			};
			
			// ready
//			(function() {
//				var fns = [];
//				var is_ready = false;
//				
//				evt.ready = function(f) {					
//					fns.push(f);
//				};
//				
//				var _ready = function() {
//					if (!is_ready) {
//						is_ready = true;
//						evt.ready = function(f) {							
//							f();
//						};
//						each(fns, function(f) {												
//							f();
//						});
//					}
//				};
//				
//				if (ua.ie) {
//					
//			        var timer = setInterval(function() {
//			            try {
//			                // throws an error if doc is not ready			              
//			                document.documentElement.doScroll("left");
//			                clearInterval(timer);
//			                timer = null;
//			                _ready();
//			            } catch (ex) { 
//			            }
//			        }, 64); 	
//			        
//			        // var node = new Image;
//			        // var timer = setInterval(function() {
//			            // try {
//			                // // throws an error if doc is not ready			              
//			                // node.doScroll();
//			                // clearInterval(timer);
//			                // timer = null;
//			                // _ready();
//			                // node = null;
//			            // } catch (ex) { 
//			            // }
//			        // }, 64); 		
//			       
//					document.attachEvent("onreadystatechange", function() {
//						if ( document.readyState === "complete" ) {
//							document.detachEvent( "onreadystatechange", arguments.callee );
//							_ready();
//						}
//					});
//			        
//			    } else {
//			        evt.on(document, "DOMContentLoaded", _ready);
//			    }
//				
//				evt.on(window, 'load', _ready);
//			})();
			
			return evt;
		})();	
		
	function sendData(config) {
		var type = config.type || "IMAGE",
		cb = config.callback || function () {},
		url = config.url,
		param = paramObject2String(config.parameters);
		
		if (type == "IMAGE") {
            var a = new Image(1, 1);
            a.onload = function () {
                cb();
            };
            a.src = url + "?" + param;
		}
	}
	
	function paramObject2String(param) {
		var s = "";
		if (typeof param === "object") {
			for (var k in param) {
				s += ( k + "=" + encodeURIComponent(param[k]) + "&" );
			}
		} else {
			s = param;
		}
		return s.substring(0, s.length-1);
	}
	
	function applyTo(to, from) {
		for(var p in from) {
			to[p] = from[p];
		}
	}
	
	var ASK = AdStatisticKit = {
			args: {},
			pageDurationPingUrl: "http://t.l.qq.com/ping",
			pageDurationPingDefaultData: {
				t: "m", //m:活动 w: 腾果
				url: window.location.href,
				cpid: '',
				ref: document.referrer
			},
			initArgs: function () {
				var script = document.getElementById('ad_statistic_kit');
				try {
					var input_args = eval('(' + script.getAttribute('arguments') + ')');
					
					applyTo(this.pageDurationPingDefaultData, input_args);
				} catch(e) {
					// do nothing
				}
				
				if (this.args.pageDurationPingUrl) {
					this.pageDurationPingUrl = this.args.pageDurationPingUrl;
				}
				
			},
			init: function () {
				this.initArgs();
			},
			
			getPageOpenHandler: function () {
				var t = this,
				p = {ttp:"o"};
				applyTo(p, t.pageDurationPingDefaultData);
				
				return function() {
					sendData({ 
						type: "IMAGE",
						url : t.pageDurationPingUrl,
						parameters: p
					});
				};
			},
			
			getPageCloseHandler: function () {
				var t = this,
				p = {ttp:"c"};
				applyTo(p, t.pageDurationPingDefaultData);
				
				return function() {
					sendData({ 
						type: "IMAGE",
						url : t.pageDurationPingUrl,
						parameters: p
					});
				};
			},
			
			startPageDurationJob: function () {
				evt.on(window, "beforeunload", this.getPageCloseHandler());
				this.getPageOpenHandler()();
			}
	};
	
	ASK.init();
	ASK.startPageDurationJob();
	
})();