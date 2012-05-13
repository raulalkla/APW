<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <script type="text/javascript">
	   $(document).ready(function() {
	   $("#misDatos").click(function(evento){ 
               $("#contenedorPerfil").load("misdatos.php"); 
           });
       });
	</script>
    </head>
    <body>
        <?php
      
        echo "<div id='botonsPerfil'><B> 
            <table border=0 id='tableBotones'>
                <tr>
                    <td> <a href='#' id='misDatos'>Mis datos</a> </td>
                    <td> <a href='#' id='misCompras'>Historial compras</a> </td>
                    <td> <a href='#' id='misAmistades'>Mis amistades</a> </td>
                  
                </tr>
            </table></B>
            </div>";
        echo "<div id='contenedorPerfil'></div>";
        ?>
    </body>
</html>
