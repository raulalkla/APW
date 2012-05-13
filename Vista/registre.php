<?php

require_once("../Logica/Connexio.php");
require_once '../Logica/Usuaris.php';

    if($_POST){
        $Connexio = new Connexio('pau','pau','');
        $Connexio->connectar();
        $Connexio->selectdb("socialtravel");

        $usuari = new Usuaris();
        $usuari->setUsuari($_POST[nom], $_POST[cognom], $_POST[dni], $_POST[usuari], $_POST[pass]);
        echo "Regitrado!!";
    }
    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";
?>
<html>
    <head>
        <script type="text/javascript">
	$(document).ready(function() {    
            $("#form").bind("submit", function() { 
                $.fancybox.showActivity(); 
                $.ajax({ 
                        type    : "POST", 
                        cache   : false, 
                        url     : "registre.php", 
                        data    : $(this).serializeArray(), 
                        success: function(data) { 
                                $.fancybox(data); 
                        } 
                }); 
                return false; 
            });  
	});
        </script>
    </head>
    <body>
        <form method="POST" id="form" style="text-align: right">
            Nombre: <input type="text" name="nom"><br>
            Apellidos: <input type="text" name="cognom"><br>
            DNI: <input type="text" name="dni" value="00000000L"><br>
            Usuario: <input type="text" name="usuari"><br>
            Contraseña: <input type="password" name="pass"><br>
            <input type="submit">
        </form>
    </body>
</html>
