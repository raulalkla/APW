<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Social Travel</title>
<link rel="stylesheet" href="css/estil.css" type="text/css" media="screen">
</head>

<body>
<div id="cap_sup"> 	
	<div id="cont_suscripcion">
		<p> Registrate | Accede </p>
		<p> 
			<form name="suscripcion">
			<input type="text name="correo" value="Suscribe tu email..."/>
			</form>
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
