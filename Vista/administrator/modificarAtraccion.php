<!DOCTYPE html>
<?php
    session_start();
    require_once '../../Logica/Connexio.php';
    require_once '../../Logica/TipusAtraccions.php';
    require_once '../../Logica/Estat.php';
    require_once '../../Logica/Desti.php';
    require_once '../../Logica/Promocio.php';
    require_once '../../Logica/Atraccions.php';
    
    $con = new Connexio();
    
    if(!$_SESSION[usuari]){
        header("Location: index.php");
    }  
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <?php
            $atrac = new Atraccions();
            $estat = new Estat();
            $desti = new Desti();
            $prom = new Promocio();
            $tAtrac = new TipusAtraccions();
        ?>
        <form method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <td><b> Nombre </b></td>
                    <td><b> Descripcion </b></td>
                    <td><b> Duracion </b></td>
                    <td><b> Precio </b></td>
                    <td><b> Estado </b></td>
                    <td><b> Destino </b></td>
                    <td><b> Promocion </b></td>
                    <td><b> Tipo </b></td>
                </tr>
                <tr>
                <input type="hidden" name="idAtraccio" value="<? echo $atrac->getIdAtraccio($_GET[id]); ?>">
                <td> <input type="text" name="nomAtrac" value="<? echo $atrac->getNom($_GET[id]); ?>"> </td>
                <td> <input type="text" name="descr" value="<? echo $atrac->getDescripcio($_GET[id]); ?>"> </td>
                <td> <input type="text" name="duracion" size="4" value="<? echo $atrac->getDurada($_GET[id]); ?>">dias </td>
                <td> <input type="text" name="precio" size="4" value="<? echo $atrac->getPreu($_GET[id]); ?>">€ </td>
                    <td> <select name="estado">
                            <?php for($j = 0; $j < $estat->getNumEstats(); $j++){
                                        if($estat->getTipusEstat($j) == $estat->getTipusEstatByID($atrac->getIdEstat($_GET[id])) )
                                            echo "<option selected>".$estat->getTipusEstat($j)."</option>";
                                        else
                                            echo "<option>".$estat->getTipusEstat($j)."</option>";
                                  } ?>
                        </select> 
                    </td>
                    <td> <select name="destino">
                            <?php for($j = 0; $j < $desti->getNumDestins(); $j++){
                                        if($desti->getNomDesti($j) == $desti->getNomByID($atrac->getIdDesti($_GET[id])) )
                                            echo "<option selected>".$desti->getNomDesti($j)."</option>";
                                        else
                                            echo "<option>".$desti->getNomDesti($j)."</option>";
                                  } ?>
                        </select> 
                    </td>
                    <td> <select name="promocion">
                            <option> null </option>
                            <?php for($j = 0; $j < $prom->getNumPromocions(); $j++){
                                        if($prom->getDescripcio($j) == $prom->getDescripcioByID($atrac->getIdPromocio($_GET[id])) )
                                            echo "<option selected>".$prom->getDescripcio($j)."</option>";
                                        else
                                            echo "<option>".$prom->getDescripcio($j)."</option>";
                                  } ?>
                        </select>
                    </td>
                    <td> 
                        <select name="tipo"> 
                            <?php for($j = 0; $j < $tAtrac->getNumTipusAtraccions(); $j++){
                                        if($tAtrac->getNom($j) == $tAtrac->getNomByID($atrac->getIdTipusAtraccio($_GET[id])) )
                                            echo "<option selected>".$tAtrac->getNom($j)."</option>";
                                        else
                                            echo "<option>".$tAtrac->getNom($j)."</option>";
                                  } ?>
                        </select>
                    </td>
                </tr>
            </table>
            <b>Imagen:</b> <input type="file" name="imagen"><br>
            <input type="submit" name="modificarAtraccion" value="Añadir">
        </form>
    </body>
</html>
