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
    // Obtenim els destins on ha comprat un amic
    public function getDestiByAmic($idAmics){
        $sql = "SELECT DISTINCT (a.desti)
                FROM historic_compres hd
                LEFT JOIN linies_comanda lc ON hd.linia_comanda = lc.id
                LEFT JOIN atraccio a ON lc.atraccio = a.id
                WHERE hd.usuari = ".$idAmics;
        // echo $sql;
        $result = mysql_query($sql);
        return $result;
    }
    public function getNomByID($id){
        $sql = "SELECT id, nom FROM desti WHERE id = ".$id." ORDER BY 1";
        //echo $sql;
        $result = mysql_query($sql);
        return mysql_result($result, 0, 1);
    }
    public function getIdDesti($num){
        $sql = "SELECT Id FROM desti ORDER BY 1";
        //echo $sql;
        $result = mysql_query($sql);
        return mysql_result($result, $num, 0);
    }
    public function getNomDesti($num){
        $sql = "SELECT id, nom FROM desti ORDER BY 1";
        //echo $sql;
        $result = mysql_query($sql);
        return mysql_result($result, $num, 1);
    }
    public function getUbicacio($num){
        $sql = "SELECT id, ubicacio FROM desti ORDER BY 1";
        //echo $sql;
        $result = mysql_query($sql);
        return mysql_result($result, $num, 1);
    }
    public function getEstat($num){
        $sql = "SELECT id, estat FROM desti ORDER BY 1";
        //echo $sql;
        $result = mysql_query($sql);
        return mysql_result($result, $num, 1);
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
