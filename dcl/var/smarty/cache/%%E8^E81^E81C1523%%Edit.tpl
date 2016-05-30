188
a:4:{s:8:"template";a:2:{s:24:"Backend/Cliente/Edit.tpl";b:1;s:30:"Backend/Cliente/ColumnForm.tpl";b:1;}s:9:"timestamp";i:1410985662;s:7:"expires";i:1410985662;s:13:"cache_serials";a:0:{}}
<script type="text/javascript" src="/scripts/Edit.js"></script>


<script type="text/javascript">
$(document).ready(function(){
    $("#FrmEdit").validate();
    
    // toUpper()
    //$("[name='data[Nombre]']").keyup(function(){
      //  $(this).val( $(this).val().toUpperCase() );
    //});
    

});

</script>


<a class="linkSendHome linkSendHomeEdit" href="/Cliente/List">&laquo; Volver al listado</a>

<h1>Editar Cliente &raquo; <span>52</span></h1>

<form id="FrmEdit" enctype="multipart/form-data" action="" method="post">
    <input type="hidden" name="data[Id]" value="52" />

    <input type="hidden" name="data[Status]" id="stateValue" value="1" />
    
        
    <div class="form">
        <div id="FormsColumn"> <!-- contiene toda la columna -->

    <div class="formButtons">
        <div class="info">
        <input type="button" class="btMinimize btBlock" value="" title="Bloquear arriba" />
        <!-- al clickear, que desactive el movimiento, y quede bloqueado arriba -->
        
        <div id="formButtonsContent">
        
            <ul>

                <li class="buttonsTop">
                <input type="submit" value="Guardar" class="btGray" title="Guardar" />
                <input type="reset" value="Cancelar" class="btGray" title="Cancelar" />
                </li>
            </ul>
            
        </div> <!-- /formButtonsContent -->
        
        </div> <!-- /info -->
    </div> <!-- /formButtons -->

</div> <!-- /FormsColumn -->            
                    
        <div class="contentEditor"> <!-- formulario de edicion de contenido -->
                
            <div class="productsEditorContent">
            
                <div class="contentTitles">
                    <label class="blue">Nombre</label>
                    <input type="text" class="required" name="data[Nombre]" value="Cabaña Argentina">
                </div> <!-- /contentTitles -->
                                         
                <div class="contentTitles">
                    <label class="blue">Razon social</label>
                    <input type="text" class="required" name="data[RazonSocial]" value="CARNES PORCINAS SELECCIONADAS SA">
                </div> <!-- /contentTitles -->
                
                <div class="contentTitles" id="">
                    <label class="blue">Tipo de IVA</label>
                    <p>Utilizado para facturar</p>
                    <!-- drop down -->               
                    <select name="data[TipoIvaId]" class="required">
                        <option value="">Seleccionar</option>
                                                <option value="1" selected="selected">Responsable inscripto - 21.00-- - (Tipo factura: A)</option>
                                                <option value="3" >Consumidor final - --21.00 - (Tipo factura: B)</option>
                                                <option value="4" >Exento - --21.00 - (Tipo factura: B)</option>
                                                <option value="5" >Responsable inscripto - -10.50- - (Tipo factura: A)</option>
                                                <option value="6" >Exento a - -- - (Tipo factura: A)</option>
                                                <option value="7" >Gravados 9.50 - 10.50-- - (Tipo factura: A)</option>
                                                <option value="8" >Rni proveedores - 21.00-10.50- - (Tipo factura: C)</option>
                                                <option value="9" >Monotributo - -- - (Tipo factura: B)</option>
                                                <option value="10" >Exento b - -- - (Tipo factura: B)</option>
                                                <option value="11" >Resp. insc exento - -- - (Tipo factura: A)</option>
                                                <option value="12" >Sin impuestos - -- - (Tipo factura: N)</option>
                                                <option value="13" >Servicios - 27.00-- - (Tipo factura: A)</option>
                                                <option value="14" >Monotributo - -- - (Tipo factura: C)</option>
                                            </select>
                </div> <!-- /contentTitles -->
                
                <div class="contentTitles" id="">
                    <label class="blue">Rubro</label>
                    <!-- drop down -->               
                    <select name="data[RubroId]" class="required">
                        <option value="">Seleccionar</option>
                                                <option value="2" selected="selected">Bancario</option>
                                                <option value="6" >Bebidas</option>
                                                <option value="13" >Comercio</option>
                                                <option value="7" >Construccion</option>
                                                <option value="11" >Electronicos/Electrodomesticos</option>
                                                <option value="5" >Laboratorios</option>
                                                <option value="4" >Limpieza y Cosmetica</option>
                                                <option value="9" >Seguros</option>
                                                <option value="8" >Serv. Medicos</option>
                                                <option value="10" >Siderurgicas</option>
                                            </select>
                </div> <!-- /contentTitles -->

                <div class="contentTitles">
                    <label class="blue">Nombre de contacto</label>
                    <input type="text" class="" name="data[PersonaContacto]" value="GUSTAVO NOGUES">
                </div> <!-- /contentTitles -->

                <div class="contentTitles">
                    <label class="blue">Email de persona de contacto</label>
                    <input type="text" class="email" name="data[PersonaEmail]" value="">
                </div> <!-- /contentTitles -->

                <div class="contentTitles">
                    <label class="blue">Persona Telefono</label>
                    <input type="text" class="" name="data[PersonaTelefono]" value="">
                </div> <!-- /contentTitles -->

                <div class="contentTitles">
                    <label class="blue">Rubro</label>
                    <input type="text" class="" name="data[Rubro]" value="16">
                </div> <!-- /contentTitles -->
				
                <div class="contentTitles">
                    <label class="blue">Cuit</label>
                    <input type="text" class="number" name="data[Cuit]" value="30707702695">
                </div> <!-- /contentTitles -->                       
                
                <div class="contentTitles" id="Localidad">
                    <label class="blue">Localidad</label>
                    <input type="text" class="" name="data[Localidad]" value="CABA">
                </div> <!-- /contentTitles -->
                    
                <div class="contentTitles">
                    <label class="blue">Direccion</label>
                    <textarea name="data[Direccion]" cols="45" rows="5">AV CORRIENTES 457 PISO 11 </textarea>
                </div> <!-- /contentTitles -->
                 
                 
                <div class="contentTitles">
                    <label class="blue">Codigo postal</label>
                    <input type="text" class="" name="data[CodigoPostal]" value="1043">
                </div> <!-- /contentTitles -->
                         
                    
                <div class="contentTitles">
                    <label class="blue">Telefono</label>
                    <input type="text" class="" name="data[Telefono]" value="43945200">
                </div> <!-- /contentTitles -->
                
                
                <div class="contentTitles">
                    <label class="blue">Fax</label>
                    <input type="text" class="number" name="data[Fax]" value="">
                </div> <!-- /contentTitles -->
                
                <div class="contentTitles">
                    <label class="blue">Email</label>
                    <input type="text" class="email" name="data[Email]" value="">
                </div> <!-- /contentTitles -->
                
                <div class="contentTitles">
                    <label class="blue">Saldo inicial</label>
                    <input type="text" class="number" name="data[SaldoInicial]" value="-51135.60">
                </div> <!-- /contentTitles -->
                           
                
                
            </div> <!-- /productsEditorContent -->
        </div>  <!-- /contentEditor -->
    </div> <!-- /form -->
</form>