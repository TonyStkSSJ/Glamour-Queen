<?php
    include('./php/conexion.php');
    if(!isset($_GET['texto'])){
        header("Location: ./index.php");
    }
    ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Glamour Queen - Inicio</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="images/glamour_queen_icon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">


    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
    
  </head>
  <body>
  
  <div class="site-wrap">
    <?php include("./layouts/header.php"); ?> 

    <div class="site-section">
      <div class="container">

        <div class="row mb-5">
          <div class="col-md-9 order-2">

            <div class="row">
              <div class="col-md-12 mb-5">
                <div class="float-md-left mb-4"><h2 class="text-black h5">Busando resultados para <?php echo $_GET['texto']; ?></h2></div>
                <div class="d-flex">
                  <div class="dropdown mr-1 ml-md-auto">

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                      <a class="dropdown-item" href="#">Hombre</a>
                      <a class="dropdown-item" href="#">Mujer</a>
                      <a class="dropdown-item" href="#">Niño</a>
                    </div>
                  </div>
                  <div class="btn-group">

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                      <a class="dropdown-item" href="#">Relevancia</a>
                      <a class="dropdown-item" href="#">Nombre, A - Z</a>
                      <a class="dropdown-item" href="#">Nombre, Z - A</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Precio, Bajo a Alto</a>
                      <a class="dropdown-item" href="#">Precio, Alto a Bajo</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mb-5">
              <?php
              $resultado = $conexion  -> query("select * from productos where 
                nombre like '%".$_GET['texto']."%' or
                descripcion like '%".$_GET['texto']."%' or
                talla like '%".$_GET['texto']."%' or     
                color like '%".$_GET['texto']."%' 

                order by id DESC limit 10") or die($conexion -> error);
                if(mysqli_num_rows($resultado) > 0){

              while($fila = mysqli_fetch_array($resultado)){
              ?>

              <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                <div class="block-4 text-center border">
                  <figure class="block-4-image">
                    <a href="shop-single.php?id=<?php echo $fila['id'];?>">
                      <img src="images/<?php echo $fila['imagen']; ?>" alt="<?php echo $fila['nombre']; ?>" class="img-fluid"></a>
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="shop-single.php?id=<?php echo $fila['id'];?>"> <?php echo $fila['nombre']; ?></a></h3>
                    <p class="mb-0"><?php echo $fila['descripcion']; ?></p>
                    <p class="text-primary font-weight-bold"><?php echo $fila['precio']; ?></p>
                  </div>
                </div>
              </div>
            <?php } }else{
                echo '<h2>Sin Resultados</h2>';
            } ?>

            </div>
            <div class="row" data-aos="fade-up">
              <div class="col-md-12 text-center">
                <div class="site-block-27">
                  <ul>
                    <li><a href="#">&lt;</a></li>
                    <li class="active"><span>1</span></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">&gt;</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3 order-1 mb-5 mb-md-0">
            <div class="border p-4 rounded mb-4">
              <h3 class="mb-3 h6 text-uppercase text-black d-block">Categorias</h3>
              <ul class="list-unstyled mb-0">
                <li class="mb-1"><a href="#" class="d-flex"><span>Hombre</span> <span class="text-black ml-auto">(2,220)</span></a></li>
                <li class="mb-1"><a href="#" class="d-flex"><span>Mujer</span> <span class="text-black ml-auto">(2,550)</span></a></li>
                <li class="mb-1"><a href="#" class="d-flex"><span>Niño</span> <span class="text-black ml-auto">(2,124)</span></a></li>
              </ul>
            </div>

            <div class="border p-4 rounded mb-4">
              <div class="mb-4">
                <h3 class="mb-3 h6 text-uppercase text-black d-block">Filtro por Precio</h3>
                <div id="slider-range" class="border-primary"></div>
                <input type="text" name="text" id="amount" class="form-control border-0 pl-0 bg-white" disabled="" />
              </div>

              <div class="mb-4">
                <h3 class="mb-3 h6 text-uppercase text-black d-block">Tamaño</h3>
                <label for="s_sm" class="d-flex">
                  <input type="checkbox" id="s_sm" class="mr-2 mt-1"> <span class="text-black">Pequeño (2,319)</span>
                </label>
                <label for="s_md" class="d-flex">
                  <input type="checkbox" id="s_md" class="mr-2 mt-1"> <span class="text-black">Mediano (1,282)</span>
                </label>
                <label for="s_lg" class="d-flex">
                  <input type="checkbox" id="s_lg" class="mr-2 mt-1"> <span class="text-black">Grande (1,392)</span>
                </label>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="site-section site-blocks-2">
                <div class="row justify-content-center text-center mb-5">
                  <div class="col-md-7 site-section-heading pt-4">
                    <h2>Vestimenta</h2>
                  </div>
                </div>
                <div class="row">
  <div class="col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="fade" data-aos-delay="">
    <a class="block-2-item" href="#">
      <figure class="image">
        <img src="images/mujer.jpg" alt="" class="img-fluid square-image">
      </figure>
      <div class="text">
        <span class="text-uppercase">Colecciones</span>
        <h3>Mujer</h3>
      </div>
    </a>
  </div>
  <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="">
    <a class="block-2-item" href="#">
      <figure class="image">
        <img src="images/kid2.avif" alt="" class="img-fluid square-image">
      </figure>
      <div class="text">
        <span class="text-uppercase">Colecciones</span>
        <h3>Niño</h3>
      </div>
    </a>
  </div>
  <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="200">
    <a class="block-2-item" href="#">
      <figure class="image">
        <img src="images/man.avif" alt="" class="img-fluid square-image">
      </figure>
      <div class="text">
        <span class="text-uppercase">Colecciones</span>
        <h3>Hombre</h3>
      </div>
    </a>
  </div>
  <br>
</div>


<div class="row">
          <div class="col-md-12">
            <div class="site-section site-blocks-2">
                <div class="row justify-content-center text-center mb-5">
                  <div class="col-md-7 site-section-heading pt-4">
                    <h2>Accesorios</h2>
                  </div>
                </div>
                <div class="row">
  <div class="col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="fade" data-aos-delay="">
    <a class="block-2-item" href="#">
      <figure class="image">
        <img src="images/tenisBlanco.jpeg" alt="" class="img-fluid square-image">
      </figure>
      <div class="text">
        <span class="text-uppercase">Colecciones</span>
        <h3>Calzado</h3>
      </div>
    </a>
  </div>
  <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="">
    <a class="block-2-item" href="">
      <figure class="image">
        <img src="images/m.avif" alt="" class="img-fluid square-image">
      </figure>
      <div class="text">
        <span class="text-uppercase">Colecciones</span>
        <h3>Bolsas</h3>
      </div>
    </a>
  </div>
            </div>
          </div>
        </div>
        
      </div>
    </div>
    <?php include("./layouts/footer.php"); ?> 
  
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>
    
  </body>
</html>