<?php


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
    
    public function insertLinea($preu, $cantitat, $atraccio, $idUsuari){
        $sql = "SET AUTOCOMMIT=0;";
        mysql_query($sql);
        $sql = "BEGIN;";
        mysql_query($sql);
        $sql = "INSERT INTO linies_comanda (preu, cantitat, atraccio) values( ".$preu.", ".$cantitat.", ".$atraccio.")";
        mysql_query($sql);
//        echo $sql."<br>";
        $sql = "INSERT INTO historic_compres (usuari, linia_comanda) values( ".$idUsuari.", (SELECT MAX(id) FROM linies_comanda WHERE preu=".$preu." AND cantitat=".$cantitat." AND atraccio=".$atraccio."))";
        $resul = mysql_query($sql);
//        echo $sql."<br>";
        if($resul){
            $sql = "COMMIT;";
            mysql_query($sql);
//            echo "Commit! <br>";
        }
        else{
            $sql = "ROLLBACK;";
            $resul = mysql_query($sql);
//            echo "Rollback<br>";
        }
        return $resul;
    }
    
}

?>
