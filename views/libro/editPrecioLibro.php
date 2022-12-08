<?php include("../../includes/header.php") ?>
<?php 
    include("../../conexion/conn_localhost.php"); 
    $id = $_GET["idLibro"];
    if(isset($_POST["newPrice"])){
        $precio = $_POST["precio"];
        $sql = "UPDATE libro SET precio =".$precio." WHERE id=".$id;
        mysqli_query($conn_localhost, $sql) or trigger_error("Login query failed");
        header("Location: libro.php");
    }
?>
<div class="container-fluid">
    <h4 class="text-center">Actualizando Precio</h4>
    <div class="col-md-4">
        <form action="editPrecioLibro.php?idLibro=<?php echo $id?>" method="POST">
            <label for="precio">Por favor ingrese el nuevo precio:</label>
            <input class="form-control" type="text" name="precio">
            <br>
            <br>
            <input class="btn btn-primary" type="submit" value="Guardar" name="newPrice">
            <a href="libro.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
<?php include("../../includes/footer.php") ?>
