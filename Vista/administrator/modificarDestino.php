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
            $desti = new Desti();
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
                <input type="hidden" name="idDest" value="<? echo $desti->getIdDesti($_GET[id]); ?>">
                <td> <input type="text" name="nomDest" value="<? echo $desti->getNomDesti($_GET[id]); ?>"> </td>
                <td> <input type="text" name="ubicacio" value="<? echo $desti->getUbicacio($_GET[id]); ?>"> </td>
                <td> 
                    <select name="estat"> 
                        <?php for($j = 0; $j < $estat->getNumEstats(); $j++){
                                    if($estat->getTipusEstat($j) == $estat->getTipusEstatByID($desti->getEstat($_GET[id])) )
                                        echo "<option selected>".$estat->getTipusEstat($j)."</option>";
                                    else
                                        echo "<option>".$estat->getTipusEstat($j)."</option>";
                            } ?>
                    </select>
                </td>
                <td> <input type="submit" name="modifDesti" value="Modificar"> </td>
            </tr>
        </table>
        </form>
    </body>
</html>
