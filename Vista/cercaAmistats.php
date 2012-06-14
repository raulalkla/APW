<?php
session_start();
require_once '../Logica/Connexio.php';
require_once '../Logica/Usuaris.php';
require_once '../Logica/SolicitudAmistat.php';

$Connexio = new Connexio();
$Connexio->connectar();
$usuario = new Usuaris();

?>


<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
            <script type="text/javascript">
                $(document).ready(function() {
                    $("#form").bind("submit", function() { 
                        $.fancybox.showActivity(); 
                        $.ajax({ 
                                type    : "POST", 
                                cache   : false, 
                                url     : "cercaAmistats.php", 
                                data    : $(this).serializeArray(), 
                                success: function(data) { 
                                        $.fancybox(data); 
                                } 
                        }); 
                        return false; 
                    }); 
                    $("#formComentario").bind("submit", function() { 
                        $.fancybox.showActivity(); 
                        $.ajax({ 
                                type    : "POST", 
                                cache   : false, 
                                url     : "cercaAmistats.php", 
                                data    : $(this).serializeArray(), 
                                success: function(data) { 
                                        $.fancybox(data); 
                                } 
                        }); 
                        return false; 
                    }); 
                   $('a.idComentario').click(function(){
                        var txt=$(this).attr("rel");
                        $('#contenedorBusqueda').load("cercaAmistats.php?enviaPeticion="+txt); 
                    });                        
                                      
                                
                });                    
        </script>
    </head>
    <body>
       <?php  if(!$_GET){ ?>
        <form id="form" method="POST">
            
            Nombre:   <input type="search" name="nombre"/>
            <input type="submit" name="enviar" value="Buscar" />
            
        </form>
        
        <?php
       }
        echo "<div id='contenedorBusqueda'>";
        if($_POST || $_GET){
            if(isset($_POST[nombre])){
                $result = $usuario->getUsuariByCerca($_POST[nombre],$_SESSION[idUsuario]);
                $_SESSION[nombreBusqueda] = $_POST[nombre];
            }
            else {
                 $result = $usuario->getUsuariByCerca( $_SESSION[nombreBusqueda],$_SESSION[idUsuario]);
           
            }
            if(mysql_num_rows($result) > 0 ){

                echo "<p style='text-align:left; font-size:14px'><B>Resultados:</B></p>";
                echo "<form id='form' method='POST'>";
                echo "<table border=0 class='hovertable'>";

                echo    "<tr>";
                echo        "<td width='150px'><B>Usuario</B></td>";
                echo        '<td><B>Enviar petición</B></td>';
                echo    "</tr>";
                for ($i = 0; $i < mysql_num_rows($result); $i++ ){
                    echo    "<tr onmouseover=\"this.style.backgroundColor='#ffff66';\" onmouseout=\"this.style.backgroundColor='#d4e3e5';\">";
                    echo        "<td>".mysql_result($result,$i,1)." ".mysql_result($result,$i,2)."</td>";
                    echo        "<td style='text-align:center'><a class='idComentario' href='#' rel='".mysql_result($result,$i,0)."'><img src='img/sobre.gif'/></a></td>";
                    echo    "</tr>";
                }
                echo "</table>";
                echo "</form>"; 
                }else{ echo "<p> No hay resultados en la busqueda ! </p>"; }


        }
        if($_GET[enviaPeticion]){
               
            echo "<p style='text-align:left; font-size:14px'><B>Comentario:</B></p>";
            echo "<form id='formComentario' method='POST'>";
            echo "<table border=0 class='hovertable'>";
            echo    "<tr>";
            echo        "<td width='150px'><B><textarea name='comentario'> </textarea></B></td>";
            echo        "<B><input type='hidden' name='idComentario' value='".$_GET[enviaPeticion]."'></B>";
            echo        "<td width='150px'><B><input type='submit' name='enviaComentario' value='Enviar'/></B></td>";
            echo    "</tr>";
            echo "</table>";
            echo "</form>";
        }
            echo "</div>";
            
        if($_POST[idComentario]){
            $solAmistad = new SolicitudAmistat();
            $solAmistad->setSolicitudAmistat($_SESSION[idUsuario],$_POST[idComentario], $_POST[comentario]);
        }
        ?>
        
    </body>
</html>
