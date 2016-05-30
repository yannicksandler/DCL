<?php /* Smarty version 2.6.26, created on 2014-07-30 15:16:02
         compiled from Backend/NotaDebito/View.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>	
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<title>DCL Group</title>

    <link type='text/css' href='/styles/contact.css' rel='stylesheet' media='screen' />

	<!-- 
	<script type="text/javascript" src="/scripts/jquery/jquery-1.4.2.js"></script>
 	-->

    
    <link rel="shortcut icon" href="/images/favicon.ico"/>
	
	 
	
<?php echo '
    <style type="text/css">
<!--
.Estilo1 {font-family: Arial, Helvetica, sans-serif; font-size:14px;}
-->
    </style>
'; ?>

</head>

<body>

    

<div id="Layer1" style="position:absolute; left:599px; top:38px; width:162px; height:37px; z-index:1; font-size: 14px; font-family: Arial, Helvetica, sans-serif;"><?php echo $this->_tpl_vars['NotaDebito']['Fecha']; ?>
</div>
<div id="Layer2" style="position:absolute; left:81px; top:167px; width:385px; height:31px; z-index:2; font-size: 14px; font-family: Arial, Helvetica, sans-serif;"><?php if ($this->_tpl_vars['NotaDebito']['Cliente']['RazonSocial']): ?><?php echo $this->_tpl_vars['NotaDebito']['Cliente']['RazonSocial']; ?>
<?php else: ?><?php echo $this->_tpl_vars['NotaDebito']['Cliente']['Nombre']; ?>
<?php endif; ?></div>
<div class="Estilo1" id="Layer3" style="position:absolute; left:79px; top:192px; width:687px; height:30px; z-index:3; font-family: Arial, Helvetica, sans-serif;"><?php echo $this->_tpl_vars['NotaDebito']['Cliente']['Direccion']; ?>
 <?php if ($this->_tpl_vars['NotaDebito']['Cliente']['Localidad']): ?> - <?php echo $this->_tpl_vars['NotaDebito']['Cliente']['Localidad']; ?>
<?php endif; ?> <?php if ($this->_tpl_vars['NotaDebito']['Cliente']['CodigoPostal']): ?> (C.P. <?php echo $this->_tpl_vars['NotaDebito']['Cliente']['CodigoPostal']; ?>
)<?php endif; ?></div>
<div class="Estilo1" id="Layer4" style="position:absolute; left:210px; top:211px; width:397px; height:28px; z-index:4; font-family: Arial, Helvetica, sans-serif;"><?php echo $this->_tpl_vars['NotaDebito']['TipoIva']['Nombre']; ?>
</div>
<div class="Estilo1" id="Layer5" style="position:absolute; left:447px; top:183px; width:233px; height:31px; z-index:5; font-family: Arial, Helvetica, sans-serif;"><?php echo $this->_tpl_vars['NotaDebito']['Cliente']['Cuit']; ?>
</div>
<div class="Estilo1" id="Layer6" style="position:absolute; left:42px; top:292px; width:442px; height:297px; z-index:6; font-family: Arial, Helvetica, sans-serif;">

	
	<?php if ($this->_tpl_vars['NotaDebito']['Comentario']): ?>
		<p><?php echo $this->_tpl_vars['NotaDebito']['Comentario']; ?>
</p>
	<?php endif; ?></div>

<div class="Estilo1" id="Layer7" style="position:absolute; left:600px; top:291px; width:159px; height:297px; z-index:7; font-family: Arial, Helvetica, sans-serif;">
  	
	<?php if ($this->_tpl_vars['NotaDebito']['Comentario']): ?>
		<p><?php if ($this->_tpl_vars['NotaDebito']['Comentario'] > 0): ?><?php echo $this->_tpl_vars['NotaDebito']['Comentario']; ?>
<?php endif; ?></p>
<?php endif; ?>
</div>

<div class="Estilo1" id="Layer8" style="position:absolute; left:13px; top:903px; width:178px; height:36px; z-index:8; font-family: Arial, Helvetica, sans-serif;"><?php if ($this->_tpl_vars['NotaDebito']['Subtotal']): ?>$ <?php echo $this->_tpl_vars['NotaDebito']['Subtotal']; ?>
<?php endif; ?></div>
<div class="Estilo1" id="Layer9" style="position:absolute; left:463px; top:901px; width:107px; height:26px; z-index:9; font-family: Arial, Helvetica, sans-serif;"><?php if ($this->_tpl_vars['NotaDebito']['TipoIva']['Letra_comp'] == 'A'): ?><?php echo $this->_tpl_vars['NotaDebito']['TipoIva']['Discriminado']; ?>
 %<?php endif; ?></div>
<div class="Estilo1" id="Layer10" style="position:absolute; left:411px; top:901px; width:166px; height:29px; z-index:10; font-family: Arial, Helvetica, sans-serif;"><?php if ($this->_tpl_vars['NotaDebito']['TotalIva']): ?>$ <?php echo $this->_tpl_vars['NotaDebito']['TotalIva']; ?>
<?php endif; ?></div>
<div class="Estilo1" id="Layer11" style="position:absolute; left:595px; top:901px; width:168px; height:38px; z-index:11; font-family: Arial, Helvetica, sans-serif;">$ <?php echo $this->_tpl_vars['NotaDebito']['TotalIva']; ?>
</div>
<table width="759" height="950"  border="0">
  <tr>
    <td width="753" height="946" class="Estilo1"></td>
  </tr>
</table>


<div class="Estilo1" id="Layer8" style="position:absolute; left:248px; top:901px; width:178px; height:36px; z-index:8; font-family: Arial, Helvetica, sans-serif;"><?php if ($this->_tpl_vars['NotaDebito']['Subtotal']): ?>$ <?php echo $this->_tpl_vars['NotaDebito']['Subtotal']; ?>
<?php endif; ?></div>


</body>
</html>