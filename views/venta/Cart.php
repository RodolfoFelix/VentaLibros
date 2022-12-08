<?php include('../../includes/header.php')?>
<?php 
    include('../../conexion/conn_localhost.php');
    session_start();
    var_dump($_SESSION['libros']);
    echo '<br>';
    echo '<br>';
    $idsLibros = implode( ', ', array_values($_SESSION['libros']));
    $sql="SELECT * FROM libro WHERE id IN (".$idsLibros.")";
    echo '<br>';
    echo '<br>';
    var_dump($sql);
    die();
    $librosCarrito = mysqli_query($conn_localhost, $sqlTopMes) or trigger_error("Login query failed");
?>
<div class="container-fluid">
    <table class="table">
        <thead>
            <tr>
                <th></th>
            </tr>
        </thead>
    </table>
</div>

<?php include('../../includes/footer.php')?>