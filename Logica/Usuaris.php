<?php

class Usuaris {
    
    public function getUsuaris(){
        $sql = "SELECT * FROM usuaris";
        $result = mysql_query($sql);
        return $result;
    }
    
    public function setUsuari($nom, $cognom, $dni, $nom, $pass){
        $sql = "INSERT INTO usuaris (nom, cognom, dni, usuari, password)".
                "VALUES('".$nom."', '".$cognom."', '".$dni."', '".$nom."', md5('".$pass."') )";
        mysql_query($sql);
    }
    
    public function validaUsuari($dni){
        $sql = "SELECT * FROM usuaris WHERE dni = '".$dni."'";
        $result = mysql_query($sql);
        if(mysql_num_rows($result) == 0) return false;
        return true;
    }
    public function autentificarUsuari($nom,$password){
        
        $sql = "SELECT * FROM usuaris WHERE nom = '".$nom."' AND password = md5('".$password."')";
        $result = mysql_query($sql);
        if(mysql_num_rows($result) == 0) return false;
        return true;
    }

}

?>
