<!DOCTYPE html>
<?php
session_start();
require_once '../../Logica/Connexio.php';

if($_POST){
    $con = new Connexio();
    $sql = "SELECT * FROM usuaris WHERE usuari = \"$_POST[admin]\" AND password = MD5(\"$_POST[password]\") AND admin = 1";
    echo $sql;
    $result = $con->query($sql);
    if(mysql_num_rows($result) > 0)
        header("Location: http://www.codigomaestro.com/");
}

?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Administrador</title>
        <link rel="stylesheet" href="../css/estil.css" type="text/css" media="screen" />
    </head>
    <body>
        <div id="login">
            <form method='POST'>
            <input type='text' name='admin' value='Administrador' onFocus="if(this.value=='Administrador') this.value='';"/><br>
            <input type='password' name='password' value='password' onFocus="if(this.value=='password') this.value='';"/><br>
            <input type='submit' name='loginAdmin'  />
            </form>
        </div>
    </body>
</html>
