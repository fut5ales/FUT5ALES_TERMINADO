<?php
$servername = "127.0.0.1";
$database = "fut5ales2024";
$username = "alumno";
$password = "alumnoipm";
    
$conexion = mysqli_connect($servername, $username, $password, $database); // Se crea la conexión

if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
} else {   
    $query = "SELECT * FROM producto WHERE categoria = '" . $_GET['categoria'] . "'"; // Obtén productos por categoría
    $resultado = mysqli_query($conexion, $query);
}
mysqli_close($conexion);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title><?php echo $_GET['categoria']; ?> | FUT5ALES</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Sonsie+One" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="futsal.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jersey+10&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <label class="bar" for="check">
            <input type="checkbox" id="check">
            <span class="top"></span>
            <span class="middle"></span>
            <span class="bottom"></span>
        </label>
        <a href="index.php"><img class="logos" src="fotos_logos/logo.png"></a>
        <div>
            <a href="productos-favoritos.hmtl"><img class="icon" src="fotos_logos/heart-solid.svg"></a>
            <a href="shopping-cart.hmtl"><img class="icon" src="fotos_logos/cart-shopping-solid.svg"></a>
            <a href="loginform.php"><img class="icon" src="fotos_logos/user-solid.svg"></a>
        </div>
    </header>

    <nav class="navegador">
        <div class="secciones">
            <ul class="lista">
                <li><a href="futsal.php?categoria=futsal">FUTSAL</a></li>
                <li><a href="futsal.php?categoria=futbol_11">FUTBOL 11</a></li>
                <li><a href="futsal.php?categoria=futbol_5">FUTBOL 5</a></li>
                <li><a href="futsal.php?categoria=accesorios">ACCESORIOS</a></li>
            </ul>
        </div>
        <div class="search">
            <input placeholder="Search" class="search__input" type="text" />
            <button class="search__button">
                <svg viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" height="16" width="16" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"></path>
                </svg>
            </button>
        </div>
    </nav>

    <main>
        <section class="futsal-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="menu-lateral">
                            <h5>Ordenar por:</h5>
                            <ul>
                                <li><a href="#">Talles</a></li>
                                <li><a href="#">Color</a></li>
                                <li><a href="#">Modelo</a></li>
                                <li><a href="#">Marca</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="titulo-container d-flex justify-content-between align-items-center">
                            <h2><?php echo strtoupper($_GET['categoria']); ?></h2>
                        </div>
                        <div class="lanzamientos-destacados row">
                            <?php
                                while ($fila = mysqli_fetch_assoc($resultado)) {
                                    
                                    // Comprobamos si el stock es 0
                                   if( $agotado = $fila['stock'] == 0);
                            ?>
                                <div class="col-md-4">
                                    <div class="card <?php echo $agotado ? 'agotado' : ''; ?>">
                                        <img src="<?php echo $fila["imagen"]; ?>" class="card-img-top" alt="<?php echo $fila["nombre"]; ?>">
                                        <div class="card-body text-center">
                                            <h5 class="card-title"><?php echo $fila["nombre"]; ?></h5>
                                            <p class="card-text">$<?php echo $fila["precio"]; ?></p>
                                            
                                            <?php if ($agotado): ?>
                                                <div class="agotado-banner">AGOTADO</div>
                                            <?php endif; ?>
                                            
                                            <a href="posible_producto.php?id=<?php echo $fila['id']; ?>" class="btn btn-primary" <?php echo $agotado ? 'disabled' : ''; ?>>Comprar</a>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="footer-div1">
            <div class="footer-div-row">
                <div class="footer-div-links">
                    <h4>Marcas</h4>
                    <ul>
                        <li><a href="#">Nike</a></li>
                        <li><a href="#">Adidas</a></li>
                        <li><a href="#">New Balance</a></li>
                    </ul>
                </div>
                <div class="footer-div-links">
                    <h4>Ayuda</h4>
                    <ul>
                        <li><a href="#">Preguntas</a></li>
                        <li><a href="#">Términos y condiciones</a></li>
                    </ul>
                </div>
                <div class="footer-div-links siguenos">
                    <h4>Nuestras Redes</h4>
                    <div class="footer-social-link">
                        <a href="facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a href="instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a href="twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const checkBox = document.getElementById("check");
            const navegador = document.querySelector(".navegador");

            checkBox.addEventListener("change", function() {
                if (checkBox.checked) {
                    navegador.style.display = "flex";  // Muestra el navegador
                } else {
                    navegador.style.display = "none";  // Oculta el navegador
                }
            });
        });
    </script>
</body>
</html>
