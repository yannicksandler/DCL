$(document).ready(function(){
/*  GOTO  */    
    /*  LIMPIAR "GOTO" */    
    $(".goTo").click(function(){
                        $(".goTo").val('');    
               });
    /*  RESETEAR "GOTO" */
    $(".goTo").blur(function(){
                    if( $(this).val() == '' )
                        $(".goTo").val('Ir a pag.');
                    else
                        $(".goTo").val($(this).val());
               });    
/*  GOTO  */
        
/*  DELETE  */
    $("#check_all").change(function(){
                    $(".check:checkbox").attr('checked', $('#check_all').is(':checked'));
                });
/*  DELETE  */
        
/*  ACCIONES DE OPCIONES HEADER    */
    $(".delete").click(function(){
                    $("#action").val('delete');
                    $("#frmAction").submit();
                });
    $("#paginadorStatusOptions .btText").click(function(){
                    $("#updateValue").val($(this).attr("svalue"));
                    $("#action").val('update');
                    $("#frmAction").submit();
                });
    $("#paginadorExportOptions .btText").click(function(){
                    $("#frmAction").attr("action",$(this).attr("to"));
                    $("#frmAction").attr("target","_blank");
                    $("#frmAction").submit();
                });
    $(".dropDown").click(function(){
                    $(this).parent("li").find("div.dropDownBox").toggle("slow");
                });
    $(".dropDown").blur(function(){
                    $(this).parent("li").find("div.dropDownBox").hide("slow");
                });
    $(".print").click(function(){
                    window.print();
                });
    $("#frmSearch").submit(function(){
                    if( $("#search").val() )
                    {
                    	//$('#search').val($('#search').val().replace(" ", "_").replace(" ", "_").replace(" ", "_").replace(" ", "_"));
                    	//alert($('#search').val());
                    	//alert(encodeURIComponent($("#search").val()));
                    	var search	=	$("#search").val();
                    	var url	=	$(this).attr('redirect') + escape(search);
                        //location.href = $(this).attr('redirect') + escape(search);
                        window.location	=	url;
                        
                    }
                    return false;
                });
/*  ACCIONES DE OPCIONES HEADER    */

/*  PAGINADO   */
    $("#goToPage").click(function(){
                        var $replacePage  =   $('.goTo').val();
                        if( $replacePage != 'Ir a pag.' )
                            location.href = $('.goToPage').val().replace('GOTO', $replacePage);
                    });
/*  PAGINADO   */
});