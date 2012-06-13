<?php
session_start();
require_once '../Logica/Connexio.php';
require_once '../Logica/Usuaris.php';
require_once '../Logica/HistoricCompres.php';
require_once '../Logica/LiniaPedido.php';

$Connexio = new Connexio();
$Connexio->connectar();
$Connexio->selectdb("socialtravel");

$histCompres = new HistoricCompres();
$liniaPedido = new LiniaPedido();

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
               echo mysql_result($result,0,1);
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
                    // $resultLiniaPedido = $liniaPedido->getLiniesPedido());
                    echo mysql_result($resultLiniaPedido, 0,0);
                    echo "<tr onmouseover=\"this.style.backgroundColor='#ffff66';\" onmouseout=\"this.style.backgroundColor='#d4e3e5';\">";
                        echo "<td style='text-align:center'>".mysql_result($resultLiniaPedido, 0,0)."</td>";
                        echo "<td style='text-align:center'></td>";
                        echo "<td style='text-align:center'></td>";  
                        echo "<td style='text-align:center'></td>";
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
