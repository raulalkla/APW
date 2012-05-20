<?php

class TipusAtraccions {

    public function getTipusAtraccions(){
        $sql = "SELECT * FROM  tipus_atraccio";
        $result = mysql_query($sql);
        return $result;
    }
 
}

?>
