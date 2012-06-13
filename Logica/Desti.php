<?php
/**
 * Description of Desti
 *
 * @author Raul
 */
class Desti {

    public function getDesti(){
        $sql = "SELECT * FROM desti";
        $result = mysql_query($sql);
        return $result;
    }
    public function getDestiByID($id){
        $sql = "SELECT * FROM desti WHERE id = ".$id;
        $result = mysql_query($sql);
        return $result;
    }
    public function getNomDestiByID($num){
        $sql = "SELECT nom FROM desti";
        //echo $sql;
        $result = mysql_query($sql);
        return mysql_result($result, $num, 0);
    }
    public function getUbicacioByID($num){
        $sql = "SELECT ubicacio FROM desti";
        //echo $sql;
        $result = mysql_query($sql);
        return mysql_result($result, $num, 0);
    }
    public function getEstatByID($num){
        $sql = "SELECT estat FROM desti";
        //echo $sql;
        $result = mysql_query($sql);
        return mysql_result($result, $num, 0);
    }
    public function getNumDestins() {
        $sql = "SELECT count(*) FROM desti";
        $result = mysql_query($sql);
        return mysql_result($result, 0);
    }
    public function setDesti($nom, $ubicacio, $nomEstat){
        $sql = "INSERT INTO desti (nom, ubicacio, estat) VALUES (\"$nom\", \"$ubicacio\", (SELECT id FROM estat WHERE tipus = \"$nomEstat\") )";
        //echo $sql."  ";
        $result = mysql_query($sql);
        return $result;
    }

}

?>
