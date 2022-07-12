<?php

class mdlSell {
  private $_db;

  private $_id;
  private $_productId;
  private $_amount;
  private $_total;

  public function __construct($db){
    $this->_db = $db;
  }

  public function __GET($atributo){
    return $this->$atributo;
  }

  public function __SET($atributo, $valor){
    $this->$atributo = $this->_db->real_escape_string($valor);
  }

  public function create(){
    $sql = "INSERT INTO ventas (cantidad, valor_total, fecha, id_producto) VALUES ('$this->_amount', '$this->_total', now(), '$this->_productId')";
    $res = $this->_db->query($sql);

    if ($res>0) {
      echo'<script type="text/javascript">
        alert("Registro de venta exitoso");
        </script>';
    }else{
      echo'<script type="text/javascript">
      alert("Error al regisgtrar la venta");
      </script>';
    }
  }

  public function index(){
    $sql = "SELECT ventas.*, productos.nombre, productos.referencia FROM ventas INNER JOIN productos ON ventas.id_producto=productos.id ORDER BY ventas.fecha DESC";
    $result = $this->_db->query($sql);
    $arr = [];
    while($row = $result->fetch_assoc()){
      $arr[] = $row;
    }
    return $arr;
  }
}