<?php
session_start();
require_once '../Logica/Connexio.php';
require_once '../Logica/Preferencies.php';
require_once '../Logica/TipusAtraccions.php';
    $Connexio = new Connexio();
    $Connexio->connectar();
    $Connexio->selectdb("socialtravel");
    $preferencies = new Preferencies();
    $tipusAtraccions = new TipusAtraccions();

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
                                url     : "preferencies.php", 
                                data    : $(this).serializeArray(), 
                                success: function(data) { 
                                        $.fancybox(data); 
                                } 
                        }); 
                        return false; 
                    });  
                    $("#formAddPreferencia").bind("submit", function() { 
                        $.fancybox.showActivity(); 
                        $.ajax({ 
                                type    : "POST", 
                                cache   : false, 
                                url     : "preferencies.php", 
                                data    : $(this).serializeArray(), 
                                success: function(data) { 
                                        $.fancybox(data); 
                                } 
                        }); 
                        return false; 
                    });  
                   
                   $('a.idEliminar').click(function(){
                        var txt=$(this).attr("rel");
                        $("#contenedor_preferencias").load("preferencies.php?idEliminar="+txt); 
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
            
            $preferencies->delPreferenciaUsuari($_GET['idEliminar'], $_SESSION['idUsuario']);
        
        }
        if(@$_POST){ $preferencies->setPreferenciaUsuari($_POST['preferencias'], $_SESSION['idUsuario']);   }
   
        $result = $preferencies->getPreferenciesUsuari(@$_SESSION[idUsuario]);

        echo "<p style='text-align:left; font-size:14px'><B>Mis preferencias:</B></p>";
        echo "<form id='form' method='POST'>";
        echo "<table border=0 class='hovertable'>";

        echo    "<tr>";
        echo        "<td width='150px'><B>Atraccion</B></td>";
        echo        '<td><B>Eliminar</B></td>';
        echo    "</tr>";
        for ($i = 0; $i < mysql_num_rows($result); $i++ ){
            echo    "<tr onmouseover=\"this.style.backgroundColor='#ffff66';\" onmouseout=\"this.style.backgroundColor='#d4e3e5';\">";
            $resultPreferencias = $preferencies->getNomPrefByID(mysql_result($result,$i,2));
            echo        "<td>".mysql_result($resultPreferencias,0,0)."</td>";
            echo        "<td style='text-align:center'><a class='idEliminar' href='#' rel='".mysql_result($result,$i,2)."' OnClick=\"return confirm('Seguro que quieres eliminar?');\"><img src='img/drop.png'/></a></td>";
            echo    "</tr>";
        }
        echo "</table>";
        echo "</form>"; 
           
          
       
        echo "<form id='formAddPreferencia' method='POST'>";
        echo "<table border=0>";
        echo    "<tr>";
        echo        "<td width='150px' style='text-align:right'>
                        <select name='preferencias'>
                        ";
                        $result = $tipusAtraccions->getTipusAtraccions();
                        for($i = 0 ; $i < mysql_num_rows($result); $i++){
                            echo "<option value='".mysql_result($result,$i,0)."'>".mysql_result($result, $i,1)."</option>";                            
                        }
        echo "          </select>
                    </td>";
        echo        "<td width='70px' style='text-align:right'><input type='submit' name='addPreferencia' /></td>";
        echo    "</tr>";
        echo "</table>";
        echo "</form>"
        ?>
        </div>
    </body>
</html>
