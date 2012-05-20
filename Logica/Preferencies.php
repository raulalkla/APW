<?php

class Preferencies {
    
    public function getPreferenciesUsuari($idUsuari){
        $sql = "SELECT * FROM preferencies p JOIN tipus_atraccio ta ON p.tipus_atraccio = ta.id AND p.usuari = ".$idUsuari;
        $result = mysql_query($sql);
        return $result;
    }
    public function getNomPrefByID($idPreferencia){
               
        $sql = "SELECT nom FROM tipus_atraccio WHERE id = ".$idPreferencia;
        $result = mysql_query($sql);
        return $result;
    }
    public function delPreferenciaUsuari($idPreferencia,$idUsuari)
    {
        $sql = "DELETE FROM preferencies WHERE usuari = ".$idUsuari." AND tipus_atraccio = ".$idPreferencia.";";
        $result = mysql_query($sql);
        return $result;
    }
    public function setPreferenciaUsuari($idPreferencia,$idUsuari)
    {
        $sql = "INSERT INTO preferencies(usuari,tipus_atraccio) VALUES(".$idUsuari.",".$idPreferencia.");";
        $result = mysql_query($sql);
        return $result;
    }
}

?>
