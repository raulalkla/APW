<?php
session_start();
require_once '../../Logica/Connexio.php';
require_once '../../Logica/Desti.php';

if(!$_SESSION[usuari]){
    header("Location: index.php");
}
if($_GET[logout] == 1){
    session_unset();
    header("Location: index.php");
}

$con = new Connexio();

?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>Social Travel</title>
        <link rel="stylesheet" href="../css/estil.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="../css/style.css" type="text/css" charset="utf-8"/>
        
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
                        if($_POST[nomDest]){ // Alta Destino
                            $desti = new Desti();
                            if($desti->setDesti($_POST[nomDest], $_POST[ubicacio], $_POST[estat])){
                                echo "<h2>Destino insertado!</h2>";
                            }
                            else{
                                echo "<h2>Error! Destino no insertado!</h2>";
                            }
                        }
                        else if($_POST[nomAtrac]){ // Alta Atraccion
                            
                        }
                    }
                    else{
                    ?>
                    <h1>Hola <?php echo $_SESSION[usuari] ?>!</h1>
                    <? } ?>
                </div>
            </div>
            <div id="peu"></div>
        </div>
    </body>
</html>
        
<pre>
<?php print_r($_POST); ?>
</pre>