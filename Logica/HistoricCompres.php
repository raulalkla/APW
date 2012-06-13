<?php

class HistoricCompres {
   
    public function getHistoricCompres($id){
        $sql = "SELECT * FROM  historic_compres WHERE usuari = ".$id;
        $result = mysql_query($sql);
        return $result;
    }
 
}

?>
