<?php

class Atraccions {

    public function getAtraccions(){
        $sql = "SELECT * FROM atraccio";
        $result = mysql_query($sql);
        return $result;
    }
    public function getAtraccionsUltimes(){
        $sql = "SELECT * FROM atraccio ORDER BY 1 DESC";
        $result = mysql_query($sql);
        return $result;
    }
    public function getAtraccionsAmics($idAmic){
        $sql = "SELECT DISTINCT (a.id)
                FROM historic_compres hd
                LEFT JOIN linies_comanda lc ON hd.linia_comanda = lc.id
                LEFT JOIN atraccio a ON lc.atraccio = a.id
                WHERE hd.usuari = ".$idAmic;
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
    public function getPreuByID($id){
        $sql = "SELECT preu FROM atraccio WHERE id = ".$id;
        //echo $sql."  ";
        $result = mysql_query($sql);
        return mysql_result($result, 0);
    }
    public function getNom($num) {
        $sql = "SELECT nom FROM atraccio";
        $result = mysql_query($sql);
        return utf8_encode(mysql_result($result, $num, 0));
    }
    public function getDescripcio($num) {
        $sql = "SELECT descripcio FROM atraccio";
        $result = mysql_query($sql);
        return utf8_encode(mysql_result($result, $num, 0));
    }
    public function getDurada($num) {
        $sql = "SELECT durada FROM atraccio";
        $result = mysql_query($sql);
        return mysql_result($result, $num, 0);
    }
    public function getPreu($num) {
        $sql = "SELECT preu FROM atraccio";
        $result = mysql_query($sql);
        return mysql_result($result, $num, 0);
    }
    public function getIdEstat($num) {
        $sql = "SELECT estat FROM atraccio";
        $result = mysql_query($sql);
        return mysql_result($result, $num, 0);
    }
    public function getPuntuacio($num) {
        $sql = "SELECT puntuacio FROM atraccio";
        $result = mysql_query($sql);
        return mysql_result($result, $num, 0);
    }
    public function getIdDesti($num) {
        $sql = "SELECT desti FROM atraccio";
        $result = mysql_query($sql);
        return mysql_result($result, $num, 0);
    }
    public function getIdPromocio($num) {
        $sql = "SELECT id, promocio FROM atraccio ORDER BY 1";
        //echo $sql;
        $result = mysql_query($sql);
        return mysql_result($result, $num, 1);
    }
    public function getImatge($num) {
        $sql = "SELECT imatge FROM atraccio";
        $result = mysql_query($sql);
        return mysql_result($result, $num, 0);
    }
    public function getIdTipusAtraccio($num) {
        $sql = "SELECT tipus_atraccio FROM atraccio";
        $result = mysql_query($sql);
        return mysql_result($result, $num, 0);
    }
    public function getNumAtraccions() {
        $sql = "SELECT count(*) FROM atraccio";
        $result = mysql_query($sql);
        return mysql_result($result, 0);
    }
    
    public function delete($id){
        $sql = "DELETE FROM atraccio WHERE id = $id";
        //echo $sql."  ";
        $result = mysql_query($sql);
        return $result;
    }
    public function update($id, $nom, $descr, $durada, $preu, $estat, $desti, $promocio, $imatge, $tipusAtraccio){
        $sql = "UPDATE atraccio SET nom = \"$nom\", descripcio = \"$descr\", durada = $durada, preu = $preu, estat = (SELECT id FROM estat WHERE tipus = \"$estat\"), desti = (SELECT id FROM deti WHERE nom = \"$desti\"), promocio = (SELECT id FROM promocio WHERE descripcio = \"$promocio\"), imatge = \"$imatge\", tipus_atraccio = (SELECT id FROM tipus_atraccio WHERE nom = \"$tipusAtraccio\")  WHERE id = $id";
        //echo $sql."  ";
        $result = mysql_query($sql);
        return $result;
    }
}

?>
