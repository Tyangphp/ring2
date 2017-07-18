/**
 * 老式集成(无siteid参数时)，加载此文件
 * 此文件会获取siteid参数，然后重新执行正常加载
 * @param  {[type]} $         [description]
 * @param  {[type]} undefined [description]
 * @return {[type]}           [description]
 */
(function(window, undefined){/*@file: load.js */
	var headElement, node, scripturl, script;

	if( typeof NTKF_PARAM === 'undefined' ){
		tmpDebug('ERROR: NTKF_PARAM is not defined');
		return false;
	}

	if( !NTKF_PARAM.siteid ){
		tmpDebug('ERROR: NTKF_PARAM.siteid is not defined');
		return false;
	}

	script = document.getElementsByTagName('script');
	for(var i = 0; i < script.length; i++){
		if( script[i].src && /(ntkfstat|ntkf|nt)\.js/gi.test(script[i].src) ){
			scripturl = script[i].src.substr(0, script[i].src.lastIndexOf("/"));
			funcRemoveNode(script[i]);
			break;
		}
	}
	if( !scripturl ){
		tmpDebug('ERROR: script server url get failure.');
		return false;
	}
	
	headElement	= document.getElementsByTagName('head')[0];
	node		= document.createElement('script');
	node.type	= 'text/javascript';
	node.async	= 'async';
	node.charset= "utf-8";
	node.src	= scripturl + '/ntkfstat.js?siteid=' + NTKF_PARAM.siteid;
	headElement.insertBefore(node, headElement.lastChild);
	

	function tmpDebug(message){
		if( typeof console !== undefined ){
			return;
		}
		if( typeof console.error !== undefined ){
			console.error(message);
		}
		if( typeof console.info !== undefined ){
			console.info(message);
		}
	}
	function funcRemoveNode(element){
		var removeComplete = false;
		
		for(var methodName in element){
			try{
				if( typeof element[methodName] == 'function' ){
					element[methodName] = null;
				}
			}catch(e){
				tmpDebug('clear element function');
			}
		}
		if( element.parentNode ){
			try{
				element.parentNode.removeChild(element);
				removeComplete = true;
			}catch(e){}
		}
		if( !removeComplete ){
			var tElement = document.createElement('DIV');
			tElement.appendChild(element);
			tElement.innerHTML = '';
			if( tElement.parentNode ){
				try{
					tElement.parentNode.removeChild(tElement);
					removeComplete = true;
				}catch(e1){}
			}
		}
		return removeComplete;
	}
})(window);