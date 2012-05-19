<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
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
        <?php
      
        echo "<div id='botonsPerfil'><B> 
            <table border=0 id='tableBotones'>
                <tr>
                    <td> <a href='dades.php' class='iframes fancybox.iframe' id='misDatos'>Mis datos</a> </td>
                    <td> <a href='#' id='misCompras'>Historial compras</a> </td>
                    <td> <a href='#' id='misAmistades'>Mis amistades</a> </td>
                    <td> <a href='preferencies.php' class='iframes fancybox.iframe' id='misPreferencias'>Mis preferencias</a> </td>
                  
                </tr>
            </table></B>
            </div>";
        echo "<div id='contenedorPerfil'>Aci mostrarem les notificacions...</div>";
        ?>
    </body>
</html>
