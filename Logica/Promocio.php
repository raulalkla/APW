<?php
/**
 * Description of Desti
 *
 * @author Raul
 */
class Promocio {

    public function getPromocio(){
        $sql = "SELECT * FROM promocio";
        $result = mysql_query($sql);
        return $result;
    }
    public function getIdDesti($num){
        $sql = "SELECT Id FROM promocio ORDER BY 1";
        //echo $sql;
        $result = mysql_query($sql);
        return mysql_result($result, $num, 0);
    }
    public function getDataIni($num){
        $sql = "SELECT id, data_inici FROM promocio ORDER BY 1";
        //echo $sql;
        $result = mysql_query($sql);
        return mysql_result($result, $num, 1);
    }
    public function getDataFi($num){
        $sql = "SELECT id, data_fi FROM promocio ORDER BY 1";
        //echo $sql;
        $result = mysql_query($sql);
        return mysql_result($result, $num, 1);
    }
    public function getDescripcio($num){
        $sql = "SELECT id, descripcio FROM promocio ORDER BY 1";
        //echo $sql;
        $result = mysql_query($sql);
        return mysql_result($result, $num, 1);
    }
    public function getDescripcioByID($id){
        $sql = "SELECT descripcio FROM promocio WHERE id = $id";
        //echo $sql;
        $result = mysql_query($sql);
        return mysql_result($result, 0);
    }
    public function getDescompte($num){
        $sql = "SELECT descompte FROM promocio";
        //echo $sql;
        $result = mysql_query($sql);
        return mysql_result($result, $num, 0);
    }
    public function getNumPromocions() {
        $sql = "SELECT count(*) FROM promocio";
        $result = mysql_query($sql);
        return mysql_result($result, 0);
    }
/*
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
*/
}

?>
