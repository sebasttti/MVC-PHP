<?php

class Usuario{
  private $db;

  public function __construct(){
    $this->db = new Database;
  }

  public function obtenerUsuario(){
    $this->db->query('SELECT * from usuarios');
    $resultados = $this->db->responseAll();
    return $resultados;
  }

  public function agregarUsuario($datos){
    $this->db->query("INSERT INTO usuarios (nombre_usuario,email_usuario,telefono_usuario) values (:nombre,:email,:telefono)");
    $this->db->bind(':nombre',$datos['nombre']);
    $this->db->bind(':email',$datos['email']);
    $this->db->bind(':telefono',$datos['telefono']);

    if ($this->db->execute()) {
         return true;
     }else {
         return false;
    }



    }
}


 ?>
