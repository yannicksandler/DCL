<?php /* Smarty version 2.6.26, created on 2014-09-20 10:12:00
         compiled from Backend/Default/Login.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Backend/Layouts/Include/Header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<body class="bodyLogin">
    <div id="Container">
        <div class="loginBox">
            <form id="FrmLogin" action="" method="post">
                <div class="contLeft">
                    <img src="/images/logo.png" alt="Logo" />
                    <h1>Sistema de gestion de DCL Group</h1>
                    <a class="ids" href="mailto:matias.tokar@gmail.com" target="" title="Matias Tokar | Desarrollo Web">
                    <img src="/images/body/mt_logo.png" alt="Matias Tokar | Desarrollo Web" /></a>
                </div>
                
                <div class="contRight">
                    <h2>Iniciar sesi&oacute;n</h2>
                    <div>
                        <label>Usuario</label>
                        <input type="text" name="user" class="required email" value="" />
                    </div>
                    <div>
                        <label>Contrase&ntilde;a</label>
                        <input type="password" name="pass" class="required" value="" />
                        <input type="submit" value="Ingresar" class="btLogin" />
                    </div>
                </div>
            </form>
            <?php if ($this->_tpl_vars['errorMsg']): ?><div class="error"><?php echo $this->_tpl_vars['errorMsg']; ?>
</div><?php endif; ?>
        </div> <!-- /loginBox-->
    </div> <!-- /Container -->
</body>
</html>