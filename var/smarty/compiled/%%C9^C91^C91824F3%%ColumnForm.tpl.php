<?php /* Smarty version 2.6.26, created on 2016-05-04 13:59:11
         compiled from Backend/Cobranza/ColumnForm.tpl */ ?>
<div id="FormsColumn"> <!-- contiene toda la columna -->

    <div class="formButtons">
        <div class="info">
        <input type="button" class="btMinimize btBlock" value="" title="Bloquear arriba" />
        <!-- al clickear, que desactive el movimiento, y quede bloqueado arriba -->
        
        <div id="formButtonsContent">
        
            <ul>

                <li class="buttonsTop">
                <?php if (! $this->_tpl_vars['data']['Id']): ?>
                <input type="submit" value="Guardar" class="btGray" title="Guardar" />
                <?php endif; ?>
                <input type="reset" value="Volver" class="btGray" title="Volver" onclick="window.location='/GestionAdministrativa/Main/Tab/TabCobranzasPendientes'"/>
                </li>
            </ul>
            
        </div> <!-- /formButtonsContent -->
        
        </div> <!-- /info -->
    </div> <!-- /formButtons -->

</div> <!-- /FormsColumn -->