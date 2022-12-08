<?php  include('../../includes/header.php')?>

<?php
    include('../../conexion/conn_localhost.php');
    session_start();
    
    
    if (isset($_POST['new'])){
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $permiso = $_POST['permiso'];
        $sql= "INSERT INTO usuario(nombre, email, password, permiso) VALUES('".$nombre."','".$email."','".$password."',".$permiso.")";
        mysqli_query($conn_localhost, $sql) or trigger_error("Login query failed");
        header('Location: usuario.php');
    }else if(isset($_POST['update'])){
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $permiso = $_POST['permiso'];
        $id= $_GET['idUsuario'];
        $sql = "UPDATE usuario SET nombre = '".$nombre."', email = '".$email."', password= '".$password."', permiso =".$permiso."  WHERE id=".$id;
        mysqli_query($conn_localhost, $sql) or trigger_error("Login query failed");
        header('Location: usuario.php');
    }
    
 ?>

<?php if(isset($_GET['idUsuario'])){?>
        <?php
            $id = $_GET['idUsuario'];
            $sqlSelect = 'SELECT * FROM usuario WHERE id='.$id;
            $result = mysqli_query($conn_localhost, $sqlSelect) or trigger_error("Login query failed");
            $usuario = mysqli_fetch_assoc($result); 
        ?>
        <h2 class="text-center">Editar Usuario</h2>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 text-center">
                <form action="form.php?idUsuario=<?php echo $_GET['idUsuario'] ?>" method="POST">
                <label class="form-label" for="nombre">Nombre:</label>
                <input class="form-control" type="text" name="nombre" value="<?php  echo $usuario['nombre']?>">
                <br>
                <br>    
                <label class="form-label" for="email">Email:</label>
                <input class="form-control" type="text" name="email" value="<?php  echo $usuario['email']?>">
                <br>
                <br>
                <label class="form-label" for="password">Password:</label>
                <input class="form-control" type="password" name="password" value="<?php  echo $usuario['password']?>">
                <br>
                <br>
                <label class="form-label" for="email">Tipo de Permiso:</label>
                <select name="permiso" id="permiso" class="form-control">
                    <option value="">-- Por favor seleccione un permiso --</option>
                    <?php if($usuario['permiso'] == 1){?>
                        <option value="1" selected>Administrador</option>
                        <option value="2">Vendedor</option>
                        <option value="3">Cliente</option>
                    <?php }?>
                    <?php if($usuario['permiso'] == 2){?>
                        <?php if($_SESSION['userPermiso'] == 1){?>
                        <option value="1">Administrador</option>
                        <?php }?>
                        <option value="2" selected>Vendedor</option>
                        <option value="3">Cliente</option>
                    <?php }?>
                    <?php if($usuario['permiso'] == 3){?>
                        <?php if($_SESSION['userPermiso'] == 1){?>
                        <option value="1">Administrador</option>
                        <?php }?>
                        <option value="2">Vendedor</option>
                        <option value="3" selected>Cliente</option>
                    <?php }?>
                </select>
                <br>
                <br>
                <input class="btn btn-primary" type="submit" value="Guardar" name="update">
                <a href="usuario.php" class="btn btn-secondary">Cancelar</a>
                </form>        
            </div>
            <div class="col-md-4"></div>
        </div>
<?php }else{?>
    <h2 class="text-center">Nuevo Usuario</h2>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 text-center">
                <form action="form.php" method="POST">
                <label class="form-label" for="nombre">Nombre:</label>
                <input class="form-control" type="text" name="nombre">
                <br>
                <br>    
                <label class="form-label" for="email">Email:</label>
                <input class="form-control" type="text" name="email">
                <br>
                <br>
                <label class="form-label" for="password">Password:</label>
                <input class="form-control" type="password" name="password">
                <br>
                <br>
                <label class="form-label" for="email">Tipo de Permiso:</label>
                <select name="permiso" id="permiso" class="form-control">
                    <option value="">-- Por favor seleccione un permiso --</option>
                    <?php if($_SESSION['userPermiso'] == 1){?>
                    <option value="1">Administrador</option>
                    <?php }?>
                    <option value="2">Vendedor</option>
                    <option value="3">Cliente</option>
                </select>
                <br>
                <br>
                <input class="btn btn-primary" type="submit" value="Guardar" name="new">
                <?php if(!isset($_GET['fromLogin'])){?>
                    <a href="usuario.php" class="btn btn-secondary">Cancelar</a>
                <?php } else {?>
                    <a href="../../index.php" class="btn btn-secondary">Cancelar</a>
                <?php }?>
                </form>        
            </div>
            <div class="col-md-4"></div>
        </div>
<?php }?>
<?php  include('../../includes/footer.php')?>