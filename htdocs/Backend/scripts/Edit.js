$(document).ready(function(){
	var name = ".scrollFix";
	var menuYloc = null;
	
	if( $(name).length > 0 )
	{
		menuYloc = parseInt($(name).css("top").substring(0,$(name).css("top").indexOf("px")))
		$(window).scroll(function () { 
			offset = menuYloc+$(document).scrollTop()+"px";
			$(name).animate({top:offset},{duration:500,queue:false});
		});
	}
	
	//	el blockear para que la caja no se mueva mas		
	$('.btBlock').click(function(){
		$('#FormsColumn').animate({top:"20px"},{duration:500,queue:false, complete: function(){ $('#FormsColumn').toggleClass("scrollFix"); } });
	});		
		
	//	desplegar las opciones de Estado del form status	
	$(".btArrow").click(function(){
		$("#statusOptions").show("slow");
	});
	//	ocultar las opciones de Estado del form status	
	$("#statusOptions").blur(function(){
		$(this).parent("li").find("div.dropDownBox").hide("slow");
	});
	// 	minimizar la caja del form status	
	$(".actionMinimize").click(function(){
		if( $(this).parents("div.info").find("ul:first").is(":hidden") ){
			$(this).parents("div.info").find("ul:first").show("slow");
			$(this).removeClass('btMaximize');			
		}else{
			$(this).addClass('btMaximize');
			$(this).parents("div.info").find("ul:first").hide("slow");
		}	
	});
	//	para la caja de form status, el cambio de seleccion de estado
	$("#statusOptions .btText").click(function(){
		$("#statusOptions").hide("slow");
		$("#statusIcon").html($(this).val());
		$("#statusIcon").removeClass();
		$("#statusIcon").addClass($(this).attr("setclass"));
		$("#stateValue").val($(this).attr("set"));
    });
	
	//	para las cajas de idioma
	$('.btLanguage').click(function(){
        $(this).next('.languageItems').toggle();
    });    
});