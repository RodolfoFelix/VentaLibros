<?php 
    include('../../conexion/conn_localhost.php');

    $id = $_GET['idUsuario'];
    $sql= "DELETE FROM usuario WHERE id=".$id;
    mysqli_query($conn_localhost, $sql) or trigger_error("Login query failed");

    header('Location: usuario.php')

?>