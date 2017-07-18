/*聚焦*/
function clearDefault(Class,str){
	$("."+Class).focus(function(){
		if($(this).val() == str){
			$(this).val('');
		}
	}).blur(function(){
			if($(this).val() == ''){
			    $(this).val(str);
			    $(this).css('color', '#a6a6a6');
			}
		})
};