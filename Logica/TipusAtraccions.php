<?php

class TipusAtraccions {

    public function getTipusAtraccions(){
        $sql = "SELECT * FROM  tipus_atraccio";
        $result = mysql_query($sql);
        return $result;
    }
    public function getIdTipusAtraccions($num){
        $sql = "SELECT Id FROM tipus_atraccio";
        //echo $sql;
        $result = mysql_query($sql);
        return mysql_result($result, $num, 0);
    }
    public function getNom($num){
        $sql = "SELECT nom FROM tipus_atraccio";
        //echo $sql;
        $result = mysql_query($sql);
        return mysql_result($result, $num, 0);
    }
    public function getNomByID($id){
        $sql = "SELECT nom FROM tipus_atraccio WHERE id = $id";
        //echo $sql;
        $result = mysql_query($sql);
        return mysql_result($result, 0);
    }
    public function getDescricio($num){
        $sql = "SELECT descripcio FROM tipus_atraccio";
        //echo $sql;
        $result = mysql_query($sql);
        return mysql_result($result, $num, 0);
    }
    /**
     * @param type $num
     * @return type id de la bd
     */
    public function getEstat($num){
        $sql = "SELECT estat FROM tipus_atraccio";
        //echo $sql;
        $result = mysql_query($sql);
        return mysql_result($result, $num, 0);
    }
    public function getNumTipusAtraccions() {
        $sql = "SELECT count(*) FROM tipus_atraccio";
        $result = mysql_query($sql);
        return mysql_result($result, 0);
    }
    public function setTipusAtraccions($nom, $descripcio, $nomEstat){
        $sql = "INSERT INTO tipus_atraccio (nom, descripcio, estat) VALUES (\"$nom\", \"$descripcio\", (SELECT id FROM estat WHERE tipus = \"$nomEstat\") )";
        //echo $sql."  ";
        $result = mysql_query($sql);
        return $result;
    }
    public function delTipusAtraccions($id){
        $sql = "DELETE FROM tipus_atraccio WHERE id = $id";
        //echo $sql."  ";
        $result = mysql_query($sql);
        return $result;
    }
    public function modifTipusAtraccions($id, $nom, $descripcio, $nomEstat){
        $sql = "UPDATE tipus_atraccio SET nom = \"$nom\", descripcio = \"$descripcio\", estat = (SELECT id FROM estat WHERE tipus = \"$nomEstat\") WHERE id = $id";
        //echo $sql."  ";
        $result = mysql_query($sql);
        return $result;
    }
    
}

?>
