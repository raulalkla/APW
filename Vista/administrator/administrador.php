<?php
session_start();

if(!$_SESSION[usuari]){
    header("Location: index.php");
}
if($_GET[logout] == 1){
    unset($_SESSION);
    header("Location: index.php");
}

?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>Social Travel</title>
        <link rel="stylesheet" href="../css/estil.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="../css/style.css" type="text/css" charset="utf-8"/>
    </head>
    <body>
        <div id="cap_sup">
            <div id="cont_suscripcion">
                <h2>Hola <?php echo $_SESSION[usuari] ?>!</h2>
                <a href='?logout=1' style='margin-top:15px'><img src='../img/logout.gif' width=20px; height=20px; /></a>
            </div>
        </div>
        <div id="contenedor">
            <div id="sup">
                <div id="iconosMenu" style="float:left; margin-left:60px; margin-top: 30px">
                    <a href="index.php"><img src="../img/icon-home.png" /> </a>
                </div>
            </div>
            <div id="cos">

            </div>
            <div id="peu"></div>
        </div>
</body>
</html>
        
        