<?php

class Atraccions {

    public function getAtraccions(){
        $sql = "SELECT * FROM atraccio";
        $result = mysql_query($sql);
        return $result;
    }
}

?>
