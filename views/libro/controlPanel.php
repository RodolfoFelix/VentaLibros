<?php include("../../includes/header.php")?>
<?php
    session_start();
    switch($_SESSION['userPermiso']){

        case 1 :
            echo '<div id="controlPanel" class="row">';
            echo '<div class="text-center">';
            echo '<a class="btn btn-danger" href="logout.php">Cerrar Sesión</a>';
            echo '<a class="btn btn-primary" style="margin-left:20px" href="views/usuario/index.php">Usuarios</a>';
            echo '<a class="btn btn-success" style="margin-left:20px" href="views/venta/index.php?id="'.$_SESSION['userId'].'>Ventas</a>';
            echo '<a class="btn btn-dark" style="margin-left:20px" href="views/libro/index.php?id="'.$_SESSION['userId'].'>Administrar Libros</a>';
            echo '<a class="btn btn-secondary" style="margin-left:20px" href="actualizarTopMes.php">Actualizar Top Ventas</a>';
            echo '</div>';
            echo '</div>';
            break;
        
        case 2:
            echo '<div id="controlPanel">';
            echo '<a class="btn btn-danger" href="logout.php">Cerrar Sesión</a>';
            echo '<a class="btn btn-primary" style="margin-left:20px" href="views/usuario/index.php">Usuarios</a>';
            echo '<a class="btn btn-success" style="margin-left:20px" href="views/venta/index.php?id="'.$_SESSION['userId'].'>Ventas</a>';
            echo '<a class="btn btn-dark" style="margin-left:20px" href="views/libro/index.php?id="'.$_SESSION['userId'].'>Administrar Libros</a>';
            echo '</div>';
            break;

        default:
            echo '<div id="controlPanel">';
            echo '<a class="btn btn-danger" href="logout.php">Cerrar Sesión</a>';
            echo '</div>';
            break;
            

    }
?>
<?php include("../../includes/footer.php")?>