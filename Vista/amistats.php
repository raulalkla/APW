<?php
session_start();
require_once '../Logica/Connexio.php';
require_once '../Logica/SolicitudAmistat.php';
require_once '../Logica/Usuaris.php';

    $Connexio = new Connexio();
    $Connexio->connectar();
    $Connexio->selectdb("socialtravel");
    
    $solAmistad = new SolicitudAmistat();
    $usuario = new Usuaris();
    

?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <script type="text/javascript">
                $(document).ready(function() {
                 $('a.idAceptar').click(function(){
                     var txt=$(this).attr("rel");
                    $("#contenedor_preferencias").load("amistats.php?idAceptar="+txt); 
                });
                $('a.idEliminar').click(function(){
                        var txt=$(this).attr("rel");
                        $("#contenedor_preferencias").load("amistats.php?idEliminar="+txt); 
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
        <div id="contenedor_preferencias">
        <?php
        if($_GET['idEliminar']){
            $solAmistad->delAmistad($_GET['idEliminar']);
        }
        
        if($_GET['idAceptar']){
            $solAmistad->setAcceptarSolicitut($_GET['idAceptar']);
        }
        
        $result = $solAmistad->getAmistadByUser($_SESSION[idUsuario]);
        if(mysql_num_rows($result) > 0 ){

        echo "<p style='text-align:left; font-size:14px'><B>Mis amistades:</B></p>";
        echo "<form id='form' method='POST'>";
        echo "<table border=0 class='hovertable'>";

        echo    "<tr>";
        echo        "<td width='150px'><B>Amistad</B></td>";
        echo        '<td><B>Eliminar</B></td>';
        echo    "</tr>";
        for ($i = 0; $i < mysql_num_rows($result); $i++ ){
            echo    "<tr onmouseover=\"this.style.backgroundColor='#ffff66';\" onmouseout=\"this.style.backgroundColor='#d4e3e5';\">";
            if(mysql_result($result,$i,1) == $_SESSION[idUsuario]) $idUsuario = mysql_result($result,$i,2);
            else $idUsuario = mysql_result($result,$i,1);
            $resultNombre = $usuario->getUsuariByID($idUsuario);
            echo        "<td>".mysql_result($resultNombre,0,1)." ".mysql_result($resultNombre,0,2)."</td>";
            echo        "<td style='text-align:center'><a class='idEliminar' href='#' rel='".mysql_result($result,$i,0)."' OnClick=\"return confirm('Segur que vols eliminar?');\"><img src='img/drop.png'/></a></td>";
            echo    "</tr>";
        }
        echo "</table>";
        echo "</form>"; 
        }else{ echo "<p> No tienes amistades ! </p>"; }
          
        
        $result = $solAmistad->getAmistadRechazadaByUser($_SESSION[idUsuario]);
        if(mysql_num_rows($result) > 0 ){

        echo "<p style='text-align:left; font-size:14px'><B>Amistades rechazadas:</B></p>";
        echo "<form id='form' method='POST'>";
        echo "<table border=0 class='hovertable'>";

        echo    "<tr>";
        echo        "<td width='150px'><B>Amistad</B></td>";
        echo        "<td><b>Aceptar</b></td>";
        echo        '<td><B>Eliminar</B></td>';
        echo    "</tr>";
        for ($i = 0; $i < mysql_num_rows($result); $i++ ){
            echo    "<tr onmouseover=\"this.style.backgroundColor='#ffff66';\" onmouseout=\"this.style.backgroundColor='#d4e3e5';\">";
            $resultNombre = $usuario->getUsuariByID(mysql_result($result,$i,1));
            echo        "<td>".mysql_result($resultNombre,0,1)." ".mysql_result($resultNombre,0,2)."</td>";
            echo        "<td style='text-align:center'><a class='idAceptar' href='#' rel='".mysql_result($result,$i,0)."'><img src='img/aceptar.png' height=22px/></a></td>";
            echo        "<td style='text-align:center'><a class='idEliminar' href='#' rel='".mysql_result($result,$i,0)."' OnClick=\"return confirm('Seguro que quieres rechazarla?');\"><img src='img/drop.png'/></a></td>";
            echo    "</tr>";
        }
        echo "</table>";
        echo "</form>"; 
        }else{ echo "<p> No tienes amistades rechazadas ! </p>"; }
        
        
        
        
        ?>
        </div>
    </body>
</html>
