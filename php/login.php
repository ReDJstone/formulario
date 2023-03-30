<?php
    $usuario = "programs";
    $password = "prred";
    $server = "localhost";
    $base = "registro";

    $conexion = new mysqli($server, $usuario, $password) or die("Error!");
    $db = mysqli_select_db($conexion, $base);

    $user = $_POST['user'];
    $passwd = $_POST['passwd'];

    $select="SELECT nombre, user, passwd FROM usuarios WHERE user='$user' AND passwd='$passwd';";
    $ejecutar=mysqli_query($conexion, $select);
    $location="";

    if (mysqli_num_rows($ejecutar) != 0){
        $row = mysqli_fetch_row($ejecutar);
        $cap_nombre = ucfirst($row[0]);
    
        if($row[1] == $user && $row[2] == $passwd) {
            $location = "Location: ../users.php?u=$cap_nombre";
        } 
    }
    else {
        $location = "Location: /login.html?err";
    }
    header($location);
    die();

    // echo("<p>'$tipo', '$zona', '$direccion', $precio, $dorms, $size, $pool, $garden, $garage, '$info'</p>");
    // GRANT ALL PRIVILEGES ON database_name.* TO 'username'@'localhost'; 
?>
