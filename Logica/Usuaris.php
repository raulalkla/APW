<?php

/**
 * Description of Usuaris
 *
 * @author Raul
 */
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

}

?>
