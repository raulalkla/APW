<!DOCTYPE html>
<?php
    session_start();
    require_once '../../Logica/Connexio.php';
    require_once '../../Logica/Desti.php';
    require_once '../../Logica/Estat.php';
    require_once '../../Logica/Atraccions.php';
    require_once '../../Logica/TipusAtraccions.php';
    require_once '../../Logica/Promocio.php';
    
    $con = new Connexio();
    
    if(!$_SESSION[usuari]){
        header("Location: index.php");
    }
    
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
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
                    closeEffect	: 'none',
                    onClosed: function() { window.location.href = "administrador.php"; }
                });
                $('a.idEliminar').click(function(){
                    var txt=$(this).attr("rel");
                    $("#contenedorAdmin").load("gestionAtraccion.php?idEliminar="+txt); 
                });
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
                    margin-left: 3%;
                    width: 875px;
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
                    text-align: center;
            }
        </style>
    </head>
    <body>
        <div id="contenedor">
        <?php 
            $atraccio = new Atraccions();
            $estat = new Estat();
            $tAtrac = new TipusAtraccions();
            $desti = new Desti();
            $promocio = new Promocio();
            
            if($_GET['idEliminar']){
                if($atraccio->delete($_GET['idEliminar'])){
                    echo "<h2>Atracción eliminada!</h2>";
                }
                else{
                    echo "<h2>Error! Atracción no eliminada!</h2>";
                }
            }
        ?>
            <form id="form" method="POST">
            <table class="hovertable">
                <tr>
                    <td><b> Nombre </b></td>
                    <td><b> Descripcion </b></td>
                    <td><b> Duracion </b></td>
                    <td><b> Precio </b></td>
                    <td><b> Estado </b></td>
                    <td><b> Puntuación </b></td>
                    <td><b> Destino </b></td>
                    <td><b> Promocion </b></td>
                    <td><b> Tipo </b></td>
                    <td><b> Editar </b></td>
                    <td><b> Eliminar </b></td>
                </tr>
                <?php
                for($i = 0; $i < $atraccio->getNumAtraccions(); $i++){
                    echo "<tr onmouseover=\"this.style.backgroundColor='#ffff66';\" onmouseout=\"this.style.backgroundColor='#d4e3e5';\">";
                        echo "<td>".$atraccio->getNom($i)."</td>";
                        echo "<td>".substr($atraccio->getDescripcio($i), 0, 25)." ...</td>";
                        echo "<td>".$atraccio->getDurada($i)." días</td>";
                        echo "<td>".$atraccio->getPreu($i)."</td>";
                        echo "<td>".$estat->getTipusEstatByID($atraccio->getIdEstat($i))."</td>";
                        echo "<td>".$atraccio->getPuntuacio($i)."</td>";
                        echo "<td>".$desti->getNomByID($atraccio->getIdDesti($i))."</td>";
                        echo "<td> ".@$promocio->getDescripcioByID($atraccio->getIdPromocio($i))."</td>";
                        echo "<td>".$tAtrac->getNomByID($atraccio->getIdTipusAtraccio($i))."</td>";
                        echo "<td> <a href='modificarAtraccion.php?id=$i' class='iframes fancybox.iframe'> <img src='../img/edit.png' height=15px /> </a> </td>";
                        echo "<td> <a class='idEliminar' href='#' rel='".$desti->getIdDesti($i)."' OnClick=\"return confirm('Segur que vols eliminar?');\"> <img src='../img/drop.png' /> </a> </td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </form>
        <a href='anadirAtraccion.php' class="iframes fancybox.iframe"> <img src='../img/add.png' height=25px /> </a>
        </div>
    </body>
</html>

