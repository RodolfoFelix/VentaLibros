<?php include ('../../includes/header.php'); ?>
<?php
    include('../../conexion/conn_localhost.php');
    session_start();
    $idUsuario = $_SESSION["userId"];
    $idLibro = $_GET["idLibro"];

    $sqlSelectLibro = "SELECT * FROM libro WHERE id=".$idLibro;
    $result = mysqli_query($conn_localhost, $sqlSelectLibro) or trigger_error("Login query failed");
    $libro = mysqli_fetch_array($result);


    $sqlSelectComentario = "SELECT * FROM comentario WHERE idlibro =".$idLibro;
    $comentarios = mysqli_query($conn_localhost, $sqlSelectComentario) or trigger_error("Login query failed"); 

    function getNombreUsuario($id){
        include('../../conexion/conn_localhost.php');
        $sqlUsuario = "SELECT * FROM usuario WHERE id=".$id;
        $result = mysqli_query($conn_localhost, $sqlUsuario) or trigger_error("Login query failed");
        $row = mysqli_fetch_assoc($result);
        $nombre = $row['nombre'];
        return $nombre;

    }
?>
<div class="container-fluid text-center">
    <div class="row text-center">
        <h3> Lista de Comentarios</h3>
    </div>
    <br>
    <br>
    <div class="col-md-4 libro mx-auto row">
        <div class="text-center" style="width: 18rem;">
                <img style="height:300px;" src="<?php echo $libro["imagen"]?>">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $libro['nombre'] ?></h5>
                    <p class="card-text"><?php echo $libro['autor'] ?></p>
                    <p class="card-text"><?php echo $libro['sinopsis'] ?></p>
                    <p class="card-text">Copias Vendidas: <?php echo $libro['noventas'] ?></p>
                    <a href="../../views/venta/addToCart.php?idLibro=<?php echo $libro['idlibro'] ?>" class="btn btn-success">Agregar a Carrito</a><br><br>
                </div>
        </div>
    </div>    
    <br>
    <br>
    <div class="row">
        <div class="col-md-4">
        <a href="../libro/catalogo.php" class="btn btn-secondary">Regresar a Catalogo</a>
        </div>
        <div class="col-md-4">
        <a href="formComentario.php?idLibro=<?php echo $idLibro ?>" class="btn btn-primary">Agregar Comentario</a>
        </div>
    </div>
    <br>
    <br>
    <br>
    <div class="row">
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>Autor del Comentario</th>
                    <th>Comentario</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
            <?php while($comentario = mysqli_fetch_array($comentarios)):?>
                    <tr>
                        <td><?php echo getNombreUsuario($comentario["idusuario"]) ?></td>
                        <td><?php echo $comentario["comentario"] ?></td>
                        <td>
                            <?php if($idUsuario == $comentario["idusuario"]){?>
                            <a href="formComentario.php?idComentario=<?php echo $comentario["id"]?>&&idLibro=<?php echo $comentario["idlibro"] ?>" class="btn btn-warning">Editar</a>
                            <?php }?>
                        </td>                     
                    </tr>
            <?php endwhile?>
            </tbody>
        </table>
    </div>
</div>
<?php include ('../../includes/footer.php'); ?>