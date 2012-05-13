<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        echo "<p style='text-align:left; font-size:14px'><B>Datos personales:</B></p>";
        echo "<form method='POST'>";
        echo "<table border=0 style='font-size:12px'>";
        echo    "<tr>";
        echo        "<td>Nombre:</td>";
        echo        '<td><input type="text" name="nom"></td>';
        echo    "</tr>";
        echo        "<td>Apellido:</td>";
        echo        '<td><input type="text" name="cognom"></td>';
        echo    "</tr>";
        echo        "<td>DNI:</td>";
        echo        '<td><input type="text" name="dni" value="00000000L"></td>';
        echo    "</tr>";
        echo        "<td>Usuario:</td>";
        echo        '<td><input type="text" name="usuari"></td>';
        echo    "</tr>";
        echo        "<td>Password:</td>";
        echo        '<td><input type="password" name="pass"></td>';
        echo    "</tr>";   
        echo    "<tr>";
        echo        "<td></td>";
        echo        '<td><input type="submit" name="modificarDatos" value="Enviar"></td>';
        echo    "</tr>";
        echo "</table>";
        echo "</form>";
        ?>
    </body>
</html>
