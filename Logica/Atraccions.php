<?php

class Atraccions {

    public function getAtraccions(){
        $sql = "SELECT * FROM atraccio";
        $result = mysql_query($sql);
        return $result;
    }
    public function getAtraccionByID($id){
        $sql = "SELECT * FROM atraccio WHERE id = ".$id;
        $result = mysql_query($sql);
        return $result;
    }
}

?>
