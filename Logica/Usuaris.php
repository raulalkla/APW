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

}

?>
