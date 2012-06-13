<?php
session_start();
require_once '../Logica/Connexio.php';
require_once '../Logica/SolicitudAmistat.php';
require_once '../Logica/Usuaris.php';
  $Connexio = new Connexio();
  $Connexio->connectar();
  $solAmistad = new SolicitudAmistat();
  
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
      <style type="text/css">
            table.hovertable {
                    font-family: verdana,arial,sans-serif;
                    font-size:11px;
                    color:#333333;
                    border-width: 1px;
                    border-color: #999999;
                    border-collapse: collapse;
                    margin-left: 2px;
                    margin-top:2%;
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
        <?php
        echo "<div id='botonsPerfil' style='margin-top:-5%'><B> 
            <table border=0 id='tableBotones'>
                <tr>
                    <td> <a href='dades.php' class='iframes fancybox.iframe' id='misDatos'>Mis datos</a> </td>
                    <td> <a href='#' id='misCompras'>Historial compras</a> </td>
                    <td> <a href='#' id='misAmistades'>Mis amistades</a> </td>
                    <td> <a href='preferencies.php' class='iframes fancybox.iframe' id='misPreferencias'>Mis preferencias</a> </td>
                  
                </tr>
            </B>
            </div>";
        
        echo "<div id='contenedorPerfil'>";
        ?>
         <table border=0 class='hovertable'>
            <tr>
                <td><b>Usuario</b></td>
                <td><b>Fecha</b></td>
                <td><b>Comentario</b></td>
                <td><b>Aceptar</b></td>
                <td><b>Rechazar</b></td>
            </tr>
                    
        <?php
           
            $result = $solAmistad->getSolicitutByUser($_SESSION[idUsuario]);
            for ($i = 0; $i < mysql_num_rows($result); $i++ ){
            echo    "<tr onmouseover=\"this.style.backgroundColor='#ffff66';\" onmouseout=\"this.style.backgroundColor='#d4e3e5';\">";
            $result = $solAmistad->get(mysql_result($result,$i,2));
            echo        "<td>".mysql_result($result,$i,1)."</td>";
            echo        "<td style='text-align:center'><a class='idEliminar' href='#' rel='".mysql_result($result,$i,2)."' OnClick=\"return confirm('Segur que vols eliminar?');\"><img src='img/drop.png'/></a></td>";
            echo    "</tr>";
                
            }
            echo "</div></table>";

        ?>
         </table>
    </body>
</html>
