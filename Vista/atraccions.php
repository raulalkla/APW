<?php
require_once '../Logica/Connexio.php';
require_once '../Logica/Atraccions.php';
    $Connexio = new Connexio('root','root','');
    $Connexio->connectar();
    $Connexio->selectdb("socialtravel");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        if(@$_GET[id])
        {
            $Atraccions = new Atraccions();
            $result = $Atraccions->getAtraccionByID(@$_GET[id]);  
            echo "<div id='detalleTitulo'><h2>".utf8_encode(mysql_result($result,0,1))."</h2></div>";
            echo "<div id='detalleFoto'><img width=200px height=200px src='".utf8_encode(mysql_result($result,0,9))."' /></div>";
            echo "<div id='detalleDescAtrac'>".utf8_encode(mysql_result($result,0,2))."</div>";
            
        }
        ?>
    </body>
</html>
