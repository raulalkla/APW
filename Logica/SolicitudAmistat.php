<?php

class SolicitudAmistat {
    
     public function getSolicitutByUser($id){
        $sql = "SELECT * FROM solicitud_amistat WHERE usuari_rep = ".$id;
        $result = mysql_query($sql);
        return $result;
    }
    
}

?>
