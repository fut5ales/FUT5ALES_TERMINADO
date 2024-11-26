<?php
  session_start();
    $servername = "127.0.0.1";
    $database = "fut5ales2024";
    $username = "alumno";
    $password = "alumnoipm";
    
    $conexion = mysqli_connect($servername, $username, $password, $database); // se crea la conexion


    if (!$conexion) {
        die("Conexion fallida: " . mysqli_connect_error());
    }
    else{
        $query = "select * from producto where  destacado= 1;";

        $resultado=mysqli_query($conexion, $query);
 
        $query_me = "select * from producto where  categoria='accesorios' limit 3;";

        $resultado_me=mysqli_query($conexion, $query_me);
      }
    mysqli_close($conexion);
?> 
<!doctype html>
<html>
  <html lang="en"></html>
  <div>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <title>Inicio | FUT5ALES</title>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Sonsie+One" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="index.css" />
        <link rel="icon" href="fotos_logos/logo.png" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <script src="https://kit.fontawesome.com/83480b7348.js" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
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
            <a href="index.php"><img class ="logos" src="fotos_logos/logo.png">
          </a>
        
        <div>
            <a href="productos-favoritos.hmtl">
              <img class= "icon" src= "fotos_logos/heart-solid.svg"></a>
            <a href="shopping-cart.hmtl">
              <img class= "icon" src= "fotos_logos/cart-shopping-solid.svg"></a>
            <a href="loginform.php">
              <?php if(!isset($_SESSION["iniciada"])){?>
              <img class = "icon" src = "fotos_logos/user-solid.svg"></a>
              <?php } 
              else if($_SESSION["iniciada"]){?>
                <a href="cerrar.php" > <img class="icono" src="fotos_logos/cerrar.png" /></a>
              <?php }?>
        </div>

        </header>

        <nav class="navegador">
            <div class = "secciones">

                <ul class = "lista">
                <li><a href="futsal.php?categoria=futsal">FUTSAL</a></li>
                <li><a href="futsal.php?categoria=futbol_11">FUTBOL 11</a></li>
                <li><a href="futsal.php?categoria=futbol_5">FUTBOL 5</a></li>
                <li><a href="futsal.php?categoria=accesorios">ACCESORIOS</a></li>

            </div>
            <div class="search">
              <input placeholder="Search" class="search__input" type="text" />
              <button class="search__button">
                <svg
                  viewBox="0 0 16 16"
                  class="bi bi-search"
                  fill="currentColor"
                  height="16"
                  width="16"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"
                  ></path>
                </svg>
              </button>
            </div>
            
      </nav>
      <form>
      <h2>
        <div class = titulo2>
        ¡NOVEDADES!</S>
      </div>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="slider1 d-block w-100" src="fotos_logos/slider.webp" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="slider1 d-block w-100" src="fotos_logos/slideeeeeeeee.webp" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="slider1 d-block w-100" src="fotos_logos/slider3.webp" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </h2>

          
    <main>
      
        <section class="lanzamientos-destacados">
  <div class="container">
    <h2 class="titulo-lanzamientos">Lanzamientos Destacados</h2>
    <div id="productosCarousel" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <!-- Mostrar productos destacados -->
        <?php
    $activeClass = 'active'; // Para asegurarnos de que el primer producto este activo
    $contador = 0;
    while ($producto = mysqli_fetch_assoc($resultado)) {
        // Cada vez que se alcanza el cuarto producto, inicia un nuevo slide en el carrusel
        if ($contador % 4 === 0) {
            // Cerramos el slide anterior (si no es el primero)
            if ($contador > 0) {
                echo '</div>'; // Cerrar .row
                echo '</div>'; // Cerrar .carousel-item
            }
            // Iniciar un nuevo slide
            echo '<div class="carousel-item ' . ($contador === 0 ? 'active' : '') . '">';
            echo '<div class="row">';
        }

        // Mostrar cada producto dentro del slide
        echo '<div class="col-md-3 mb-4">';
        echo '<div class="card">';
        echo '<img src="' . $producto['imagen'] . '" class="card-img-top" alt="' . $producto['nombre'] . '">';
        echo '<div class="card-body text-center">';
        echo '<h5 class="card-title">' . $producto['nombre'] . '</h5>';
        echo '<p class="card-text">$' . $producto['precio'] . '</p>';
        echo '<a href="posible_producto.php?id=' . $producto['id'] . '" class="btn btn-primary">Comprar</a>';
        echo '</div></div></div>';

        $contador++;
    }

    // Cerrar el último slide abierto
    if ($contador % 4 !== 0) {
        echo '</div>'; // Cerrar .row
        echo '</div>'; // Cerrar .carousel-item
    }
