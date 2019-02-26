<?php

  if  (!isset($data['titulo'])) {
    $data['titulo'] = "POR FAVOR INGRESA EL TÍTULO!!!!!!";
  }

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo URL_PATH."/css/master.css";?>">
  <title><?php echo SITE_NAME; ?></title>
</head>
<body>

<div class="container">
<div class="encabezado">
    <h2 style=""><?php echo $data['titulo']; ?></h2>
    <div class="opciones">
        <a href="<?php echo URL_PATH.'pages/agregar'?>" id ="a.agregar">Agregar Nombre</a>
    </div>
</div>
