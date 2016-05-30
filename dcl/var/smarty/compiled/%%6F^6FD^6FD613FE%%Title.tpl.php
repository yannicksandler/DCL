<?php /* Smarty version 2.6.26, created on 2014-05-28 11:17:54
         compiled from Backend/TipoGasto/Title.tpl */ ?>
            <div class="listTop">
                <div>
                    <table border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="2%"><input type="checkbox" class="check" id="check_all" /></td>
                            
                            
                            <td width="15%"><p href="/<?php echo $this->_tpl_vars['varController']; ?>
/<?php echo $this->_tpl_vars['varAction']; ?>
/pagesize/<?php echo $this->_tpl_vars['list']['pageSize']; ?>
/page/<?php echo $this->_tpl_vars['list']['page']; ?>
/order/Nombre_<?php if ($this->_tpl_vars['order'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?><?php if ($this->_tpl_vars['search']): ?>/search/<?php echo $this->_tpl_vars['search']; ?>
<?php endif; ?>" class="<?php if ($this->_tpl_vars['orderBy'] == 'Nombre'): ?><?php if ($this->_tpl_vars['order'] == 'ASC'): ?>orderUp<?php else: ?>orderDown<?php endif; ?><?php else: ?>orderNone<?php endif; ?>" title="Nombre">Nombre</p></td>
                            
                            
                            
                            <td width="6%"><p>Acciones</p></td>
                        </tr>
                    </table>
                </div>
            </div> <!-- /listadoTop -->