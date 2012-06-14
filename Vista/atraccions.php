<?php
session_start();
require_once '../Logica/Connexio.php';
require_once '../Logica/Atraccions.php';
    $Connexio = new Connexio();
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
            echo "<div id='detalleTitulo'><h2>".mysql_result($result,0,1)."</h2></div>";
            echo "<div id='detalleFoto'><img width=200px height=200px src='".mysql_result($result,0,9)."' />
                                        <img width=20px; height=20px; src='img/likeButton.png' style='float:left; margin-top:5px'/>
                                            </div>";
            echo "<div id='detalleDescAtrac'>".mysql_result($result,0,2)."";
            if($_SESSION[usuario])
                echo "<div id='precioAtraccion'><br><B>".mysql_result($result,0,4)."</B>€<a href='?idcompra=".mysql_result($result,0,0)."'><img id='botoComprar'style='float:right;' src='img/botoComprar.png' height=40px; width=140px;/></a></div></div>";
            else
                echo "<div id='precioAtraccion'><br><B>".mysql_result($result,0,4)."</B>€</div></div>";
           
        }
        ?>
    </body>
</html>
