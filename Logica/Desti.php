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
    public function getIdDesti($num){
        $sql = "SELECT Id FROM desti";
        //echo $sql;
        $result = mysql_query($sql);
        return mysql_result($result, $num, 0);
    }
    public function getNomDesti($num){
        $sql = "SELECT nom FROM desti";
        //echo $sql;
        $result = mysql_query($sql);
        return mysql_result($result, $num, 0);
    }
    public function getUbicacio($num){
        $sql = "SELECT ubicacio FROM desti";
        //echo $sql;
        $result = mysql_query($sql);
        return mysql_result($result, $num, 0);
    }
    public function getEstat($num){
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
    public function delDesti($id){
        $sql = "DELETE FROM desti WHERE id = $id";
        //echo $sql."  ";
        $result = mysql_query($sql);
        return $result;
    }
    public function modifDesti($id, $nom, $ubicacio, $nomEstat){
        $sql = "UPDATE desti SET nom = \"$nom\", ubicacio = \"$ubicacio\", estat = (SELECT id FROM estat WHERE tipus = \"$nomEstat\") WHERE id = $id";
        //echo $sql."  ";
        $result = mysql_query($sql);
        return $result;
    }

}

?>
