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
        return mysql_result($result, $num, 0);
    }
    public function getDescripcio($num) {
        $sql = "SELECT id, descripcio FROM atraccio ORDER BY 1";
        $result = mysql_query($sql);
        return mysql_result($result, $num, 1);
    }
    public function getDurada($num) {
        $sql = "SELECT id, durada FROM atraccio ORDER BY 1";
        $result = mysql_query($sql);
        return mysql_result($result, $num, 1);
    }
    public function getPreu($num) {
        $sql = "SELECT id, preu FROM atraccio ORDER BY 1";
        $result = mysql_query($sql);
        return mysql_result($result, $num, 1);
    }
    public function getIdEstat($num) {
        $sql = "SELECT id, estat FROM atraccio ORDER BY 1";
        $result = mysql_query($sql);
        return mysql_result($result, $num, 1);
    }
    public function getPuntuacio($num) {
        $sql = "SELECT id, puntuacio FROM atraccio ORDER BY 1";
        $result = mysql_query($sql);
        return mysql_result($result, $num, 1);
    }
    public function getIdAtraccio($num) {
        $sql = "SELECT id FROM atraccio ORDER BY 1";
        $result = mysql_query($sql);
        return mysql_result($result, $num, 0);
    }
    public function getIdDesti($num) {
        $sql = "SELECT id, desti FROM atraccio ORDER BY 1";
        $result = mysql_query($sql);
        return mysql_result($result, $num, 1);
    }
    public function getIdPromocio($num) {
        $sql = "SELECT id, promocio FROM atraccio ORDER BY 1";
        //echo $sql;
        $result = mysql_query($sql);
        return mysql_result($result, $num, 1);
    }
    public function getImatge($num) {
        $sql = "SELECT id, imatge FROM atraccio ORDER BY 1";
        $result = mysql_query($sql);
        return mysql_result($result, $num, 1);
    }
    public function getIdTipusAtraccio($num) {
        $sql = "SELECT id, tipus_atraccio FROM atraccio ORDER BY 1";
        $result = mysql_query($sql);
        return mysql_result($result, $num, 1);
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
    public function update($id, $nom, $descr, $durada, $preu, $estat, $desti, $promocio, $tipusAtraccio, $imatge){
        if($imatge != "\"null\"")
            $sql = "UPDATE atraccio SET nom = \"$nom\", descripcio = \"$descr\", durada = $durada, preu = $preu, estat = (SELECT id FROM estat WHERE tipus = \"$estat\"), desti = (SELECT id FROM desti WHERE nom = \"$desti\"), promocio = (SELECT id FROM promocio WHERE descripcio = \"$promocio\"), tipus_atraccio = (SELECT id FROM tipus_atraccio WHERE nom = \"$tipusAtraccio\"), imatge = $imatge   WHERE id = $id";
        else
            $sql = "UPDATE atraccio SET nom = \"$nom\", descripcio = \"$descr\", durada = $durada, preu = $preu, estat = (SELECT id FROM estat WHERE tipus = \"$estat\"), desti = (SELECT id FROM desti WHERE nom = \"$desti\"), promocio = (SELECT id FROM promocio WHERE descripcio = \"$promocio\"), tipus_atraccio = (SELECT id FROM tipus_atraccio WHERE nom = \"$tipusAtraccio\")  WHERE id = $id";
        //echo $sql."  ";
        $result = mysql_query($sql);
        return $result;
    }
    public function insert($nom, $descr, $durada, $preu, $estat, $desti, $promocio, $tipusAtraccio, $imatge) {
        $sql = "INSERT INTO `atraccio`(`nom`, `descripcio`, `durada`, `preu`, `estat`, `desti`, `promocio`, `tipus_atraccio`, `imatge`) VALUES (\"$nom\", \"$descr\", $durada, $preu, (SELECT id FROM estat WHERE tipus = \"$estat\"), (SELECT id FROM desti WHERE nom = \"$desti\"), (SELECT id FROM promocio WHERE descripcio = \"$promocio\"), (SELECT id FROM tipus_atraccio WHERE nom = \"$tipusAtraccio\"), $imatge)";
        echo $sql;
        $result = mysql_query($sql);
        return $result;
    }
}

?>
