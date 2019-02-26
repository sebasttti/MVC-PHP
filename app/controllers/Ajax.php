<?php

class Ajax extends Controller{

  public function __construct(){
    $this->modelo = $this->model('ajaxModelo');
  }

  public function index(){ //este es el metodo que carga la pagina

    $data = [];
    $this->view('pages/ajax.view',$data); //esta es la funcion heredada que carga la pagina
  }

  public function leerdatos(){
    //header('Content-type:application/json; charset=utf-8');
    $datos = $this->modelo->leerdatos();
    echo $datos = json_encode($datos);
  }

  public function agregardatos(){

    //error_reporting(0);

     if ($_SERVER['REQUEST_METHOD']=='POST') {
         $datos=[
             'nombre' => $_POST['nombre'],
             'edad' => $_POST['edad'],
             'pais' => $_POST['pais'],
             'correo' => $_POST['correo']
         ];
         $respuesta = $this->modelo->agregardatos($datos);
         echo json_encode($respuesta);
     }



  }

}

 ?>
