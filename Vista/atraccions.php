<?php
session_start();
require_once '../Logica/Connexio.php';
require_once '../Logica/Atraccions.php';
require_once '../Logica/SolicitudAmistat.php';
    $Connexio = new Connexio();
    $Connexio->connectar();
    $Connexio->selectdb("socialtravel");
    $amistat = new SolicitudAmistat();
    $atraccions = new Atraccions();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        $resultAmigos = $amistat->getAmistadByUser($_SESSION[idUsuario]);
                     
        $atraccionesAmigos = array();
        for($i = 0 ; $i < mysql_num_rows($resultAmigos); $i++){
        if(mysql_result($resultAmigos,$i,1) == $_SESSION[idUsuario]) $idUsuario = mysql_result($resultAmigos,$i,2);
            else $idUsuario = mysql_result($resultAmigos,$i,1);
            // echo "Amic".$idUsuario;
            $result = $atraccions->getAtraccionsAmics($idUsuario); // Id de l'amic.
            //echo "num".mysql_num_rows($result);
            for($x = 0; $x < mysql_num_rows($result); $x ++){
                $valorAtraccio = mysql_result($result,$x,0);
                //echo "<br>Desti:".$valorDesti;
                $trobat = false;
                for($y = 0 ; $y < sizeof($atraccionesAmigos) && !$trobat;$y++){
                    if($atraccionesAmigos[$y]== $valorAtraccio) {
                        $trobat = true;
                    // echo "dins";
                    }
                }
                if($trobat == false) $atraccionesAmigos[sizeof($atraccionesAmigos)] = $valorAtraccio;


            }
        }
        
        
        if(@$_GET[id])
        {
            
            $descuento = false;
            for($i=0;$i<sizeof($atraccionesAmigos); $i++){
                if($atraccionesAmigos[$i] == $_GET[id]) $descuento = true;
            }
            $Atraccions = new Atraccions();
            $result = $Atraccions->getAtraccionByID(@$_GET[id]);
            echo "<div id='detalleTitulo'><h2>".mysql_result($result,0,1)."</h2></div>";
            echo "<div id='detalleFoto'><img width=200px height=200px src='".mysql_result($result,0,9)."' />
                                        <img width=20px; height=20px; src='img/likeButton.png' style='float:left; margin-top:5px'/>
                                            </div>";
            echo "<div id='detalleDescAtrac'>".mysql_result($result,0,2)."";
            if($_SESSION[usuario])
                if($descuento){
                     $precio = (mysql_result($result,0,4))-(0.1*mysql_result($result,0,4));
                     echo "<div id='precioAtraccion'><br>(<strike><B>".mysql_result($result,0,4)."</B>€</strike>)&nbsp;<B>".$precio."</B>€ <a href='?idcompra=".mysql_result($result,0,0)."&dsc=1'>&nbsp;&nbsp;<img id='botoComprar'style='float:right;' src='img/botoComprar.png' /></a></div></div>";      
                }else{
                echo "<div id='precioAtraccion'><br><B>".mysql_result($result,0,4)."</B>€<a href='?idcompra=".mysql_result($result,0,0)."'>&nbsp;&nbsp;<img id='botoComprar'style='float:right;' src='img/botoComprar.png'/></a></div></div>";
                }
           else echo "<div id='precioAtraccion'><br><B>".mysql_result($result,0,4)."</B>€</div></div>";
           
        }
        ?>
    </body>
</html>
