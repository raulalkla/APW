<?php
session_start();
require_once '../Logica/Connexio.php';
require_once '../Logica/Preferencies.php';
    $Connexio = new Connexio('pau','pau','');
    $Connexio->connectar();
    $Connexio->selectdb("socialtravel");
    $preferencies = new Preferencies();
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
        <?php
        if(@$_POST){ 
         
            ///$preferencies = new Preferencies();
           /// $usuari->updateUsuari(@utf8_encode($_POST[nom]),@utf8_encode($_POST[cognom]),@utf8_encode($_POST[dni]),@utf8_encode($_POST[usuari]),@utf8_encode($_POST[pass]));
           // echo "<p><B>Datos modificados correctamente</B></p>";
        }
        else{
            
            $result = $preferencies->getPreferencies(@$_SESSION[idUsuario]);
            
            echo "<p style='text-align:left; font-size:14px'><B>Mis preferencias:</B></p>";
            echo "<form id='form' method='POST'>";
            echo "<table border=0 class='hovertable'>";
           
            echo    "<tr>";
            echo        "<td width='100px'><B>Atraccion</B></td>";
            echo        '<td><B>Eliminar</B></td>';
            echo    "</tr>";
            for ($i = 0; $i < mysql_num_rows($result); $i++ ){
                echo    "<tr onmouseover=\"this.style.backgroundColor='#ffff66';\" onmouseout=\"this.style.backgroundColor='#d4e3e5';\">";
                $resultPreferencias = $preferencies->getNomPrefByID(mysql_result($result,$i,2));
                echo        "<td>".mysql_result($resultPreferencias,0,0)."</td>";
                echo        '<td><img src="img/drop.png"/></td>';
                echo    "</tr>";
            }
            echo "</table>";
            echo "</form>"; 
        
        }
        echo "<div id='guardarDades'> </div>";
        ?>
    </body>
</html>
