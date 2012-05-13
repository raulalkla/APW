<html>
    <body>
        <form method="POST">
            Nombre: <input type="text" name="nombre"><br>
            Apellidos: <input type="text" name="apellidos"><br>
            DNI: <input type="text" name="dni" value="00000000L"><br>
            Usuario: <input type="text" name="usuario"><br>
            Contraseña: <input type="pasword" name="pass"><br>
            <input type="submit"><br>
        </form>
    </body>
</html>


<?php
require_once("../Logica/Connexio.php");
require_once '../Logica/Usuaris.php';


    if($_POST){
        $Connexio = new Connexio('pau','pau','');
        $Connexio->connectar();
        $Connexio->selectdb("socialtravel");

        $usuari = new Usuaris();
        $sql = "INSERT INTO usiaris (nom, cognom, dni, usuari, password)".
                "VALUES('".$_POST[nombre]."', '".$_POST[apellidos]."', '".$_POST[dni]."', '".$_POST[usuario]."', md5('".$_POST[pass]."') )";
        $Connexio->query($sql);
        echo "Regitrado!!";
    }
?>
