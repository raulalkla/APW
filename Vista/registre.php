<?php
require_once("../Logica/Connexio.php");
require_once '../Logica/Usuaris.php';
?>
<html>
    <head>
        <script type="text/javascript">
	$(document).ready(function() {
            $(".iframes").fancybox({
		maxWidth	: 800,
		maxHeight	: 600,
		fitToView	: false,
		width		: '70%',
		height		: '70%',
		autoSize	: false,
		closeClick	: false,
		openEffect	: 'none',
		closeEffect	: 'none'
            });
	});
        </script>
    </head>
    <body>
        <form method="POST" action="../Logica/RegitrarUsuari.php" style="text-align: right">
            Nombre: <input type="text" name="nombre"><br>
            Apellidos: <input type="text" name="apellidos"><br>
            DNI: <input type="text" name="dni" value="00000000L"><br>
            Usuario: <input type="text" name="usuario"><br>
            Contraseña: <input type="password" name="pass"><br>
            <input type="submit">
        </form>
    </body>
</html>


<?php
    if($_POST){
        $Connexio = new Connexio('pau','pau','');
        $Connexio->connectar();
        $Connexio->selectdb("socialtravel");

        $sql = "INSERT INTO usuaris (nom, cognom, dni, usuari, password)".
                "VALUES('".$_POST[nombre]."', '".$_POST[apellidos]."', '".$_POST[dni]."', '".$_POST[usuario]."', md5('".$_POST[pass]."') )";
        $Connexio->query($sql);
        echo "Regitrado!!";
    }
    echo "<pre>";
    print_r($_POST);
?>
