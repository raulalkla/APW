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
        <script type="text/javascript">
            $(document).ready(function() {
//                $("#borraTuplaCompra").click(function(evento){
//                    $("#divSistella").load("cistella.php"); 
//                });
                $("#comprar").click(function(evento){
                    $("#contenedor_atraccion").load("procesoCompra.php"); 
                });
              });
            function borraTubla($id){
                unset($_SESSION["carro"][$id])
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
            }
        </style>
    </head>
    <body>
        <div id ="divSistella" >
            <table id="taulaCistella" class="hovertable">
                <tr>
                    <td><b>Numero</b></td>
                    <td><b>Nombre</b></td>
                    <td><b>Cantidad</b></td>
                    <td><b>Importe</b></td>
                    <td><b>Borrar</b></td>
                </tr>
                <?php
                if($_SESSION["carro"]){
                    $numCompres = sizeof($_SESSION["carro"]);
                    $atr = new Atraccions();
                    for ($i = 0; $i < $numCompres; $i++){
                        $resultAtr = $atr->getAtraccionByID($_SESSION["carro"][$i]["idAtraccio"]);
                        echo "<tr onmouseover=\"this.style.backgroundColor='#ffff66';\" onmouseout=\"this.style.backgroundColor='#d4e3e5';\">";
                            echo "<td>". ($i+1) ."</td>";
                            echo "<td>".utf8_encode(mysql_result($resultAtr,0,1))."</td>";
                            echo "<td> <input type='text' size = 2 value = '".$_SESSION["carro"][$i]["quantitat"]."'> </td>";
                            echo "<td>".$_SESSION["carro"][$i]["preu"]."</td>";
                            echo "<td><a href='#' id = 'borraTuplaCompra' OnClick='borraTubla($i)'> <img src='img/drop.png' width=20px; height=20px; /> </a></td>";
                        echo "</tr>";
                    }
                }
                ?>
            </table>
            <input id="comprar" type="submit" value="Comprar!" style="position: right">
        </div>
    </body>
</html>
<?php
    echo "<pre>Sesio: ";
    print_r($_SESSION);
?>