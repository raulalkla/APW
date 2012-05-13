<?php
require_once("../Logica/Connexio.php");
    
    $Connexio = new Connexio('root','','');
    $Connexio->connectar();
    $Connexio->selectdb("socialtravel");
    $usuaris = $Connexio->query("SELECT * FROM usuaris");
?>
