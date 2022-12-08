<?php
    session_start();
    $idLibro = $_GET['idLibro'];
    $libros = $_SESSION['libros'];
    $key = array_search($idLibro, $libros); 

    if (($key = array_search($idLibro, $libros)) !== false) {
        unset($libros[$key]);
        $_SESSION['libros'] = $libros;
    }
    
    header('Location: ../libro/catalogo.php');
?>