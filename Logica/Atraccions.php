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
    public function getNomAtraccionByID($id){
        $sql = "SELECT nom FROM atraccio WHERE id = ".$id;
        $result = mysql_query($sql);
        return mysql_result($result, 0);
    }
    public function getAtraccionByDesti($id){
        $sql = "SELECT * FROM atraccio WHERE desti = ".$id;
        $result = mysql_query($sql);
        return $result;
    }
    public function getPreu($id){
        $sql = "SELECT preu FROM atraccio WHERE id = ".$id;
        //echo $sql."  ";
        $result = mysql_query($sql);
        return mysql_result($result, 0);
    }
}

?>
