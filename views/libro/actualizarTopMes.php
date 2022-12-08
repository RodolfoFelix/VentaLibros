<?php
    include("../../conexion/conn_localhost.php");
    $sqlDelete="DELETE FROM topmes";
    mysqli_query($conn_localhost, $sqlDelete) or trigger_error("Login query failed");
    $sqlSelect= "SELECT * FROM libro ORDER BY noventas DESC LIMIT 3";
    $libros = mysqli_query($conn_localhost, $sqlSelect) or trigger_error("Login query failed");
    while($libro = mysqli_fetch_array($libros)):
        $nombre = $libro["nombre"];
        $autor = $libro["autor"];
        $sinopsis = $libro["sinopsis"];
        $genero = $libro["genero"];
        $noventas = $libro["noventas"];
        $idlibro = $libro["id"];
        $imagen = $libro["imagen"];
        $sqlInsert = "INSERT INTO topmes(nombre,autor,sinopsis,genero,noventas,idlibro,imagen) 
        VALUES ('".$nombre."','".$autor."','".$sinopsis."','".$genero."','".$noventas."','".$idlibro."','".$imagen."')";
        mysqli_query($conn_localhost, $sqlInsert) or trigger_error("Login query failed");
    endwhile;

    header("Location: catalogo.php");
?>