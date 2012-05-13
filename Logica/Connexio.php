<meta content="text/html; charset=iso-8859-1" http-equiv=Content-Type>
<?php

class Connexio {
    
    private $usr;
    private $pwd;
    private $ip;
    
    public function __construct($usr,$pwd,$ip='localhost')  				  
    {
          $this->ip = $ip;
          $this->usr = $usr;
          $this->pwd = $pwd;
    }
    
    // Realitzem la connexio a la base de dades
    function connectar(){
        if( mysql_connect($this->ip,$this->usr,$this->pwd) ) return true;
	  return false;    
    }
    // Seleccionem la Base de dades
    function selectdb($bd)  
    {   
        if( mysql_select_db($bd) ) return true;
        return false;
    }
    // Consulta SQL
    function query($query) 
    { 
        $result = mysql_query($query); 
        if (!$result) { 
            echo 'Could not run query: ' . mysql_error(); 
            exit; 
        } 
        return $result;
    } 
}

?>
