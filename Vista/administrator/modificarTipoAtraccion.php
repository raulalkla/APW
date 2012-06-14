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
            $tAtrac = new TipusAtraccions();
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
            <input type="hidden" name="idTAtrac" value="<? echo $tAtrac->getIdTipusAtraccions($_GET[id]); ?>">
            <td> <input type="text" name="nomTAtrac" value="<? echo $tAtrac->getNom($_GET[id]); ?>"> </td>
            <td> <textarea name="ubicacioTAtrac" rows="5" cols="25"> <? echo $tAtrac->getDescricio($_GET[id]); ?> </textarea></td>
                <td> 
                    <select name="estatTAtrac"> 
                        <?php for($j = 0; $j < $estat->getNumEstats(); $j++){
                                    if($estat->getTipusEstat($j) == $estat->getTipusEstatByID($tAtrac->getEstat($_GET[id])) )
                                        echo "<option selected>".$estat->getTipusEstat($j)."</option>";
                                    else
                                        echo "<option>".$estat->getTipusEstat($j)."</option>";
                            } ?>
                    </select>
                </td>
                <td> <input type="submit" name="modifTAtrac" value="Modificar"> </td>
            </tr>
        </table>
        </form>
    </body>
</html>
