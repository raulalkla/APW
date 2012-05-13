<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html>
<head>
<title>Social Travel</title>
<meta content="text/html; charset=iso-8859-1" http-equiv=Content-Type></meta>

<script type="text/javascript" src="js/jquery-1.4.3.min.js"></script> 
<script type="text/javascript" src="js/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="js/jquery.fancybox-1.3.4.pack.js"></script>

<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox-1.3.4.css" media="screen" />
<link rel="stylesheet" href="css/estil.css" type="text/css" media="screen" />
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
        
                
	});
</script>
</head>

<body>
<div id="cap_sup"> 	
	<div id="cont_suscripcion">
            <p> <a  class="iframes fancybox.iframe" href="registre.php">Registrate</a> | <a  class="iframes fancybox.iframe" href="login.php">Accede</a> </p>
		<p> 
			<form name="suscripcion">
			<input type="text" name="correo" value="Suscribe tu email..."/>
			</form>
                </p>
	</div>
</div>
<div id="contenedor"> 
    
    	<div id="sup"></div>
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
			
				<div id="atraccion"> 
				
					<div id="foto_atraccion"></div>
					<div id="descripcion_atraccion">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit.
					Ut in felis id sem eleifend faucibus in vitae odio.
					Lorem ipsum dolor sit amet...
					</div>
				</div>
				<div id="atraccion"> 
				
					<div id="foto_atraccion"></div>
					<div id="descripcion_atraccion">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit.
					Ut in felis id sem eleifend faucibus in vitae odio.
					Lorem ipsum dolor sit amet...
					</div>
				</div>
				<br/>
				<div id="atraccion"> 
				
					<div id="foto_atraccion"></div>
					<div id="descripcion_atraccion">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit.
					Ut in felis id sem eleifend faucibus in vitae odio.
					Lorem ipsum dolor sit amet...
					
				</div>
				</div>
							<div id="atraccion"> 
				
					<div id="foto_atraccion"></div>
					<div id="descripcion_atraccion">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit.
					Ut in felis id sem eleifend faucibus in vitae odio.
					Lorem ipsum dolor sit amet...
					
					</div>
				</div>
							
			</div>
		</div>
        <div id="peu"></div>
</div>
</body>
</html>
<?php
    echo "<pre>";
    print_r($_POST);
?>