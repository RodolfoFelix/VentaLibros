<?php
// Inicializamos la sesion o la retomamos
if(!isset($_SESSION)) {
  session_start();
  // Protegemos el documento para que solamente los usuarios que HAN INICIADO sesión puedan visualizarlo
  if(!isset($_SESSION['userId'])) header('Location: login.php?auth=false');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogo</title>
</head>
<body>
    <?php
    if($_SESSION['userPermiso'] != 2){
        echo '<div id="controlPanel">';
        echo '<a href="views/usuario/index.php"></a>';
        echo '<a href="views/venta/index.php?id="'+$_SESSION['userid']+'></a>';
        echo '<a href="views/libro/index.php?id="'+$_SESSION['userId']+'></a>';
        echo '<a href="clases/topmes.php">'
        echo '</div>';
    }
    ?>
    <div id="header">
        <a href="logout.php">Cerrar Sesión</a>
        <div id="buscador">
            <label for="texto">Buscar:</label>
            <input type="text" name="texto">
            <input type="submit" value="Buscar" name="buscar">  
        </div>
        <button>Top Ventas del Mes</button>
    </div>
    <br>
    <br>
    <div id="contenido">
        Aqui van impresos los libros :3
    </div>
    <div id="footer">
        <button>Carrito</button>
        <div id=¨brandingLogo¨></div>
    </div>       
</body>
</html>