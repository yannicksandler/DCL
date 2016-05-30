<?php /* Smarty version 2.6.26, created on 2014-09-18 15:46:03
         compiled from Backend/Layouts/Include/Search.tpl */ ?>
<?php if ($this->_tpl_vars['varController'] == 'Proveedor'): ?>
<?php echo '


<link type="text/css" href="/styles/ui-lightness/jquery-ui-1.8.2.custom.css" rel="stylesheet" />
<script type="text/javascript" src="/scripts/jquery/jquery-ui-1.8.4.custom.min.js"></script>

<script type="text/javascript">

$(document).ready(function(){    
    var availableTags = [
							'; ?>
<?php echo $this->_tpl_vars['ArrayProveedores']; ?>
<?php echo '
                       ];
    

    $("input#search").autocomplete({
        source: availableTags,
      //define select handler
		select: function(e, ui) {
			var valor = ui.item.value;
			//SetProveedor(valor);
		} 
    });  

});

</script>
'; ?>

<?php endif; ?>

<div class="grayBox">
    <form id="frmSearch" action="" redirect="/<?php echo $this->_tpl_vars['varController']; ?>
/<?php echo $this->_tpl_vars['varAction']; ?>
<?php if ($this->_tpl_vars['rpp']): ?>/pagesize/<?php echo $this->_tpl_vars['rpp']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['page']): ?>/page/<?php echo $this->_tpl_vars['page']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['orderBy']): ?>/order/<?php echo $this->_tpl_vars['orderBy']; ?>
_<?php if ($this->_tpl_vars['order'] == 'DESC'): ?>DESC<?php else: ?>ASC<?php endif; ?><?php endif; ?>/search/">
    <div>
        <span>Buscar</span>
        
        <input type="text" class="search" id="search" value="<?php echo $this->_tpl_vars['search']; ?>
" />
        
    </div>
    </form>
</div>