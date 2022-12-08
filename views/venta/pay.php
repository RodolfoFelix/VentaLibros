<?php
    include('../../conexion/conn_localhost.php');
    session_start();
    
    $idsLibros = implode( ', ', array_values($_SESSION['libros']));
    $fecha = date('d-m-Y');
    $total = 0;
    $sqlSelectLibros = "SELECT * FROM libro WHERE id IN (".$idsLibros.")";
    $libros = mysqli_query($conn_localhost, $sqlSelectLibros) or trigger_error("Login query failed");
    while($libro = mysqli_fetch_array($libros)){
        $total = $total + (double)$libro['precio'];
        $sqlUpdateNoVentas = "UPDATE libro SET noventas = noventas + 1 WHERE id =".$libro["id"];
        mysqli_query($conn_localhost, $sqlUpdateNoVentas) or trigger_error("Login query failed");
        $sqlInsertVentas = "INSERT INTO venta(idusuario, idlibro, fecha, total) VALUES (".$libro["idusuario"].",".$libro["id"].",'".$fecha."',".$libro["precio"].")";
        mysqli_query($conn_localhost, $sqlInsertVentas) or trigger_error("Login query failed");
    }
    
    unset($_SESSION['libros']);

    header('Location: ../libro/catalogo.php');
?>