<?php /* Smarty version 2.6.26, created on 2016-03-29 08:44:08
         compiled from Backend/Default/Start.tpl */ ?>
<?php $this->assign('IDS_Layout_Class', 'Backend_Layouts_Default'); ?>
<?php $this->assign('IDS_Layout_Method', 'Default'); ?>            
            
            <div class="home">
                
                <div class="titleCont">
                    
                        <h1 style="padding-left:7px; padding-bottom:10px;">Panel de control</h1>
                        
                        <h2><img src="/images/icons/editPerfilJobs.png" title="usuario"/> Bienvenido <?php echo $this->_tpl_vars['Usuario']['Usuario']; ?>
</h2>
                
                
                <h1>Gestion administrativa</h1>        
                <div class="filtersBox filtersInfoBox">
            	
                <ul>
                    <li>
                    	<a href="/GestionAdministrativa/Main" class="linkSendHome"><img src="/images/icons/table_refresh.png" title="Ver el listado completo"/> Home Gestion administrativa &raquo;</a>
                    </li>
                </ul>
            </div> <!-- /filtersBox-->
                 

<h1>Gestion de produccion</h1>        
                <div class="filtersBox filtersInfoBox">
            	
                <ul>
                    <li>
						
	                    <a href="/Orden/ListCotizaciones"><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> Ver ordenes de trabajo para cotizar&raquo;</a>
						 
                    </li>
                    <li>
                    	<a href="/Orden/ListPreproduccion" class="linkSendHome"><img src="/images/icons/money_add.png" title="Ver ordenes de trabajo pendientes para facturar"/> Ver ordenes de trabajo en Preproduccion  &raquo;</a>
	
                    </li>
                    <li>
                    	<a href="/Orden/ListProduccion" class="linkSendHome"><img src="/images/icons/money_dollar.png" title=""/> Ver ordenes en Produccion &raquo;</a>

                    </li>
                </ul>
            </div> <!-- /filtersBox-->
            
<h1>Seguimiento y control</h1>        
                <div class="filtersBox filtersInfoBox">
            	
                <ul>
                    <li>
						
	                    <a href="/Orden/ListVentas"><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> Ver ordenes de trabajo con costos, presupuesto y por estados &raquo;</a>
						 
                    </li>
                    
                    <li>
						
	                    <a href="/Orden/List"><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> Ver todas las ordenes de trabajo (historico) &raquo;</a>
						 
                    </li>
                </ul>
            </div> <!-- /filtersBox-->            
                
                </div> <!-- titleCont -->
                
    
            </div> <!-- /home -->