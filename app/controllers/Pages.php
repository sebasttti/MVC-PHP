<?php

class Pages extends Controller{

      public function __construct(){
        $this->usuarioModelo = $this->model('Usuario');
      }

      public function index(){ //este es el metodo que carga la pagina

        //obtener los usuarios
        $usuarios = $this->usuarioModelo->obtenerUsuario();

        $data = [
          'titulo' => "Página inicial de mi proyecto",
          'usuarios' => $usuarios
        ];
        $this->view('pages/inicio',$data); //esta es la funcion heredada que carga la pagina
      }

      Public function agregar(){

      $data = [
        'titulo' => 'Agregar un nuevo Usuario',
        'nombre' => '',
        'email' => '',
        'telefono' => ''
      ];

          if ($_SERVER['REQUEST_METHOD']=='POST') {

              $data['nombre'] = trim($_POST['nombre']);
              $data['email'] = trim($_POST['email']);
              $data['telefono'] = trim($_POST['telefono']);


                   if ($this->usuarioModelo->agregarUsuario($data)) {
                       $data['verificacion'] = 'success';
                       $data['mensaje'] = 'Usuario agregado satisfactoriamente';
                        //   redirect('pages');
                       }else{
                       $data['verificacion'] = 'danger';
                       $data['mensaje'] = 'Existió un problema al agregar el usuario';
                     }
          }
      //====================================
      $this->view('pages/agregar',$data);
      }
}

 ?>
