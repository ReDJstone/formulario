<!DOCTYPE html>
<html lang="en">
<head>
    <link href="css/css.css" rel="stylesheet">
</head>
    <body onload="checkWhenLogged()">
        <div class="topnav">
            <a href="index.html">Home</a>
            <a href="registro.html">Register</a>
            <a href="login.html">Log in</a>
            <a href="/index.html" style="float:right"> Back to Portfolio</a>
        </div>
        <div style="padding-left: 16px">
            <h4 id="post_login" class="success hidden"></h4>
            <?php
            $username = "programs";
            $password = "prred";
            $servername = "localhost";
            $dbname = "registro";

            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM usuarios";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
            echo "<table><tr><th>Nombre</th><th>Username</th><th>Email</th><th>Teléfono</th><th>Contraseña</th></tr>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["nombre"]."</td><td>".$row["user"]."</td><td>".$row["email"]."</td><td>".$row["tlf"]."</td><td>".$row["passwd"]."</td></tr>";
            }
            echo "</table>";
            } else {
            echo "0 results";
            }
            $conn->close();
            ?>
        </div>
        <hr>
        <script src="js/js.js"></script>
    </body>
    <footer style="text-align: center">
        Created by: Amador Caballero
    </footer>
</html>

