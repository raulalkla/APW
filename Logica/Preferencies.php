<?php

class Preferencies {
    
    public function getPreferencies($idUsuari){
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
}

?>
