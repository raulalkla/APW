<?php

class SolicitudAmistat {
    
     public function getSolicitutByUser($id){
        $sql = "SELECT * FROM solicitud_amistat WHERE aceptada = 0 AND usuari_rep = ".$id;
        $result = mysql_query($sql);
        return $result;
    }
    
    public function getAmistadByUser($id){
        $sql = "SELECT * FROM solicitud_amistat WHERE aceptada = 1 AND (usuari_rep = ".$id." OR usuari_envia = ".$id.")";
        $result = mysql_query($sql);
        return $result;
    }
    public function getAmistadRechazadaByUser($id){
        $sql = "SELECT * FROM solicitud_amistat WHERE aceptada = 2 AND usuari_rep = ".$id;
        $result = mysql_query($sql);
        return $result;
    }
    public function setRebutjarSolicitut($id){
        $sql = "UPDATE solicitud_amistat SET aceptada = 2 WHERE id = ".$id;
        mysql_query($sql);  
    }
    public function setAcceptarSolicitut($id){
        $sql = "UPDATE solicitud_amistat SET aceptada = 1 WHERE id = ".$id;
        mysql_query($sql);  
    }
    public function delAmistad($id){
        $sql = "DELETE FROM solicitud_amistat WHERE id = ".$id;
        mysql_query($sql);  
    }
    public function setSolicitudAmistat($idEnvia,$idRep,$comentari){
        $sql = "INSERT INTO solicitud_amistat(usuari_envia,usuari_rep,comentari) VALUES(".$idEnvia.",".$idRep.",'".$comentari."')";
        //echo $sql;
        mysql_query($sql);
        
    }
    
}

?>
