<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
</head>
<body>
    <div id= "header">
        <h3>Bienvenidos a NOMBREPROYECTO</h3>
    </div>
    <div>
        <form action="login.php" method= "post">
        <label for="email">Email:</label>
        <input type="text" name="email">
        <br>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password">
        <br>
        <br>
        <input type="submit" value="Login" name="login_sent">

        </form>
    </div>
</body>
</html>