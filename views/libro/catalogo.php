<?php include("../../includes/header.php")?>
<link rel="stylesheet" href="css/main.css">
<br>
<br>
<?php include("controlPanel.php")?>
<br>
<br>
<br>
<div id="buscadorTopVentas" class="row text-center">
    <div id="buscador text-center" class="col-md-4">
        <div class="card text-center" style="width: 18rem; float:right;">
            <div class="card-body" style="background-color:#157347;">
                <form action="catalogo.php" method="post">
                <label class="form-label" labelfor="texto"><strong style="color:white;">Buscar:</strong></label>
                <input class="form-control" type="text" name="valor">
                <br>
                <input class="btn btn-primary" type="submit" value="Buscar" name="buscar">
                <button class="btn btn-secondary" onClick="refreshPage()">Limpiar Filtro</button>
                </form>         
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="btnSB btnSBTop text-center" data-bs-toggle="modal" data-bs-target="#masVendidosModal"><img class="img" style="margin-top:20px;" src="../../images/books.png"><br><strong> Los mas Vendidos</strong></div>
    </div>
    <div class="col-md-4">
        <?php if(isset($_SESSION['libros'])){?>
            <div class="btnSB btnSBCarrito text-center" data-bs-toggle="modal" data-bs-target="#carritoModal"><img class="img" src="../../images/shopping-cart.png"><br><strong> Ver Carrito</strong></div>
        <?php } else {?>
             <h5> No hay libros en el carrito</h5>   
        <?php }?>
    </div>
</div>
<br>
<br>
<div id="libros">
    <div class="text-center"><h3>Catalogo de Libros</h3></div><br><br>
    <div class="row text-center">
        <?php
            function filtrarLibros($sql){
                include('../../conexion/conn_localhost.php');
                $result = mysqli_query($conn_localhost, $sql) or trigger_error("Login query failed");
                return $result;
            } 
            if(isset($_POST["valor"])){
                $valor = $_POST["valor"];
                $sql = "SELECT * FROM libro WHERE nombre LIKE '%".$valor."%' OR autor LIKE '%".$valor."%' OR genero LIKE '%".$valor." %'";
                $libros = filtrarLibros($sql);

            }else{
                $sql = "SELECT * FROM libro";
                $libros = filtrarLibros($sql);
            }
        ?> 
        <?php while($libro = mysqli_fetch_array($libros)): ?>
        <!-- while -->
            <div class="col-md-4 libro">
                <div class="text-center" style="width: 18rem; float:right;">
                    <img style="height:300px;" src="<?php echo $libro["imagen"]?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $libro['nombre'] ?></h5>
                        <p class="card-text"><?php echo $libro['autor'] ?></p>
                        <p class="card-text"><?php echo $libro['sinopsis'] ?></p>
                        <a href="../../views/venta/addToCart.php?idLibro=<?php echo $libro['id'] ?>" class="btn btn-success">Agregar a Carrito</a><br><br>
                        <a href="comentario.php?idLibro=<?php echo $libro["id"]?>" class="btn btn-secondary">Ver Comentarios</a>
                    </div>
                </div>
            </div>
        <!-- while --> 
        <?php endwhile?>   
    </div>
</div>
<!-- Modal Top Ventas-->
<div class="modal fade" id="masVendidosModal" tabindex="-1" aria-labelledby="masVendidosModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Libros Mas Vendidos</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container-fluid"></div>
        <div class="row">
            <?php
                include('../../conexion/conn_localhost.php');
                $sqlTopMes="SELECT * FROM topmes";
                $librosTop = mysqli_query($conn_localhost, $sqlTopMes) or trigger_error("Login query failed");
                while($libroTop = mysqli_fetch_array($librosTop)):
            ?>
            <div class="col-md-12 libro">
                <div class="card text-center" style="width: 18rem;">
                    <img style="height:300px;" src="<?php echo $libroTop["imagen"]?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $libroTop['nombre'] ?></h5>
                        <p class="card-text"><?php echo $libroTop['autor'] ?></p>
                        <p class="card-text"><?php echo $libroTop['sinopsis'] ?></p>
                        <p class="card-text">Copias Vendidas: <?php echo $libroTop['noventas'] ?></p>
                        <a href="../../views/venta/addToCart.php?idLibro=<?php echo $libroTop['idlibro'] ?>" class="btn btn-success">Agregar a Carrito</a><br><br>
                        <a href="comentario.php?idLibro=<?php echo $libro["id"]?>" class="btn btn-secondary">Ver Comentarios</a>
                    </div>
                </div>
            </div>    
            <?php endwhile?>
        </div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
<!-- Modal Carrito -->
<?php if(isset($_SESSION['libros'])) {?>
        <div class="modal fade" id="carritoModal" tabindex="-1" aria-labelledby="carritoModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-3" id="exampleModalLabel">Actualmente en Carrito</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php  include('../venta/cart.php')?>
            </div>
            <div class="modal-footer">
            </div>
            </div>
        </div>
        </div>
 <?php }?>   
<?php include("../../includes/footer.php")?>      
