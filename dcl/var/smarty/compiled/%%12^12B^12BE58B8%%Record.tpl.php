<?php /* Smarty version 2.6.26, created on 2014-09-19 10:38:44
         compiled from Backend/CuentaCorriente/Record.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'Backend/CuentaCorriente/Record.tpl', 9, false),)), $this); ?>
                    <!-- item -->
                    <tr<?php echo $this->_tpl_vars['className']; ?>
>
                        
                        <td width="10%"><p href="/<?php echo $this->_tpl_vars['varController']; ?>
/Edit/id/<?php echo $this->_tpl_vars['record']['Id']; ?>
"><?php echo $this->_tpl_vars['record']['Fecha']; ?>
</p></td>
                        <?php if (! $this->_tpl_vars['BancoId']): ?>
                        <td width="10%"><a class="popup" href="<?php echo $this->_tpl_vars['record']['Link']; ?>
"><?php echo $this->_tpl_vars['record']['Id']; ?>
</a></td>
                        <?php endif; ?>
                        <td width="40%"><p>
                        					<?php if (count($this->_tpl_vars['record']['Items'])): ?>
                        					<?php $_from = $this->_tpl_vars['record']['Items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['link']):
?>
                        					<!-- 
					                        <a class="popup" href="<?php echo $this->_tpl_vars['link']; ?>
"><img src="/images/icons/add.png" title="Ver"/></a>
					                        <?php endforeach; endif; unset($_from); ?>
					                         -->
					                         <?php echo $this->_tpl_vars['link']; ?>

					                         <?php else: ?>
					                         <?php echo $this->_tpl_vars['record']['Detalle']; ?>

					                        <?php endif; ?>
                        				</p></td>
                        
                        <td width="10%"><p href="/<?php echo $this->_tpl_vars['varController']; ?>
/Edit/id/<?php echo $this->_tpl_vars['record']['Id']; ?>
"><?php if ($this->_tpl_vars['record']['Debe'] > 0): ?>$ <?php echo $this->_tpl_vars['record']['Debe']; ?>
<?php endif; ?></p></td>
                        <td width="10%"><p href="/<?php echo $this->_tpl_vars['varController']; ?>
/Edit/id/<?php echo $this->_tpl_vars['record']['Id']; ?>
"><?php if ($this->_tpl_vars['record']['Haber'] > 0): ?>$ <?php echo $this->_tpl_vars['record']['Haber']; ?>
<?php endif; ?></p></td>
                        <td width="10%"><p href="/<?php echo $this->_tpl_vars['varController']; ?>
/Edit/id/<?php echo $this->_tpl_vars['record']['Id']; ?>
">$ <?php echo $this->_tpl_vars['record']['Saldo']; ?>
</p></td>
                        
                        <?php if ($this->_tpl_vars['BancoId'] && $this->_tpl_vars['IsPerfilAdministrador']): ?>
                        <td width="10%"><a class="anular" href="/<?php echo $this->_tpl_vars['varController']; ?>
/ListBanco/BancoId/<?php echo $this->_tpl_vars['record']['BancoId']; ?>
/accion/anular/id/<?php echo $this->_tpl_vars['record']['Id']; ?>
"><img src="/images/icons/error_delete.png" alt="item" title="Anular"/></a></td>
                        <?php endif; ?>
                        
                        
                    </tr>
                    <!-- /item -->