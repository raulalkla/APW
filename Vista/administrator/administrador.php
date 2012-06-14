<?php
session_start();
require_once '../../Logica/Connexio.php';
require_once '../../Logica/Desti.php';
require_once '../../Logica/TipusAtraccions.php';
require_once '../../Logica/Atraccions.php';
require_once '../../Logica/LiniaPedido.php';

if(!$_SESSION[usuari]){
    header("Location: index.php");
}
if($_GET[logout] == 1){
    session_unset();
    header("Location: index.php");
}

$con = new Connexio();

$lComanda = new LiniaPedido();
$atraccio = new Atraccions();

?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>Social Travel</title>
        <link rel="stylesheet" href="../css/estil.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="../css/style.css" type="text/css" charset="utf-8"/>
        
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        
        <script type="text/javascript">
            google.load("visualization", "1", {packages:["corechart"]});
            google.setOnLoadCallback(drawChart);
            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                ['Atraccion', 'Num. Ventas'],
                <?php 
                for($i = 0; $i < $lComanda->getNumVentasDiarias(); $i++){
                    echo "['".$atraccio->getNomAtraccionByID($lComanda->getIdAtraccioVentasDiarias($i))."', ".$lComanda->getCantitatVentasDiarias($i)." ]";
                    if($i < $lComanda->getNumVentasDiarias()) echo ",";
                }
                ?>
                ]);

                var options = {
                hAxis: {title: 'Atraccion', titleTextStyle: {color: 'red'}}
                };

                //var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
                var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
                chart.draw(data, options);
            }
        </script>
        
        <script type="text/javascript" src="../js/jquery-1.4.3.min.js"></script> 
        <script type="text/javascript" src="../js/jquery.mousewheel-3.0.4.pack.js"></script>
        <script type="text/javascript" src="../js/jquery.fancybox-1.3.4.pack.js"></script>
        <link rel="stylesheet" type="text/css" href="../fancybox/jquery.fancybox-1.3.4.css" media="screen" />
        
        <script type="text/javascript">
        $(document).ready(function() {
            $("#aDestino").click(function(evento){
                $("#contenedorAdmin").load("gestionDestino.php");
            });
            $("#aAtraccion").click(function(evento){
                $("#contenedorAdmin").load("gestionAtraccion.php"); 
            });
            $("#aTipoAtraccion").click(function(evento){
                $("#contenedorAdmin").load("gestionTipoAtraccion.php"); 
            });
            $("#aEstadisticas").click(function(evento){
                $("#contenedorAdmin").load("estadisticas.php"); 
            });
        });
        function mostraAltaDestino(){
            $("#contenedorAdmin").load("altaDestino.php");
        }
        </script>
        
    </head>
    <body>
        <div id="cap_sup">
            <div id="cont_suscripcion">
                <br> Panel de administración <br><br>
                <a href='?logout=1' style='margin-top:15px'><img src='../img/logout.gif' width=20px; height=20px; /></a>
            </div>
        </div>
        <div id="contenedor">
            <div id="sup">
                <div id="iconosMenu" style="float:left; margin-left:60px; margin-top: 30px">
                    <a href="administrador.php"><img src="../img/icon-home.png" /> </a>
                </div>
            </div>
            <div id="cos">
                <div id='botonsPerfil' style="margin-left: 50px">
                    <table border=0 id='tableBotones'>
                    <tr>
                        <td> <a href='#' id='aDestino'>Destino</a> </td>
                        <td> <a href='#' id='aAtraccion'>Atraccion</a> </td>
                        <td> <a href='#' id='aTipoAtraccion'>Tipo atraccion</a> </td>
                        <!--<td> <a href='#' class='iframes fancybox.iframe' id='misPreferencias'>Mis preferencias</a> </td> -->
                    </tr>
                    </table>
                </div>
                <div id='contenedorAdmin'>
                    <?php 
                    if($_POST){
                        // ************* Alta Destino ******************
                        if($_POST[anadirDesti]){ 
                            $desti = new Desti();
                            if($desti->setDesti($_POST[nomDest], $_POST[ubicacio], $_POST[estat])){
                                echo "<h2>Destino insertado!</h2>";
                            }
                            else{
                                echo "<h2>Error! Destino no insertado!</h2>";
                            }
                        }
                        // ************* Modificar Destino *****************
                        else if($_POST[modifDesti]){ 
                            $desti = new Desti();
                            if($desti->modifDesti($_POST[idDest],$_POST[nomDest], $_POST[ubicacio], $_POST[estat])){
                                echo "<h2>Destino modificado!</h2>";
                            }
                            else{
                                echo "<h2>Error! Destino no modificado!</h2>";
                            }
                        }
                        // ************* Alta Tipus Atraccion *************
                        else if($_POST[anadirTAtrac]){ 
                            $tAtrac = new TipusAtraccions();
                            if($tAtrac->setTipusAtraccions($_POST[nomTAtrac], $_POST[descripcioTAtrac], $_POST[estatTAtrac]))
                                  echo "<h2>Tipo de atraccion insertado!</h2>";
                            else
                                echo "<h2>Error! Tipo de atraccion no insertado!</h2>";
                        }
                        // ************* Modificar Tipus Atraccions *************
                        else if($_POST[modifTAtrac]){
                            $tAtrac = new TipusAtraccions();
                            if($tAtrac->modifTipusAtraccions($_POST[idTAtrac], $_POST[nomTAtrac], $_POST[ubicacioTAtrac], $_POST[estatTAtrac]))
                                echo "<h2>Tipo de atraccion modificado!</h2>";
                            else
                                echo "<h2>Error! Tipo de atraccion no modificado!</h2>";
                        }
                        //************* Alta Atraccio *************
                        else if($_POST[anadirAtraccion]){
                            //uploat image
                            $archivo = $_FILES['imagen']['name'];
                            $tmp = $_FILES['imagen']['tmp_name'];
                            $destino = "../img/atraccions/".$archivo;
                            @move_uploaded_file($tmp,$destino);
                            
                            $atrac = new Atraccions();
                            if($atrac->insert($_POST[nomAtrac], $_POST[descr], $_POST[duracion], $_POST[precio], $_POST[estado], $_POST[destino], $_POST[promocion], $_POST[tipo], "\"".substr($destino, 3)."\""))
                                  echo "<h2>Atraccion insertado!</h2>";
                            else
                                echo "<h2>Error! Atraccion no insertado!</h2>";  
                        }
                        //************* Modificar Atraccio *************
                        else if($_POST[modificarAtraccion]){
                            //uploat image
                            if($_FILES['imagen']['name']){
                                $archivo = $_FILES['imagen']['name'];
                                $tmp = $_FILES['imagen']['tmp_name'];
                                $destino = "../img/atraccions/".$archivo;
                                @move_uploaded_file($tmp,$destino);
                            }
                            else
                                $destino = "../null";
                                
                                $atrac = new Atraccions();
                                if($atrac->update($_POST[idAtraccio] ,$_POST[nomAtrac], $_POST[descr], $_POST[duracion], $_POST[precio], $_POST[estado], $_POST[destino], $_POST[promocion], $_POST[tipo], "\"".substr($destino, 3)."\""))
                                    echo "<h2>Atraccion actualizada!</h2>";
                                else
                                    echo "<h2>Error! Atraccion no actualizada!</h2>";  
                        }
                    }
                    else{
                    ?>
                    <h2>Ventas diarias</h2><hr style="margin: auto 10% auto 10%">
                    <div id="chart_div" style="width: 800px; height: 400px; margin: auto 10% auto auto"></div>
                    <? } ?>
                </div>
            </div>
            <div id="peu"></div>
        </div>
    </body>
</html>
        
<pre>
<?php //print_r($_POST); ?>
</pre>