<?php
$conexion=mysqli_connect("localhost","root","","registro") or
die("Problemas con la conexión");


 $fecha =$_POST['fecha'];

if(isset($_POST['peso']) & isset ($_POST['altura']) &  is_numeric($_POST['peso'] & is_numeric($_POST['altura']))){
    $peso = $_POST['peso'];
    $altura = $_POST['altura'];

 

    $imc=$peso/($altura*$altura);
  //  echo round ($imc,2);

    if ($imc <18.5){
        $resultado ="Peso Inferior Al Normal";
        $color ="orange";
    }
    if ($imc >=18.5 & $imc <24.9 ){
        $resultado ="Normal";
        $color ="green";
    }
    if ($imc >=24.9 & $imc <29.9 ){
        $resultado ="Peso Superior Al Normal";
        $color ="blue";
    }
    if ($imc >30){
        $resultado ="Obesidad";
        $color ="red";
    }

    mysqli_query($conexion,"insert into datos(peso,altura,imc,fecha) values 
    ('$_REQUEST[peso]','$_REQUEST[altura]',$imc,'$fecha')")
      or die("Problemas en el select".mysqli_error($conexion));

    mysqli_close($conexion);

}
 
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> Bienvenidos a Calculadora IMC - Es Salud No Belleza </title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/one-page-wonder.min.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">CALCULAR IMC</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      
    </div>
  </nav>

  <header class="masthead text-center text-white">
    <div class="masthead-content">
      <div class="container">
        <h1 class="masthead-heading mb-0">Bienvenidos a Calculadora IMC</h1>
        <h2 class="masthead-subheading mb-0">Es Salud No Belleza</h2>
      </div>
    </div>
    <div class="bg-circle-1 bg-circle"></div>
    <div class="bg-circle-2 bg-circle"></div>
    <div class="bg-circle-3 bg-circle"></div>
    <div class="bg-circle-4 bg-circle"></div>
  </header>

  <section>
    <div class="container">
      <div class="row align-items-center">
        
        
        <div class="col-lg-6">
          <!--<div class="p-5">-->
            <h2 class="display-4">Calcula Tu IMC..</h2>
            <p>Algunos de los consejos para pesarse y medirse:</p>
            <form class="" action="index.php" method="POST">
              FECHA (F) <br> <input type="date" step=".01" name="fecha" value="" placeholder="Ingrese La fecha"required ><br><br>
              PESO (KG) <br> <input type="number" step=".01" name="peso" value="" placeholder="Tu Peso En Kilogramos"required ><br><br>
              ALTURA (M) <br> <input type="number" step=".01"  name="altura" value="" placeholder="Tu Altura En Metro" requerid ><br><br>
               <input type="submit"  class="btn btn-primary"" name="" value="CALCULAR">
              </form>


          <!--</div>-->
        </div>

        <div class="col-lg-6">
                <?php if(isset($imc )){   ?>
                 <?php echo "Tu I.M.C Es De ... ".round($imc, 2); ?>
                 <br>
                    <div style="color: <?php echo $color;?>">Resultado: <?php echo $resultado; ?></div>
                <?php } ?>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <div class="p-5">
            <img class="img-fluid rounded-circle" src="../imc-b/img/familia.jpg" alt="">
          </div>
        </div>
        <div class="col-lg-6">
          <div class="p-5">
            <h2 class="display-4">Pasos Para Cuidar Tu Salud!</h2>
            <p>Unos los problemas mas comunes es la obesidad, por lo que en unos pasos le diremos como cuidar de su salud:
                comer frutas y verduras, realizar ejercicios,seguir una dieta balanceada recomendada por un nutricionista,
                y siempre mantener una abierta  las recomendaciones que nos realize nuestro medico familiar.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Footer -->
  <footer class="py-5 bg-black">
    <div class="container">
      <p class="m-0 text-center text-white small">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
