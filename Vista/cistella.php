<?php
session_start();
require_once '../Logica/Connexio.php';
require_once '../Logica/Atraccions.php';
    $Connexio = new Connexio('pau','pau','');
    $Connexio->connectar();
    $Connexio->selectdb("socialtravel");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <table id="taulaCistella">
            <tr>
                <td>Numero</td>
                <td>Nombre</td>
                <td>Cantidad</td>
            </tr>
        </table>
    </body>
</html>
