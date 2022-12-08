<?php  include('../../includes/header.php')?>
<?php
    include('../../conexion/conn_localhost.php');
    session_start();
    if($_SESSION["userPermiso"] == 1){
        $sql = "SELECT * FROM libro";
    }else{
        $sql = "SELECT * FROM libro WHERE idusuario=".$_SESSION["userId"] ;
    }
    $libros = mysqli_query($conn_localhost, $sql) or trigger_error("Login query failed");
?>
<div class="container-fluid text-center">
    <div class="row text-center">
        <h3> Lista de Libros</h3>
    </div>
    <br>
    <br>
    <br>
    <div class="row">
        <div class="col-md-4">
            <a href="../libro/catalogo.php" class="btn btn-secondary">Regresar a Catalogo</a>
            </div>
            <div class="col-md-4">
            <a href="formLibro.php" class="btn btn-primary">Publicar Libro</a>
        </div>
    </div>
    <br>
    <br>
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Autor</th>
                <th>Sinopsis</th>
                <th>Genero</th>
                <th>Precio</th>
                <th>Copias Vendidas</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php while($libro = mysqli_fetch_array($libros)):?>
                    <tr>
                        <td><?php echo $libro["nombre"] ?></td>
                        <td><?php echo $libro["autor"] ?></td>
                        <td><?php echo $libro["sinopsis"] ?></td>
                        <td><?php echo $libro["genero"] ?></td>
                        <td><?php echo $libro["precio"] ?></td>
                        <td><?php echo $libro["noventas"] ?></td>
                        <td>
                            <a href="editPrecioLibro.php?idLibro=<?php echo $libro["id"] ?>" class="btn btn-warning">Editar Precio</a>
                            <a href="deleteLibro.php?idLibro=<?php echo $libro["id"] ?>" class="btn btn-danger">Eliminar</a>
                        </td>                     
                    </tr>
            <?php endwhile?>
        </tbody>
    </table>
</div>
<?php  include('../../includes/footer.php')?>