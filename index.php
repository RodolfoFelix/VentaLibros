<?php include("includes/header.php")?>
    <div class="text-center" id= "header">
        <h3>Bienvenidos a BookStore</h3>
    </div>
    <br>
    <br>
    <br>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4 text-center">
            <form action="login.php" method= "post">
            <label class="form-label" for="email">Email:</label>
            <input class="form-control" type="text" name="email">
            <br>
            <br>
            <label class="form-label" for="password">Password:</label>
            <input class="form-control" type="password" name="password">
            <br>
            <br>
            <input class="btn btn-success" type="submit" value="Login" name="login_sent">
            <a href="views/usuario/form.php?fromLogin=1" class="btn btn-primary">Registrarme</a>
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>
<?php include("includes/footer.php")?>