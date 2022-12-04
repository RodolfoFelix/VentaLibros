<?php
  // Inicializamos la sesion o la retomamos
  if(!isset($_SESSION)) {
    session_start();
  }
  include("conexion/conn_localhost.php");

  // Evaluamos si el formulario ha sido enviado
  if(isset($_POST["login_sent"])) {
    // Validamos si las cajas están vacias
    foreach($_POST as $calzon => $caca) {
      if($caca == "") $error[] = "The $calzon field is required";
    }

    // Si estamos libres de errores procedemos con la verificación de los datos del usuario
    if(!isset($error)) {
      // Armamos el query para verificar email y password en la BD
      $queryLogin = sprintf("SELECT * FROM usuario WHERE email = '%s' AND password = '%s'",
          mysqli_real_escape_string($conn_localhost, trim($_POST['email'])),
          mysqli_real_escape_string($conn_localhost, trim($_POST['password']))
      );

      // Ejecutamos el query
      $resQueryLogin = mysqli_query($conn_localhost, $queryLogin) or trigger_error("Login query failed");

      // Determinamos si el login es valido (email y password coincidentes)
      //Contamos el recordset (el resultado esperado para un login valido es 1)
      if(mysqli_num_rows($resQueryLogin)) {
        // Hacemos un fetch del recordset
        $userData = mysqli_fetch_assoc($resQueryLogin);

        // Defninimos variables de sesion en $_SESSION
        $_SESSION['userId'] = $userData['id'];
        $_SESSION['userFullname'] = $userData['nombre']." ".$userData["apellidos"];
        $_SESSION['userEmail'] = $userData['email'];
        $_SESSION['userPermiso'] = $userData['permiso'];

        // Redireccionamos al usuario al Panel de Control
        header("Location: views/libro/catalogo.php");
      }
    }
  }
?>