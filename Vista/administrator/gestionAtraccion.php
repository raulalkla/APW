<!DOCTYPE html>
<?php
    session_start();
    require_once '../../Logica/Connexio.php';
    
    $con = new Connexio();
    
    if(!$_SESSION[usuari]){
        header("Location: index.php");
    }
    
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <script type="text/javascript">
            $(document).ready(function() {
                $("#form").bind("submit", function() {
                    $.ajax({ 
                            type    : "POST", 
                            cache   : false, 
                            url     : "altaAtraccion.php", 
                            data    : $(this).serializeArray()
                    }); 
                    return false; 
                });
            }
        </script>
        
        <style type="text/css">
            table.hovertable {
                    font-family: verdana,arial,sans-serif;
                    font-size:11px;
                    color:#333333;
                    border-width: 1px;
                    border-color: #999999;
                    border-collapse: collapse;
                    margin-left: 3%;
                    padding: 5%;
            }
            table.hovertable th {
                    background-color:#c3dde0;
                    border-width: 1px;
                    padding: 8px;
                    border-style: solid;
                    border-color: #a9c6c9;
            }
            table.hovertable tr {
                    background-color:#d4e3e5;
            }
            table.hovertable td {
                    border-width: 1px;
                    padding: 8px;
                    border-style: solid;
                    border-color: #a9c6c9;
                    text-align: center;
            }
        </style>
    </head>
    <body>
        <div id="contenedor">
        <?php 
            $sql = "SELECT a.nom, a.descripcio, a.durada, a.preu, a.estat, a.puntuacio, a.desti, a.promocio,a.tipus_atraccio
                    FROM atraccio a";
            //echo $sql;
            $result = $con->query($sql);
            
            $sql = "Select * FROM estat";
            $resEstat = $con->query($sql);
        ?>
            <form id="form" method="POST">
            <table class="hovertable">
                <tr>
                    <td><b> Nombre </b></td>
                    <td><b> Descripcion </b></td>
                    <td><b> Duracion </b></td>
                    <td><b> Precio </b></td>
                    <td><b> Estado </b></td>
                    <td><b> Puntuación </b></td>
                    <td><b> Destino </b></td>
                    <td><b> Promocion </b></td>
                    <td><b> Tipo </b></td>
                </tr>
                <?php
                for($i = 0; $i < mysql_num_rows($result); $i++){
                    echo "<tr onmouseover=\"this.style.backgroundColor='#ffff66';\" onmouseout=\"this.style.backgroundColor='#d4e3e5';\">";
                        echo "<td>"; echo mysql_result($result, $i, 0); echo "</td>";
                        echo "<td>"; echo mysql_result($result, $i, 1);echo "</td>";
                        echo "<td>"; echo mysql_result($result, $i, 2);echo "</td>";
                        echo "<td>"; echo mysql_result($result, $i, 3);echo "</td>";
                        echo "<td>"; echo mysql_result($result, $i, 4);echo "</td>";
                        echo "<td>"; echo mysql_result($result, $i, 5);echo "</td>";
                        echo "<td>"; echo mysql_result($result, $i, 6);echo "</td>";
                        echo "<td>"; echo mysql_result($result, $i, 7);echo "</td>";
                        echo "<td>"; echo mysql_result($result, $i, 8);echo "</td>";
                    echo "</tr>";
                }
                ?>
                <tr>
                    <td> <input type="text" name="nomAtrac"> </td>
                    <td> <input type="text" name="descr"> </td>
                    <td> <input type="text" name="duracion" size="4"> </td>
                    <td> <input type="text" name="precio" size="4"> </td>
                    <td> <input type="text" name="estado"> </td>
                    <td> </td>
                    <td> <input type="text" name="destino"> </td>
                    <td> <input type="text" name="promocion"> </td>
                    <td> 
                        <select name="tipo"> 
                            <?php for($j = 0; $j < mysql_num_rows($resEstat); $j++){
                                        echo "<option>".mysql_result($resEstat, $j, 1)."</option>";
                                  } ?>
                        </select>
                    </td>
                    <td> <input type="submit" value="Anadir"> </td>
                </tr>
            </table>
        </form>
        </div>
    </body>
</html>

