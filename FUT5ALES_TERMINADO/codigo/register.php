<?php 
$usuario = $_POST['Usuario'];
$Email = $_POST['Email'];
$Contraseña = $_POST['Contraseña'];
$Contraseña2 = $_POST['ConfirmarContraseña'];
$servername = "127.0.0.1";
$database = "fut5ales2024";
$username = "alumno";
$password = "alumnoipm";

$conexion = mysqli_connect($servername, $username, $password, $database); // se crea la conexion    

if (!$conexion) {
    die("Conexion fallida: " . mysqli_connect_error());
}
else{   
    
    $query_email="select * from usuario";

    $resultado_email=mysqli_query($conexion, $query_email);

    while($fila = mysqli_fetch_assoc($resultado_email)){
        if($fila['Email'] === $Email){
            header('location: registerform.php?error=0');
            if(isset($_GET['error']) && $_GET['error'] == 0){ ?>
            <label for="">Email en uso</label> <?php } ?>
            <?php
        exit;
        }
    }

    if($Contraseña == $Contraseña2){
        $query = "insert into usuario values(null,'$usuario','$Email','$Contraseña')";
        $resultado=mysqli_query($conexion, $query);
        header("Location: loginform.php");
    }   
    else{
        header("Location: registerform.php?error=1");
        if(isset($_GET['error']) && $_GET['error'] == 1){ ?>
            <label for="">Las contraseñas no coinciden</label> <?php } ?>
            <?php
    }
}
mysqli_close($conexion);?>