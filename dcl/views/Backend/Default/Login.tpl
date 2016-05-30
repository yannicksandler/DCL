{include file="Backend/Layouts/Include/Header.tpl"}
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
            {if $errorMsg}<div class="error">{$errorMsg}</div>{/if}
        </div> <!-- /loginBox-->
    </div> <!-- /Container -->
</body>
</html>