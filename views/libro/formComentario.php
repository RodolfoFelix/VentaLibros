<?php  include('../../includes/header.php')?>

<?php
    include('../../conexion/conn_localhost.php');
    session_start();
    $idLibro = $_GET["idLibro"];
    
    
    if (isset($_POST["new"])){        
        $idUsuario = $_SESSION["userId"];
        $comentario = $_POST["comentario"];
        $sql= "INSERT INTO comentario(idusuario, idlibro, comentario) VALUES(".$idUsuario.",".$idLibro.",'".$comentario."')";
        mysqli_query($conn_localhost, $sql) or trigger_error("Login query failed");
        header("Location: comentario.php?idLibro=$idLibro");
    }else if(isset($_POST["update"])){
        $comentario = $_POST['comentario'];
        $id= $_GET['idComentario'];
        $sql = "UPDATE comentario SET comentario = '".$comentario."'  WHERE id=".$id;
        mysqli_query($conn_localhost, $sql) or trigger_error("Login query failed");
        header("Location: comentario.php?idLibro=$idLibro");
    }
    
 ?>

<?php if(isset($_GET['idComentario'])){?>
        <?php
            $id = $_GET['idComentario'];
            $sqlSelect = 'SELECT * FROM comentario WHERE id='.$id;
            $result = mysqli_query($conn_localhost, $sqlSelect) or trigger_error("Login query failed");
            $comentario = mysqli_fetch_assoc($result); 
        ?>
        <h2 class="text-center">Editar Comentario</h2>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 text-center">
                <form action="formComentario.php?idLibro=<?php echo $idLibro ?>&& idComentario=<?php echo $comentario["id"]?>" method="POST">
                <label class="form-label" for="comentario">Comentario:</label>
                <textarea class="form-control" type="text" name="comentario" style="height:100px;"><?php  echo $comentario["comentario"]?></textarea>
                <br>
                <br>    
                <input class="btn btn-primary" type="submit" value="Guardar" name="update">
                <a href="comentario.php?idLibro=<?php echo $idLibro?>" class="btn btn-secondary">Cancelar</a>
                </form>        
            </div>
            <div class="col-md-4"></div>
        </div>
<?php }else{?>
    <h2 class="text-center">Nuevo Comentario</h2>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 text-center">
                <form action="formComentario.php?idLibro=<?php echo $idLibro ?>" method="POST">
                <label class="form-label" for="comentario">Comentario:</label>
                <textarea class="form-control" type="text" name="comentario" style="height:100px;"></textarea>
                <br>
                <br>    
                <input class="btn btn-primary" type="submit" value="Guardar" name="new">
                <a href="comentario.php?idLibro=<?php echo $idLibro ?>" class="btn btn-secondary">Cancelar</a>
                </form>        
            </div>
            <div class="col-md-4"></div>
        </div>
<?php }?>
<?php  include('../../includes/footer.php')?>