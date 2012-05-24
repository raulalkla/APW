<?php

/**
 * Description of LiniaPedido
 *
 * @author tcp02
 */
class LiniaPedido {
    
    public function getLiniesPedido($idHistoric){
        $sql = "SELECT l.* FROM linies_comenda l, hitoric_compres h WHERE l.id = h.historic_comanda AND h.id = ".$idHistoric;
        $result = mysql_query($sql);
        return $result;
    }
    public function getLiniaPedidoById($idHistoric, $id){
        $sql = "SELECT l.* FROM linies_comenda l, hitoric_compres h WHERE l.id = h.historic_comanda AND h.id = ".$idHistoric." AND l.id = ".$id;
        $result = mysql_query($sql);
        return $result;
    }
    
    public function insertLinea($preu, $cantitat, $atraccio){
        $sql = "INSERT INTO linies_comanda (preu, cantitat, atraccio) values( ".$preu.", ".$cantitat.", ".$atraccio.")";
        mysql_query($sql);
    }
    
}

?>
