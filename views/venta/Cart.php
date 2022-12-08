<?php include('../../includes/header.php')?>
<?php 
    include('../../conexion/conn_localhost.php');
    $idsLibros = implode( ', ', array_values($_SESSION['libros']));
    $sql="SELECT * FROM libro WHERE id IN (".$idsLibros.")";
    $total = 0;
    $librosCarrito = mysqli_query($conn_localhost, $sql) or trigger_error("Login query failed");
?>
<div class="container-fluid">
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Autor</th>
                <th>Precio</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php while($libroCarrito = mysqli_fetch_array($librosCarrito)):
                    $total = $total + (double)$libroCarrito['precio'];
                ?>
                <tr>
                    <td><?php echo $libroCarrito['nombre'] ?></td>
                    <td><?php echo $libroCarrito['autor'] ?></td>
                    <td><?php echo $libroCarrito['precio'] ?></td>
                    <td><a href="../venta/removefromCart.php?idLibro=<?php echo $libroCarrito['id'] ?>" class="btn btn-danger">Quitar del carrito</a></td>
                </tr>
            <?php endwhile?>
        </tbody>
    </table>
    <div class="totalAPagar row">
        <div class="col-md-6">
        <h4>Total a Pagar:</h4>
        <h4>$ <?php echo $total?> </h4>
        </div>
        <div class="col-md-6">
            <a href="../venta/pay.php" class="btn btn-success" style="float:right;">Pagar</a>
        </div>
    </div>
</div>
<?php include('../../includes/footer.php')?>