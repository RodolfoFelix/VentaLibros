<?php include('../../includes/header.php'); ?>
<?php
    include('../../conexion/conn_localhost.php');
    session_start();
    $idUsuario = $_GET["idUsuario"];
    $totalVentas = 0;
    
    $sql= "SELECT * FROM venta WHERE idusuario=".$idUsuario;
    $ventas = mysqli_query($conn_localhost, $sql) or trigger_error("Login query failed");
    foreach($ventas as $venta){
        $totalVentas = $totalVentas + $venta["total"];
    }

    function getTituloLibro($id){
        include('../../conexion/conn_localhost.php');
        $sqlTitulo = "SELECT * FROM libro WHERE id=".$id;
        $result = mysqli_query($conn_localhost, $sqlTitulo) or trigger_error("Login query failed");
        $row = mysqli_fetch_assoc($result);
        $titulo = $row['nombre'];
        return $titulo;

    }    
?>
<div class="container-fluid">
    <div class="row text-center">
        <h3> Ventas Realizadas </h3>
    </div>
    <br>
    <br>
    <br>
    <div class="row">
        <div class="col-md-4">
            <a href="../libro/catalogo.php" class="btn btn-secondary">Regresar a Catalogo</a>
        </div>
        <div class="col-md-4">
            <h4>Ganancias Totales:</h4>
            <h4>$ <?php echo $totalVentas ?> </h4>
        </div>
    </div>
    <br>
    <br>
    <br>
    <div class="row">
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <td>Titulo  del Libro</td>
                    <td>Fecha</td>
                    <td>Precio</td>
                </tr>
            </thead>
            <tbody>            
            <?php 
            $sql= "SELECT * FROM venta WHERE idusuario=".$idUsuario;
            $ventas = mysqli_query($conn_localhost, $sql) or trigger_error("Login query failed");
            while($venta = mysqli_fetch_array($ventas)):?>
                    <tr>
                        <td><?php echo getTituloLibro($venta['idlibro']) ?></td>
                        <td><?php echo $venta['fecha'] ?></td>
                        <td><?php echo $venta['total'] ?></td>                
                    </tr>
            <?php endwhile?>
            </tbody>
        </table>
    </div>
</div>
<?php include('../../includes/footer.php');?>