<?php

class SolicitudAmistat {
    
     public function getSolicitutByUser($id){
        $sql = "SELECT * FROM solicitud_amistat WHERE aceptada = 0 AND usuari_rep = ".$id;
        $result = mysql_query($sql);
        return $result;
    }
    
    public function getAmistadByUser($id){
        $sql = "SELECT * FROM solicitud_amistat WHERE aceptada = 1 AND usuari_rep = ".$id;
        $result = mysql_query($sql);
        return $result;
    }
    
        
     public function setRebutjarSolicitut($id){
        $sql = "UPDATE solicitud_amistat SET aceptada = 2 WHERE id = ".$id;
        mysql_query($sql);  
    }
    
}

?>
