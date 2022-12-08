<?php 
    include('../../conexion/conn_localhost.php');
    $idsLibros = implode( ', ', array_values($_SESSION['libros']));
    $sql="SELECT * FROM libro WHERE id IN (".$idsLibros.")";
    $total = 0;
    $librosCarrito = mysqli_query($conn_localhost, $sql) or trigger_error("Login query failed");
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script>
function refreshPage(){
    window.location.href=window.location.href
} 