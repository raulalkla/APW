<!DOCTYPE html>
<?php
    session_start();
    require_once '../../Logica/Connexio.php';
    
    $con = new Connexio();
    
    if(!$_SESSION[usuari]){
        header("Location: index.php");
    }
    
    if($_POST[nom]){
        $sql = "INSERT INTO desti (nom, ubicacio, estat) VALUES (\"$_POST[nombre]\", \"$_POST[ubicacio]\", $_POST[2])";
        echo $sql;
    }
    
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <script type="text/javascript">
            $(document).ready(function() {
                $("#form").bind("submit", function() {
                    $.ajax({ 
                            type    : "POST", 
                            cache   : false, 
                            url     : "altaDestino.php", 
                            data    : $(this).serializeArray()
                    }); 
                    return false; 
                });
            }
        </script>
        
        <style type="text/css">
            table.hovertable {
                    font-family: verdana,arial,sans-serif;
                    font-size:11px;
                    color:#333333;
                    border-width: 1px;
                    border-color: #999999;
                    border-collapse: collapse;
                    margin-left: 30%;
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
                    text-align: center;
            }
        </style>
    </head>
    <body>
        <div id="contenedor">
        <?php 
            $sql = "SELECT d.nom, d.ubicacio, e.tipus FROM desti d, estat e WHERE e.id = d.estat ";
            //echo $sql;
            $result = $con->query($sql);
            
            $sql = "Select * FROM estat";
            $resEstat = $con->query($sql);
        ?>
            <form id="form" method="POST">
            <table class="hovertable">
                <tr>
                    <td><b>Nombre</b></td>
                    <td><b>Ubicación</b></td>
                    <td><b>Estado</b></td>
                </tr>
                <?php
                for($i = 0; $i < mysql_num_rows($result); $i++){
                    echo "<tr onmouseover=\"this.style.backgroundColor='#ffff66';\" onmouseout=\"this.style.backgroundColor='#d4e3e5';\">";
                        echo "<td>"; echo mysql_result($result, $i, 0); echo "</td>";
                        echo "<td>"; echo mysql_result($result, $i, 1);echo "</td>";
                        echo "<td>"; echo mysql_result($result, $i, 2);echo "</td>";
                    echo "</tr>";
                }
                ?>
                <tr>
                    <td> <input type="text" name="nombre"> </td>
                    <td> <input type="text" name="ubicacio"> </td>
                    <td> 
                        <select name="estado"> 
                            <?php for($j = 0; $j < mysql_num_rows($resEstat); $j++){
                                        echo "<option id='".mysql_result($resEstat, $j, 0)."'>".mysql_result($resEstat, $j, 1)."</option>";
                                  } ?>
                        </select>
                    </td>
                    <td> <input type="submit" value="Anadir"> </td>
                </tr>
            </table>
        </form>
        </div>
    </body>
</html>

<pre>
<?php print_r($_POST); ?>
</pre>