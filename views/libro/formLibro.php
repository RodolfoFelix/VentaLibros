<?php include("../../includes/header.php") ?>
<?php 
    session_start();
    $idUsuario = $_SESSION["userId"];
    if(isset($_POST["new"])){
        include("../../conexion/conn_localhost.php");
        $nombre = $_POST["nombre"];
        $autor = $_POST["autor"];
        $sinopsis = $_POST["sinopsis"];
        $genero = $_POST["genero"];
        $precio = $_POST["precio"];
        $time = time();
        $target_dir = "../../uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        //Rename File
        $target_file = $target_dir . $time ."." .$imageFileType;
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);

        $sql ="INSERT INTO libro(nombre,autor,sinopsis,genero,precio,imagen,idusuario,noventas) 
        VALUES('".$nombre."','".$autor."','".$sinopsis."','".$genero."',".$precio.",'".$target_file."',".$idUsuario.",0)";
        mysqli_query($conn_localhost, $sql) or trigger_error("Login query failed");

        header("Location:libro.php");


    }  
?>
<h2 class="text-center">Publicar Libro</h2>
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4 text-center">
        <form action="formLibro.php" method="POST" enctype="multipart/form-data">
            <label for="nombre" class="form-label">Nombre:</label>
            <input class="form-control" type="text"  name="nombre">
            <label for="autor" class="form-label">Autor:</label>
            <input class="form-control" type="text"  name="autor">
            <label class="form-label" for="sinopsis">Sinopsis:</label>
            <textarea class="form-control" type="text" name="sinopsis" style="height:50px;"></textarea>
            <label for="genero" class="form-label">Genero:</label>
            <input class="form-control" type="text" name="genero">
            <label for="precio" class="form-label">Precio:</label>
            <input class="form-control" type="text" name="precio">
            <br>
            <label for="formFile" class="form-label">Imagen de portada:</label>
            <input class="form-control" type="file" id="formFile" name="fileToUpload">
            <br>
            <br>    
            <input class="btn btn-primary" type="submit" value="Guardar" name="new">
            <a href="libro.php" class="btn btn-secondary">Cancelar</a>
        </form>        
    </div>
    <div class="col-md-4"></div>
</div>

<?php include("../../includes/footer.php") ?>