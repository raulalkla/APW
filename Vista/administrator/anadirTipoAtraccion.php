<!DOCTYPE html>
<?php
    session_start();
    require_once '../../Logica/Connexio.php';
    require_once '../../Logica/TipusAtraccions.php';
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
                <td><b>Descripción</b></td>
                <td><b>Estado</b></td>
                <td></td>
            </tr>
            <tr>
                <td> <input type="text" name="nomTAtrac"> </td>
                <td> <textarea name="descripcioTAtrac"></textarea> </td>
                <td> 
                    <select name="estatTAtrac"> 
                        <?php for($j = 0; $j < $estat->getNumEstats(); $j++){
                                    echo "<option>".$estat->getTipusEstat($j)."</option>";
                            } ?>
                    </select>
                </td>
                <td> <input type="submit" name="anadirTAtrac" value="Anadir"> </td>
            </tr>
        </table>
        </form>
    </body>
</html>
