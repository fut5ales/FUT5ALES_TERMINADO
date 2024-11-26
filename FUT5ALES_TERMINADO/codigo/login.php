<?php
    $Usuario = $_POST["Usuario"];
    $contraseña = $_POST["Contraseña"];
    $servername = "127.0.0.1";
    $database = "fut5ales2024";
    $username = "alumno";
    $password = "alumnoipm";
    
    $conexion = mysqli_connect($servername, $username, $password, $database); // se crea la conexion


    if (!$conexion) {
        die("Conexion fallida: " . mysqli_connect_error());
    }
    else{
        $query = "select contraseña from usuario where usuario = '$Usuario'";
       
        $resultado=mysqli_query($conexion, $query);
       
        if(mysqli_num_rows($resultado)  == 0){
            header("Location: registerform.php?error=1");
        }
        else {
            $fila=mysqli_fetch_assoc($resultado);
            if($fila["contraseña"] == $contraseña){
                session_start();
                $_SESSION["usuario"] = $Usuario;
                $_SESSION["iniciada"] = true;
                header("Location: index.php");
            }
            else{
                header("Location: loginform.php?error=1");
            }
        }
    }
    mysqli_close($conexion);
?> 