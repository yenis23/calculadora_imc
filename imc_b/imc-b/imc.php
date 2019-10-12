<?php

if(isset($_POST['peso']) && isset ($_POST['altura']) &&  is_numeric($_POST['peso'] && is_numeric($_POST['altura']))){
    $peso = $_POST['peso'];
    $altura = $_POST['altura'];

    $_imc=$peso/($altura*$altura);
    echo round ($imc,2);

    if ($imc <18.5){
        $resultado ="Peso Inferior Al Normal";
        $color ="orange";
    }
    if ($imc >=18.5 && imc <24.9 ){
        $resultado ="Normal";
        $color ="green";
    }
    if ($imc >=24.9 && imc <29.9 ){
        $resultado ="Peso Superior Al Normal";
        $color ="blue";
    }
    if ($imc >30){
        $resultado ="Obesidad";
        $color ="red";
    }
}
 
?>
<!DOCTYPE html>
<html lang="en"- dir = "ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>calculadora imc</title>
</head>
<body>
   <h2>CALCULADORA IMC</h2>
   <h3> No Es Belleza, Es Salud !</h3>
   <br><br>
   <form class="" action="imc.php" method="POST">
   PESO (KG) <br> <input type="number" step=".01" name="peso" value="" placeholder="Tu Peso En Kilogramos"required ><br><br>
   ALTURA (M) <br> <input type="number" step=".01"  name="altura" value="" placeholder="Tu Altura En Metro" requerid ><br><br>
    <input type="submit" name="" value="CALCULAR">
   </form>
   <?php if(isset($imc )){   ?>
    <?php echo ]"Tu I.M.C Es De ... ".$imc; ?>
    <br>
    <div style="color: <?php echo $color;?>">Resultado:<? echo $Resultado ?></div>
   <?php } ?>

</body>
</html> 