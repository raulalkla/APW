<!DOCTYPE html>
<?php
    session_start();
    require_once '../../Logica/Connexio.php';
    require_once '../../Logica/Desti.php';
    require_once '../../Logica/Estat.php';
    
    $con = new Connexio();
    
    if(!$_SESSION[usuari]){
        header("Location: index.php");
    }  
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            $estat = new Estat();
        ?>
        <form method="POST">
        <table>
            <tr>
                <td><b>Nombre</b></td>
                <td><b>Ubicación</b></td>
                <td><b>Estado</b></td>
                <td></td>
            </tr>
            <tr>
                <td> <input type="text" name="nomDest"> </td>
                <td> <input type="text" name="ubicacio"> </td>
                <td> 
                    <select name="estat"> 
                        <?php for($j = 0; $j < $estat->getNumEstats(); $j++){
                                    echo "<option>".$estat->getTipusEstat($j)."</option>";
                            } ?>
                    </select>
                </td>
                <td> <input type="submit" value="Anadir"> </td>
            </tr>
        </table>
        </form>
    </body>
</html>
