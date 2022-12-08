<?php
    include('../../conexion/conn_localhost.php');
    $id = $_GET["idLibro"];
    $sql = "DELETE FROM libro WHERE id=".$id;
    mysqli_query($conn_localhost, $sql) or trigger_error("Login query failed");

    header("Location: libro.php");

?>