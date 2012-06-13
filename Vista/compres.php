<?php
session_start();
require_once '../Logica/Connexio.php';
require_once '../Logica/Usuaris.php';
require_once '../Logica/HistoricCompres.php';
require_once '../Logica/LiniaPedido.php';
require_once '../Logica/Atraccions.php';

$Connexio = new Connexio();
$Connexio->connectar();
$Connexio->selectdb("socialtravel");

$histCompres = new HistoricCompres();
$liniaPedido = new LiniaPedido();
$atraccions  = new Atraccions();
// $idHistCompres = mysql_result($result, 1,2);
// echo $idHistCompres;
  
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php 
            $result = $histCompres->getHistoricCompres($_SESSION[idUsuario]);
            if(mysql_num_rows($result)>0){
               
        ?>
        <table border=0 class='hovertable'>
                <tr>
                    <td><b>Atracción</b></td>
                    <td><b>Fecha</b></td>
                    <td><b>Precio</b></td>
                    <td><b>Cantidad</b></td>
                </tr>
                <?php
                for($i = 0; $i < mysql_num_rows($result); $i++){
                    $resultLiniaPedido = $liniaPedido->getLiniesPedido(mysql_result($result,$i,2));
                    echo "<tr onmouseover=\"this.style.backgroundColor='#ffff66';\" onmouseout=\"this.style.backgroundColor='#d4e3e5';\">";
                        $nomAtraccio = $atraccions->getNomAtraccionByID(mysql_result($resultLiniaPedido, 0,4));
                        echo "<td style='text-align:center'>".  utf8_encode($nomAtraccio)."</td>";
                        echo "<td style='text-align:center'>".mysql_result($resultLiniaPedido, 0,2)."</td>";
                        echo "<td style='text-align:center'>".mysql_result($resultLiniaPedido, 0,1)."</td>";  
                        echo "<td style='text-align:center'>".mysql_result($resultLiniaPedido, 0,3)."</td>";
                    echo "</tr>";
                }
                
                ?>
               </table>
        <?php
        
        
        
            }else{
                
                echo "<p>No hay compras realizadas</p>";
                
            }
        ?>
        
    </body>
    
</html>
