<?php
session_start();
require_once '../Logica/Connexio.php';
require_once '../Logica/Usuaris.php';
require_once '../Logica/Atraccions.php';

  $Connexio = new Connexio('pau','pau','');
  $Connexio->connectar();
  $Connexio->selectdb("socialtravel");
  
if(@$_GET[logout])    session_unset();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<title>Social Travel</title>

<script type="text/javascript" src="js/jquery-1.4.3.min.js"></script> 
<script type="text/javascript" src="js/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="js/jquery.fancybox-1.3.4.pack.js"></script>

<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox-1.3.4.css" media="screen" />
<link rel="stylesheet" href="css/estil.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/style.css" type="text/css" charset="utf-8"/>
<script type="text/javascript">
	$(document).ready(function() {
            $(".iframes").fancybox({
		maxWidth	: 800,
		maxHeight	: 600,
		fitToView	: false,
		width		: '70%',
		height		: '70%',
		autoSize	: false,
		closeClick	: false,
		openEffect	: 'none',
		closeEffect	: 'none'
                });
          
           
	   $("#miPerfil").click(function(evento){ 
               $("#contenedor_atraccion").load("perfil.php"); 
           });
           
           
          
	});
</script>
</head>
<body>

     

<div id="cap_sup"> 	
        
    	<div id="cont_suscripcion">
          
                <?php
                    if(!@$_SESSION[usuario]){
                        echo '<p><a class="iframes fancybox.iframe" href="registre.php">Registrate</a> | ';
                        echo '<a  class="iframes fancybox.iframe" href="login.php">Accede</a> </p>';
                        echo "<form method='POST'>";
                        echo "<input type='text' name='suscripcion' value='Suscribe tu email...'/>";
                        echo "</form>";
                    }else
                    {
                        echo "<p><a id='miPerfil' href='#'>Mi perfil </a>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <a href='?logout=1' style='margin-top:15px'><img src='img/logout.gif' width=20px; height=20px/></a></p>";
               
                        echo "<p style='margin-top:-10px'>
                            Cesta(0)
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <img src='img/cesta.png' width=20px; height=20px/>
                            </p>";
                    }
                ?>
	</div>
</div>
<div id="contenedor"> 
    
    	<div id="sup">
            <div id="iconosMenu" style="float:left; margin-left:60px; margin-top: 30px">
                <a href="index.php"><img src="img/icon-home.png" /> </a>
            </div>
        </div>
        <div id="cos">
            
		<div id="dMenu"> 
	
			<div id="recomendaciones">
			
				<?php 
					for($x = 0; $x < 5; $x++){			
                                            echo "<div id='recomendacion'>Recomendacion $x	</div>";
					} 
				?>
		
			</div>
		</div>
                    <div id="contenedor_atraccion">
                    <?php
                        $atraccions = new Atraccions();
                        $result = $atraccions->getAtraccions();
                        for ($i = 0; $i < mysql_num_rows($result); $i++ ){
                            echo '<a class="iframes fancybox.iframe" href="atraccions.php?id='.mysql_result($result,$i,0).'">';
                            echo '<div id="atraccion">';
                            echo '  <div id="titulo_atraccion"><b>'.utf8_encode(mysql_result($result,$i,1)).'</b></div>';
                            echo '	<div id="foto_atraccion"><img width="70px" height="70px" src="'.mysql_result($result,$i,9).'"/></div>';
                            echo '	<div id="descripcion_atraccion">'.utf8_encode(substr(mysql_result($result,$i,2),0,90)).'...</div>';
                            echo '</a></div>';

                        }
                    ?>

                        </div>
		</div>
        <div id="peu"></div>
</div>
</body>
</html>
<?php
    echo "<pre>";
    print_r($_SESSION);
?>