?>

      
      <a class="carousel-control-prev" href="#productosCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#productosCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
</section>
<!---------------IMAGEN 3---------------->
<div class="container_dos">
  <div class = "river">
    <div class="boca">
      <iframe title="3D Model" class="c-viewer__iframe" src="https://sketchfab.com/models/e4ef374a4bf44c9f9a296f42e5476c7f/embed?autostart=1&amp;internal=1&amp;tracking=0&amp;ui_infos=0&amp;ui_snapshots=1&amp;ui_stop=0&amp;ui_watermark=0" id="api-frame" allow="autoplay; fullscreen; xr-spatial-tracking" xr-spatial-tracking="true" execution-while-out-of-viewport="true" execution-while-not-rendered="true" web-share="true" allowfullscreen=""></iframe>
    </div>
  </div>
  <a class ="Nike Premier" href="Nike Premier.html"  alt="Nike Premier">
    <div class="col-md-3 mb-4">
      <div class="card">
        <img src="fotos_logos/Adidas-Pureagility-Messi-FG-PIloboots.webp" class="card-img-top" alt="Nike Premier">
        <div class="card-body text-center">
          <h5 class="card-title">Adidas-Pureagility-Messi-FG-PIloboots</h5>
          <p class="card-text">$159999</p>
          <a href="producto.php?id=200" class="btn btn-primary">Comprar</a>
        </div>
      </div>
    </div>
</div>
<!--------------------------------------->
<div class="media-antideslizantes">
  <h2>Nuestros Accesorios</h2>
  <img src="fotos_logos/medias_antideslizantes.webp" alt="Medias Antideslizantes" class="slide-in-image">
</div>

<section class = "lanzamientos-destacados">
  <div class="container">
        <div class="carousel-item active">
          <div class="row">
            <!-- Productos Medias -->
            <?php 
              while ($fila = mysqli_fetch_assoc($resultado_me)){
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
       
</section>

<div class="logo_terminado">
    <img src="fotos_logos/fut5ales.png" class="logo_terminado">
</div>

<footer class="footer">
  <div class="footer-div1">
      <div class="footer-div-row">
          <div class="footer-div-links">
              <h4>Marcas</h4>
              <ul>
                  <li><a href="https://www.nike.com">Nike</a></li>
                  <li><a href="https://www.adidas.com">Adidas</a></li>
                  <li><a href="https://www.jomasport.com">Joma</a></li>
                  <li><a href="https://www.umbro.com">Umbro</a></li>
              </ul>
          </div>
          <div class="footer-div-links">
              <h4>Ayuda</h4>
              <ul>
                  <li><a href="#">Preguntas</a></li>
                  <li><a href="#">Términos y condiciones</a></li>
              </ul>
          </div>
          <script src="https://kit.fontawesome.com/83480b7348.js" crossorigin="anonymous"></script>
 
 
 <script src="https://kit.fontawesome.com/83480b7348.js" crossorigin="anonymous"></script>


<div class="footer-div-links siguenos">
           <h4>Nuestras Redes</h4>
           <div class="footer-social-link">
             <a href="https://www.facebook.com" TARGET="_BLANK"><i class="fab fa-facebook-f"></i></a>
             <a href="https://www.instagram.com" TARGET="_BLANK"><i class="fab fa-instagram"></i></a>
             <a href="https://whatsapp.com" TARGET="_BLANK"><i class="fab fa-whatsapp"></i></a>
           </div>
         </div>

</footer>

    </main>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
  
  <script>$('.carousel').carousel({
    interval: 5000
  })
  </script>
  <script>
    window.addEventListener('scroll', function() {
        const image = document.querySelector('.slide-in-image');
        const imagePosition = image.getBoundingClientRect().top;
        const screenPosition = window.innerHeight / 1.5;

        if (imagePosition < screenPosition) {
            image.style.opacity = '1';
            image.style.transform = 'translateX(0)';
            }
    });

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

</html>

