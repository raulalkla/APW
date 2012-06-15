<?php
session_start();
require_once '../Logica/Connexio.php';
require_once '../Logica/Atraccions.php';
    $Connexio = new Connexio();
    $Connexio->connectar();
    $Connexio->selectdb("socialtravel");
    
if($_GET["idEliminar"]){

    for($i = 0; $i < sizeof($_SESSION["carro"]) ; $i++){

        if($_SESSION["carro"][$i]["idAtraccio"] == $_GET["idEliminar"]){
            unset($_SESSION["carro"][$i]);
           
        }
    }      
}
$_SESSION['carro']= @array_values($_SESSION['carro']);
   
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <script type="text/javascript">
            $(document).ready(function() {
//                $("#borraTuplaCompra").click(function(evento){
//                    $("#divSistella").load("cistella.php"); 
//                });
                $("#comprar").click(function(evento){
                    $("#contenedor_atraccion").load("procesoCompra.php"); 
                });
              });
            $('a.idEliminar').click(function(){
                var txt=$(this).attr("rel");
                $("#divCistella").load("cistella.php?idEliminar="+txt); 
            });   
           
        </script>
        <style type="text/css">
            table.hovertable {
                    font-family: verdana,arial,sans-serif;
                    font-size:11px;
                    color:#333333;
                    border-width: 1px;
                    border-color: #999999;
                    border-collapse: collapse;
            }
            table.hovertable th {
                    background-color:#c3dde0;
                    border-width: 1px;
                    padding: 8px;
                    border-style: solid;
                    border-color: #a9c6c9;
            }
            table.hovertable tr {
                    background-color:#d4e3e5;
            }
            table.hovertable td {
                    border-width: 1px;
                    padding: 8px;
                    border-style: solid;
                    border-color: #a9c6c9;
            }
        </style>
    </head>
    <body>
        <div id ="divCistella" >
            <?php if($_SESSION["carro"]){ ?>
            <form method="GET">
                <table id="taulaSolAmistad" class="hovertable">
                    <tr>
                    <!--  <td><b>Numero</b></td> -->
                        <td><b>Nombre</b></td>
                        <td><b>Importe</b></td>
                        <td><b>Cantidad</b></td>
                        <td><b>Borrar</b></td>
                    </tr>
                    <?php
                    if($_SESSION["carro"]){
                        $numCompres = sizeof($_SESSION["carro"]);
                        for ($i = 0; $i < $numCompres; $i++){
                            echo "<tr onmouseover=\"this.style.backgroundColor='#ffff66';\" onmouseout=\"this.style.backgroundColor='#d4e3e5';\">";
                            //  echo "<td>". ($i+1) ."</td>";
                                echo "<td>".$_SESSION["carro"][$i]["nomAtraccio"]."</td>";
                                echo "<td>".$_SESSION["carro"][$i]["preu"]."</td>";
                                echo "<td> <input type='text' size=2 name='quant$i' value = '".$_SESSION["carro"][$i]["quantitat"]."'> </td>";
                                echo "<td style='text-align:center'><a class='idEliminar' href='#' rel='".$_SESSION["carro"][$i]["idAtraccio"]."' OnClick=\"return confirm('Seguro que quieres eliminar?');\"><img src='img/drop.png'/></a></td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </table>
                Forma pago: 
                <select name="formaPago">
                    <option>Tarjeta</option>
                    <option>Paypal</option>
                    <option>Móvil</option>
                </select>
                Numero:
                <input type="text" name="numPago" >
                <br>
                <input id="comprar" type="submit" name="comprar" value="Comprar" style="position: right">
            </form>
            <?php 
            }
            else{
                echo "<h3>No hay ninguna atracción en la cesta!</h3>";
            }
            ?>
        </div>
    </body>
</html>
<?php
    
  
?>