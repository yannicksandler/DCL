193
a:4:{s:8:"template";a:2:{s:25:"Backend/Default/Login.tpl";b:1;s:34:"Backend/Layouts/Include/Header.tpl";b:1;}s:9:"timestamp";i:1411218720;s:7:"expires";i:1411218720;s:13:"cache_serials";a:0:{}}<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>	
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<title>DCL Group | Administrador de contenidos</title>

	<link rel="shortcut icon" href="/images/favicon.ico"/>
	
	<!-- master page and structure styles -->
    <link href="/styles/structure.css" rel="stylesheet" type="text/css" />
    <link href="/styles/styles.css" rel="stylesheet" type="text/css" />

    <!-- jQuery 1.4 -->
	<script type="text/javascript" src="/scripts/jquery/jquery-1.4.2.js"></script>
	<script type="text/javascript" src="/scripts/jquery/jquery.validate.js"></script>
	<script type="text/javascript" src="/scripts/jquery/messages_es.js"></script>
	<script type="text/javascript" src="/scripts/lightbox.js"></script>
	<!-- div que flota @see Edit view botonera -->
	<script type="text/javascript" src="/scripts/jquery/jquery.floatobject-1.4.js"></script>

	<!-- jQuery UI 1.8 -->
	<!-- autocomplete -->
	<script type="text/javascript" src="/scripts/jquery/jquery-ui-1_8_4_custom_min.js"></script>
	<link type="text/css" href="/styles/jquery-ui-1.8.2.custom.css" rel="Stylesheet" />
	
	<!-- funciones javascript -->
	<script type="text/javascript" src="/scripts/setParentValue.js"></script> <!-- se usa en los seleccionar -->   
	
</head><body class="bodyLogin">
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
                    </div> <!-- /loginBox-->
    </div> <!-- /Container -->
</body>
</html>