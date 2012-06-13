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
    public function getNomDestiByID($id){
        $sql = "SELECT nom FROM desti";
        //echo $sql;
        $result = mysql_query($sql);
        return mysql_result($result, $id, 0);
    }
    public function getUbicacioByID($id){
        $sql = "SELECT ubicacio FROM desti";
        //echo $sql;
        $result = mysql_query($sql);
        return mysql_result($result, $id, 0);
    }
    public function getEstatByID($id){
        $sql = "SELECT estat FROM desti";
        //echo $sql;
        $result = mysql_query($sql);
        return mysql_result($result, $id, 0);
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
