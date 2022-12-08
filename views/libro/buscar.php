<?php
    include("conexion/conn_localhost.php");
    session_start()
    $sql = "SELECT * FROM libro WHERE idusuario = ".$_SESSION["userId"];
    $result = mysqli_query($conn_localhost, $sql) or trigger_error("Login query failed");
    $libros = mysqli_fetch_array($result);    
    header("Location:")
    

?>