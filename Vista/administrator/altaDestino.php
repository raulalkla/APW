<!DOCTYPE html>
<?php
    require_once '../../Logica/Connexio.php';
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <style type="text/css">
            table.hovertable {
                    font-family: verdana,arial,sans-serif;
                    font-size:11px;
                    color:#333333;
                    border-width: 1px;
                    border-color: #999999;
                    border-collapse: collapse;
                    margin-left: 40%;
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
            $con = new Connexio();
            $sql = "SELECT d.nom, d.ubicacio, e.tipus FROM desti d, estat e WHERE e.id = d.estat ";
            //echo $sql;
            $result = $con->query($sql);
        ?>
        <table class="hovertable">
            <tr>
                <td>Nombre</td>
                <td>Ubicacio</td>
                <td>Estats</td>
            </tr>
            <?php
            for($i = 0; $i < mysql_num_rows($result); $i++){
                echo "<tr onmouseover=\"this.style.backgroundColor='#ffff66';\" onmouseout=\"this.style.backgroundColor='#d4e3e5';\">";
                    echo "<td style='text-align:center'>"; echo mysql_result($result, $i, 0); echo "</td>";
                    echo "<td style='text-align:center'>"; echo mysql_result($result, $i, 1);echo "</td>";
                    echo "<td style='text-align:center'>"; echo mysql_result($result, $i, 2);echo "</td>";
                echo "</tr>";
            }
            ?>
        </table>
        
    </body>
</html>
