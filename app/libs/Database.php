<?php

class Database{
  private $host = DB_HOST;
  private $user = DB_USER;
  private $password = DB_PASSWORD;
  private $db_name = DB_NAME;

  private $dbh;
  private $stmt;
  private $error;

  public function __construct($alternate_db = null){

      if ($alternate_db !== null) {
          $this->db_name = $alternate_db;
      }

      //configurar conexion
      $dsn = "mysql:host=$this->host;dbname=$this->db_name";
      $options = [
        PDO::ATTR_PERSISTENT => true,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
      ];

      try {
          $this->dbh = new PDO($dsn,$this->user,$this->password,$options);
          $this->dbh->exec('set names utf8');

      } catch (PDOException $e) {
          $this->error = $e->getMessage();
          echo $this->error;
      }

  }

  //preparar consulta
  public function query($sql){
      $this->stmt=$this->dbh->prepare($sql);
  }

  //unir valores
  public function bind($parametro,$valor,$tipo=null){

      if (is_null($tipo)) {
         switch (true) {
             case is_int($valor):
                $tipo=PDO::PARAM_INT;
             break;
             case is_bool($valor):
                $tipo=PDO::PARAM_BOOL;
             break;
             case is_null($valor):
                $tipo=PDO::PARAM_NULL;
             break;
             default:
                $tipo=PDO::PARAM_STR;
             break;
         }
      }

      $this->stmt->bindValue($parametro,$valor,$tipo);

  }

  //ejecutar instruccion
  public function execute(){
    return $this->stmt->execute();
  }

  //obtener los registros de la consulta
  public function responseAll(){
      $this->execute();
      return $this->stmt->fetchAll(PDO::FETCH_OBJ);
  }

  //obtener los registro de la consulta
  public function responseUnique(){
      $this->execute();
      return $this->stmt->fetch(PDO::FETCH_OBJ);
  }

  //obtener cantidad de registros
  public function rowsCount(){
      $this->execute();
      return $this->stmt->rowCount();
  }
}


 ?>
