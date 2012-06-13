<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        ?>
        <table>
            <tr>
                <td> <input type="text" name="nomDest"> </td>
                <td> <input type="text" name="ubicacio"> </td>
                <td> 
                    <select name="estat"> 
                        <?php for($j = 0; $j < mysql_num_rows($resEstat); $j++){
                                    echo "<option>".mysql_result($resEstat, $j, 1)."</option>";
                                } ?>
                    </select>
                </td>
                <td> <input type="submit" value="Anadir"> </td>
            </tr>
        </table>
    </body>
</html>
