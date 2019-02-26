<?php

//se encarga de poder cargar los modelos y las vistas

class Controller{
    //cargar controlador
    public function model($model){
      require_once '../app/models/'.$model.'.php';
      //instanciar el modelo
      return new $model;
    }

    //cargar vista
    public function view($view,$data=[]){
      //chequear si la vista existe
      if (file_exists('../app/views/'.$view.'.php')) {
          require_once('../app/views/'.$view.'.php');
      }else{
        //si el archivo no existe imprima un error
        die('la vista no existe');
      }
    }
}

 ?>
