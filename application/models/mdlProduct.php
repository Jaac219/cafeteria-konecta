<?php

class mdlProduct {
  private $_db;

  private $_id;
  private $_name;
  private $_category;
  private $_price;
  private $_weight;
  private $_reference;
  private $_stock;

  private $_amount;

  public function __construct($db){
    $this->_db = $db;
  }

  public function __GET($atributo){
    return $this->$atributo;
  }

  public function __SET($atributo, $valor){
    $this->$atributo = $this->_db->real_escape_string($valor);
  }

  public function index(){
    $result = $this->_db->query("SELECT * FROM productos");
    $arr = [];
    while($row = $result->fetch_assoc()){
      $arr[] = $row;
    }
    return $arr;
  }

  public function create(){
    $sql = "INSERT INTO productos (nombre, categoria, referencia, precio, peso, stock, fecha_creacion) VALUES ('$this->_name', '$this->_category', '$this->_reference', '$this->_price', '$this->_weight', '$this->_stock', now())";
    $res = $this->_db->query($sql);

    if ($res>0) {
      echo'<script type="text/javascript">
        alert("Registro exitoso");
        </script>';
    }else{
      echo'<script type="text/javascript">
      alert("Error al regisgtrar");
      </script>';
    }
  }

  public function update(){
    $sql = "UPDATE productos SET nombre='$this->_name', categoria='$this->_category', referencia='$this->_reference', precio='$this->_price', peso='$this->_weight',  stock='$this->_stock'  WHERE id=".$this->_id;
    if ($this->_db->query($sql) === TRUE){
      echo'<script type="text/javascript">
        alert("Producto modificado correctamente");
        </script>';
    }else {
      echo'<script type="text/javascript">
      alert("Error al modificar el producto");
      </script>';
    }
  }

  public function delete(){
    $sql = "DELETE FROM productos WHERE id=".$this->_id;
    if ($this->_db->query($sql) === TRUE) return true;
    else return false;
  }

  public function changeStock(){
    $sql = "UPDATE productos SET stock = stock - $this->_amount  WHERE id=".$this->_id;
    if ($this->_db->query($sql) === TRUE){
      echo 'Cambio de stock exitoso';
    }else {
      echo 'Error en el registro';
    }
  }
}