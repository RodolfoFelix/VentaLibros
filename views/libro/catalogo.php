<?php include("../../includes/header.php")?>
<link rel="stylesheet" href="css/main.css">
<div class="logo text-center"><h3>BANNER OR LOGO</h3></div>
<br>
<br>
<br>
<?php include("controlPanel.php")?>
<br>
<br>
<br>
<div id="buscadorTopVentas" class="row text-center">
    <div id="buscador text-center" class="col-md-4">
        <div class="card text-center" style="width: 18rem; float:right;">
            <div class="card-body">
                <form action="catalogo.php" method="post">
                <label class="form-label" labelfor="texto">Buscar:</label>
                <input class="form-control" type="text" name="valor">
                <br>
                <input class="btn btn-primary" type="submit" value="Buscar" name="buscar">
                <button class="btn btn-secondary" onClick="refreshPage()">Limpiar Filtro</button>
                </form>         
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="btnSB btnSBTop text-center" data-bs-toggle="modal" data-bs-target="#masVendidosModal">Los mas Vendidos</div>
    </div>
    <div class="col-md-4">
        <a href="../venta/Cart.php">
        <div class="btnSB btnSBCarrito text-center">Ver Carrito</div>
        </a>
    </div>
</div>
<br>
<br>
<div id="libros">
    <div class="text-center"><h4>Lista de Libros</h4></div>
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
                <div class="card text-center" style="width: 18rem; float:right;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $libro['nombre'] ?></h5>
                        <p class="card-text"><?php echo $libro['autor'] ?></p>
                        <p class="card-text"><?php echo $libro['sinopsis'] ?></p>
                        <a href="../../views/venta/addToCart.php?idLibro=<?php echo $libro['id'] ?>" class="btn btn-success">Agregar a Carrito</a><br><br>
                        <a href="#" class="btn btn-secondary">Ver Comentarios</a>
                    </div>
                </div>
            </div>
        <!-- while --> 
        <?php endwhile?>   
    </div>
</div>
<div id="branding">
    <div id=¨brandingLogo¨ class="text-center">
        <h3>FOOTER DE LA WEB</h3>
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
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $libroTop['nombre'] ?></h5>
                        <p class="card-text"><?php echo $libroTop['autor'] ?></p>
                        <p class="card-text"><?php echo $libroTop['sinopsis'] ?></p>
                        <p class="card-text">Copias Vendidas: <?php echo $libroTop['noventas'] ?></p>
                        <a href="../../views/venta/addToCart.php?idLibro=<?php echo $libroTop['idlibro'] ?>" class="btn btn-success">Agregar a Carrito</a><br><br>
                        <a href="#" class="btn btn-secondary">Ver Comentarios</a>
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
<?php include("../../includes/footer.php")?>      
