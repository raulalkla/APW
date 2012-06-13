<?php
/**
 * Description of Estat
 *
 * @author Raul
 */
class Estat {

    public function getEstat(){
        $sql = "SELECT * FROM estat";
        $result = mysql_query($sql);
        return $result;
    }
    public function getEstatByID($id){
        $sql = "SELECT * FROM estat WHERE id = ".$id;
        $result = mysql_query($sql);
        return $result;
    }
    /**
     * @param type $id de la base de dades
     * @return type 
     */
    public function getTipusEstatByID($id){
        $sql = "SELECT tipus FROM estat WHERE id = ".$id;
        //echo $sql;
        $result = mysql_query($sql);
        return mysql_result($result, 0);
    }
    public function getTipusEstat($num){
        $sql = "SELECT tipus FROM estat";
        //echo $sql;
        $result = mysql_query($sql);
        return mysql_result($result, $num, 0);
    }
    public function getNumEstats() {
        $sql = "SELECT count(*) FROM estat";
        $result = mysql_query($sql);
        return mysql_result($result, 0);
    }
    public function setEstat($tipus){
        $sql = "INSERT INTO estat (tipus) VALUES (\"$tipus\")";
        $result = mysql_query($sql);
        return $result;
    }

}

?>
