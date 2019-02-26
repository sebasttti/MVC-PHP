<?php

class ajaxModelo{
  private $db;

  public function __construct(){
    $this->db = new Database('curso_php_ajax');
  }

  public function leerdatos(){
    $this->db->query('SELECT * from usuarios');
    $resultados = $this->db->responseAll();
    return $resultados;
  }

  public function agregardatos($datos){
    //error_reporting(0);
    $response = "";

    $this->db->query("INSERT INTO usuarios (nombre,edad,pais,correo) values (:nombre,:edad,:pais,:correo)");

    $this->db->bind(':nombre',$datos['nombre']);
    $this->db->bind(':edad',$datos['edad']);
    $this->db->bind(':pais',$datos['pais']);
    $this->db->bind(':correo',$datos['correo']);

     if ($this->db->execute()) {
         return $response=['exito'=>'exito'];
      }else {
        return $response=['error'=>'error'];
     }

    // $response = [
    //     'nombre' => $datos['nombre'],
    //     'edad' => $datos['edad'],
    //     'pais' => $datos['pais'],
    //     'correo' => $datos['correo']
    // ];
    //
    // return $response;
  }

}


 ?>
