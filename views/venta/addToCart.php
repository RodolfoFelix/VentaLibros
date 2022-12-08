<?php
    include("../../conexion/conn_localhost.php");
    $idLibro = $_GET['idLibro'];
    session_start();
    if (!array_key_exists('libros', $_SESSION)) {
        $_SESSION['libros'] = array();
    }
    array_push($_SESSION['libros'], $idLibro);
    //var_dump($_SESSION['libros']);
    //unset($_SESSION['libros']);
    header('Location: ../libro/catalogo.php');
?>