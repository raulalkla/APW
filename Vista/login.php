<?php

    if($_POST){
    
        echo "dins";
    
    }else echo "fora";
    
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <script type="text/javascript">
	$(document).ready(function() {
              
            $("#form").bind("submit", function() { 
                $.fancybox.showActivity(); 
                $.ajax({ 
                        type    : "POST", 
                        cache   : false, 
                        url     : "login.php", 
                        data    : $(this).serializeArray(), 
                        success: function(data) { 
                                $.fancybox(data); 
                        } 
                }); 
                return false; 
            }); 
            $(".prova").fancybox({
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
        <form id="form" method="POST" style="text-align: right">
        Usuario: <input type="text" name="usuario"/>        <br />
        Password:<input type="password" name="password" />  <br />
        <input type="submit" name="login" value="Enviar"/>
        </form>
    </body>
</html>
