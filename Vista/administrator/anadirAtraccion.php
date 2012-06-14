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
    </head>
    <body>
        <?php
            $estat = new Estat();
        ?>
        <form method="POST">
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
                    <td><b> Imagen </b></td>
                </tr>
                <tr>
                    <td> <input type="text" name="nomAtrac" > </td>
                    <td> <input type="text" name="descr"> </td>
                    <td> <input type="text" name="duracion" size="4"> </td>
                    <td> <input type="text" name="precio" size="4"> </td>
                    <td> <input type="text" name="estado"> </td>
                    <td> <input type="text" name="destino"> </td>
                    <td> <input type="text" name="promocion"> </td>
                    <td> 
                        <select name="tipo"> 
                            <?php for($j = 0; $j < mysql_num_rows($resEstat); $j++){
                                        echo "<option>".mysql_result($resEstat, $j, 1)."</option>";
                                  } ?>
                        </select>
                    </td>
                    <td> <input type="image" name="promocion"> </td>
                    <td> <input type="submit" name="anadirAtraccion" value="Anadir"> </td>
                </tr>
            </table>
        </form>
    </body>
</html>
