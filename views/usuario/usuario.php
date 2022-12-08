<?php 
    include('../../includes/header.php');
    include('../../conexion/conn_localhost.php');
    session_start();

    function getPermiso($id){
        include('../../conexion/conn_localhost.php');
        $sqlPermiso = "SELECT * FROM permiso WHERE id=".$id;
        $result = mysqli_query($conn_localhost, $sqlPermiso) or trigger_error("Login query failed");
        $row = mysqli_fetch_assoc($result);
        $permiso = $row['tipo'];
        return $permiso;

    }

    $sql = "SELECT * FROM usuario";
    $usuarios = mysqli_query($conn_localhost, $sql) or trigger_error("Login query failed");

?>
<div class="container-fluid">
    <div class="row text-center">
        <h3> Lista de Usuarios</h3>
    </div>
    <br>
    <br>
    <div class="row">
        <div class="col-md-4">
        <a href="../libro/catalogo.php" class="btn btn-secondary">Regresar a Catalogo</a>
        </div>
        <div class="col-md-4">
        <a href="form.php" class="btn btn-primary">Nuevo Usuario</a>
        </div>
    </div>
    <br>
    <br>
    <br>
    <div class="row">
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Permiso</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
            <?php while($usuario = mysqli_fetch_array($usuarios)):?>
                    <tr>
                        <td><?php echo $usuario['nombre'] ?></td>
                        <td><?php echo $usuario['email'] ?></td>
                        <td><?php echo getPermiso($usuario['permiso']) ?></td>
                        <td>
                            <a href="form.php?idUsuario=<?php echo $usuario['id'] ?>" class="btn btn-warning">Editar</a>
                            <?php if($_SESSION['userId'] !== $usuario['id']){?>
                            <a href="delete.php?idUsuario=<?php echo $usuario['id'] ?>" class="btn btn-danger">Eliminar</a>
                            <?php }?>
                        </td>                     
                    </tr>
            <?php endwhile?>
            </tbody>
        </table>
    </div>
</div>

<?php include('../../includes/footer.php');?>