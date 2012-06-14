<?php
session_start();
require_once '../Logica/Connexio.php';
require_once '../Logica/Usuaris.php';
require_once '../Logica/Atraccions.php';
require_once '../Logica/LiniaPedido.php';
require_once '../Logica/SolicitudAmistat.php';
require_once '../Logica/Desti.php';
require_once '../Logica/Preferencies.php';

$Connexio = new Connexio();
$Connexio->connectar();
$atraccions = new Atraccions();
$amistat = new SolicitudAmistat();
$desti = new Desti();
$preferencies = new Preferencies();
?>
<!DOCTYPE html>
<html>
    <head>

       
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        
        <script type="text/javascript">
	$(document).ready(function() {
            $(".iframes").fancybox({
		maxWidth	: 800,
		maxHeight	: 600,
		fitToView	: false,
		width		: '70%',
		height		: '70%',
		autoSize	: false,
		closeClick	: false,
		openEffect	: 'none',
		closeEffect	: 'none'
                  
                });
          
           
	
           
	});
</script>
    </head>
    <body>
        
        <?php
                     //echo "<br><p style='float:left; font-size:15px'>Destinos:</p>";
                      $resultAmigos = $amistat->getAmistadByUser($_SESSION[idUsuario]);
                     
                      $destinos = array();
                      for($i = 0 ; $i < mysql_num_rows($resultAmigos); $i++){
                        if(mysql_result($resultAmigos,$i,1) == $_SESSION[idUsuario]) $idUsuario = mysql_result($resultAmigos,$i,2);
                          else $idUsuario = mysql_result($resultAmigos,$i,1);
                         // echo "Amic".$idUsuario;
                          $result = $desti->getDestiByAmic($idUsuario); // Id de l'amic.
                          //echo "num".mysql_num_rows($result);
                          for($x = 0; $x < mysql_num_rows($result); $x ++){
                              
                             $valorDesti = mysql_result($result,$x,0);
                             //echo "<br>Desti:".$valorDesti;
                             $trobat = false;
                             for($y = 0 ; $y < sizeof($destinos) && !$trobat;$y++){
                                 if($destinos[$y]== $valorDesti) {
                                     $trobat = true;
                                    // echo "dins";
                                 }
                             }
                             if($trobat == false) $destinos[sizeof($destinos)] = $valorDesti;
                            
                             
                          }
                      }
                      //   for($y = 0 ; $y < sizeof($destinos);$y++)
                      //          echo "Destinos: ".$destinos[$y];
                      echo "<h2> Recomendación por destinos: </h2>";
                      echo "<hr>";
                      echo "<table>";
                      $numAtr = 0;
                      for($x = 0; $x< sizeof($destinos);$x++) {
                          
                        echo "<tr><td><B><p style='font-size:12px'>".$desti->getNomByID($destinos[$x]).":</p></B></td><td></td></tr>";
                        $result = $atraccions->getAtraccionByDesti($destinos[$x]);
                        for ($i = 0; $i < mysql_num_rows($result); $i++ ){
                                $numAtr++;
                                
                                if( ($x%2) ==  0 ) echo "<tr>";
                                
                                echo '<td><a class="iframes fancybox.iframe" href="atraccions.php?id='.mysql_result($result,$i,0).'">';
                                echo '<div id="atraccion" style="height:5px;">';
                                echo '  <div id="titulo_atraccion" style="font-size:11px; padding-top:5px"><b>'.mysql_result($result,$i,1).'</b></div>';
                          //      echo '	<div id="foto_atraccion"><img width="70px" height="70px" src="'.mysql_result($result,$i,9).'"/></div>';
                          //      echo '	<div id="descripcion_atraccion">'.substr(mysql_result($result,$i,2),0,90).'..."</div> ';         
                                echo '</div></a></td>';
                                if( ($x%2) ==  0 ) echo "</tr>";

                            }
                        }
                      echo "</table>";
                      if($numAtr == 0 ) echo "<p>Actualmente no te podemos recomendar ningún destino </p>";
                      
                      
                      
                      
                      
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
                      
                      echo "<h2> Mis amigos han comprado:  </h2>";
                      echo "<hr>";
                 
                      $numAtr = 0;
                     
                      for($x = 0; $x< sizeof($atraccionesAmigos);$x++) {
                          
                       
                        $result = $atraccions->getAtraccionByID($atraccionesAmigos[$x]);
                        for ($i = 0; $i < mysql_num_rows($result); $i++ ){
                               
                               $numAtr++;
                                echo '<a class="iframes fancybox.iframe" href="atraccions.php?id='.mysql_result($result,$i,0).'">';
                                echo '<div id="atraccion" style="height:5px;">';
                                echo '  <div id="titulo_atraccion" style="font-size:11px; padding-top:5px"><b>'.mysql_result($result,$i,1).'</b></div>';
                          //      echo '	<div id="foto_atraccion"><img width="70px" height="70px" src="'.mysql_result($result,$i,9).'"/></div>';
                          //      echo '	<div id="descripcion_atraccion">'.substr(mysql_result($result,$i,2),0,90).'..."</div> ';         
                                echo '</div></a></td>';

                            }
                        }
                      if($numAtr == 0 ) echo "<p> Actualmente tus amigos no han comprado ninguna atracción</p>";
                      echo "<br><br><br><br><br><br>&nbsp;";
                      echo "<h2> Sabemos que esto te gustará:  </h2>";
                      echo "<hr>";
                      $numAtr = 0;
                      $result = $preferencies->getPreferenciesUsuari($_SESSION[idUsuario]);
                      for($x = 0; $x< mysql_num_rows($result);$x++) {
                          
                        $resultAtr = $atraccions->getAtraccionByTipo(mysql_result($result,$x,2));
                        for ($i = 0; $i < mysql_num_rows($resultAtr); $i++ ){
                               
                                $numAtr++;
                                echo '<a class="iframes fancybox.iframe" href="atraccions.php?id='.mysql_result($resultAtr,$i,0).'">';
                                echo '<div id="atraccion" style="height:5px;">';
                                echo '  <div id="titulo_atraccion" style="font-size:11px; padding-top:5px"><b>'.mysql_result($resultAtr,$i,1).'</b></div>';
                          //      echo '	<div id="foto_atraccion"><img width="70px" height="70px" src="'.mysql_result($result,$i,9).'"/></div>';
                          //      echo '	<div id="descripcion_atraccion">'.substr(mysql_result($result,$i,2),0,90).'..."</div> ';         
                                echo '</div></a></td>';

                            }
                        }
                        if($numAtr == 0) echo "<p> Actualmente no te podemos recomendar ninguna atracción </p>";
                        
                  ?>
    </body>
</html>
