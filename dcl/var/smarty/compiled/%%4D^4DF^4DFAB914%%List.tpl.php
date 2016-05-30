<?php /* Smarty version 2.6.26, created on 2014-09-19 13:06:14
         compiled from Backend/Layouts/List.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'Backend/Layouts/List.tpl', 45, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Backend/Layouts/Include/Header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<body>
    
    <div id="Container">
            
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Backend/Layouts/Include/SiteHeader.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            
        <script type="text/javascript" src="/scripts/List.js"></script>
            
        <div id="Content">
            <div class="listado">
                <h1><?php echo $this->_tpl_vars['sectionTitle']; ?>
</h1>
                <a href="/<?php echo $this->_tpl_vars['varController']; ?>
/<?php echo $this->_tpl_vars['varAction']; ?>
<?php if ($this->_tpl_vars['rpp']): ?>/pagesize/<?php echo $this->_tpl_vars['list']['pageSize']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['list']['page']): ?>/page/<?php echo $this->_tpl_vars['list']['page']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['orderBy']): ?>/order/<?php echo $this->_tpl_vars['orderBy']; ?>
_<?php if ($this->_tpl_vars['order'] == 'DESC'): ?>DESC<?php else: ?>ASC<?php endif; ?><?php endif; ?>/" class="linkSendHome"><img src="/images/icons/table_refresh.png" title="Volver a ver el listado completo"/> Limpiar Busqueda &raquo;</a>
                <?php if (! $this->_tpl_vars['notAdd']): ?><a href="/<?php echo $this->_tpl_vars['varController']; ?>
/Edit" class="linkSendHome"><img src="/images/icons/add.png" title="Agregar"/>  Agregar nuevo &raquo;</a><?php endif; ?>
                <?php echo $this->_tpl_vars['specialLink']; ?>

                
                <?php if (( ! ( ( $this->_tpl_vars['varController'] == 'Insumo' ) || ( $this->_tpl_vars['varController'] == 'Orden' ) || ( $this->_tpl_vars['varController'] == 'OrdenPago' ) || ( $this->_tpl_vars['varController'] == 'Facturacion' ) || ( $this->_tpl_vars['varController'] == 'Cobranza' ) || ( $this->_tpl_vars['varController'] == 'CuentaCorriente' ) || ( $this->_tpl_vars['varController'] == 'FacturaCompra' ) || ( $this->_tpl_vars['varController'] == 'Cheque' ) || ( $this->_tpl_vars['varController'] == 'OrdenCompra' ) ) )): ?>
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Backend/Layouts/Include/Search.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                <?php endif; ?>
            
            <form id="frmAction" action="" method="post">
                <?php if ($this->_tpl_vars['filterBox']): ?>
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['filterBox'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                <?php endif; ?>
                    
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Backend/Layouts/Include/Paginator.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                    
                <div class="list">
                    <?php if ($this->_tpl_vars['deleteErrorMessage'] || $this->_tpl_vars['updateErrorMessage']): ?><p class="error"><?php echo $this->_tpl_vars['deleteErrorMessage']; ?>
<?php echo $this->_tpl_vars['updateErrorMessage']; ?>
</p><?php endif; ?>
                        
                    <?php if ($this->_tpl_vars['deleteSuccessMessage'] || $this->_tpl_vars['updateSuccessMessage']): ?><p class="success"><?php echo $this->_tpl_vars['deleteSuccessMessage']; ?>
<?php echo $this->_tpl_vars['updateSuccessMessage']; ?>
</p><?php endif; ?>
                        
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['titleFile']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                        
                    <div class="listItems">
                        <table border="0" cellpadding="0" cellspacing="0">
                        <?php if (count($this->_tpl_vars['list']['data'])): ?>
                            <?php $_from = $this->_tpl_vars['list']['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['record']):
?>
                                <?php if ($this->_tpl_vars['key'] % 2): ?><?php $this->assign('className', ' class="gray"'); ?><?php else: ?><?php $this->assign('className', ''); ?><?php endif; ?>
                                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['recordFile']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                            <?php endforeach; endif; unset($_from); ?>
                        <?php else: ?>
                            <tr class="noResult">
                                <td colspan="10" align="center"><h2 class="noResult">No se ha encontrado ning&uacute;n resultado.</h2></td>
                            </tr>
                        <?php endif; ?>
                        </table>
                    </div> <!-- /listItems -->
                        
                </div> <!-- /list -->
                
                    
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Backend/Layouts/Include/Paginator.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            <input type="hidden" name="updateNewValue" id="updateValue" value="" />
            <input type="hidden" name="postAction" id="action" value="" />
            <input type="hidden" name="listAction" id="listAction" value="list" />
            </form>                
            </div> <!-- /listado -->
        </div>
            
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Backend/Layouts/Include/Footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            
    </div> <!-- /Container -->
    
</body>
</html>