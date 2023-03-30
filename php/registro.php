<?php
    $usuario = "programs";
    $password = "prred";
    $server = "localhost";
    $base = "registro";

    $conexion = new mysqli($server, $usuario, $password) or die("Error!");
    $db = mysqli_select_db($conexion, $base);

    session_start();
    if ($_SESSION['random_num'] == $_REQUEST['numero']) {
        $nombre = $_POST['nombre'];
        $user = $_POST['user'];
        $email = $_POST['email'];
        $tlf = $_POST['tlf'];
        $passwd = $_POST['passwd'];
    
        $required = array($nombre, $user, $email, $tlf, $passwd);
        foreach($required as $field) {
            if (empty(trim($field))) {
                header("Location: /index.html?empty");
                die();
            };
        }

        $select="SELECT * FROM usuarios WHERE email='$email' OR user='$user' OR tlf='$tlf'";
        $comprobar=mysqli_query($conexion, $select);

        $row = mysqli_fetch_row($comprobar);

        if (mysqli_num_rows($comprobar) != 0) {
            $errloc = "Location: /registro.html?";
            $err = 0;
            if ($row[1] == $user) {
                $errloc .= 'user&';
                $err = 1;
            }
            if ($row[2] == $email){
                $errloc .= 'email&';
                $err = 1;
            }
            if ($row[3] == $tlf){
                $errloc .= 'tlf';
                $err = 1;
            }
            header($errloc);
            die();
        } else {
            $insert="INSERT INTO usuarios VALUES ('$nombre', '$user', '$email', '$tlf', '$passwd')";
            $ejecutar=mysqli_query($conexion, $insert);

            if(!$ejecutar) {
                header("Location: /registro.html?err");
                die();
            } else {
                header("Location: /login.html?reg");
                die();
            }
        }
    } else {
        header("Location: /registro.html?caperr");
    }
?>
