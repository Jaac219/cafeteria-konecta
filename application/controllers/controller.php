<?php
  class Controller{
    //Modificar esta informacion con los datos de mySql en el que se vaya a usar 
    private $DB_HOST = "127.0.0.1";
    private $DB_USER = "root";
    private $DB_PASS = "";
    private $DB_NAME = "cafeteria";
    // -------------------------------------------------------------------------

    public $db = null;
    public $model = null;

    function __construct(){}

    private function openDatabaseConnection(){
      $this->db = new mysqli($this->DB_HOST, $this->DB_USER, $this->DB_PASS, $this->DB_NAME);
      if ($this->db->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $this->db->connect_errno . ") " . $this->db->connect_error;
      }
    }

    public function loadModel($modelo){
      $this->openDatabaseConnection();
      require "../models/$modelo.php";
      return new $modelo($this->db);
    }
  }