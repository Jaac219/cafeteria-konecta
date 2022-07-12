<?php 
  require_once("controller.php");

  class Product extends Controller{
    private $_modelProduct;
    function __construct(){
      $this->_modelProduct = $this->loadModel('mdlProduct');
    }
    
    function getAllProducts(){
      echo json_encode($this->_modelProduct->index());
    }

    function create(){
      $this->_modelProduct->__SET("_name", $_POST["name"]);
      $this->_modelProduct->__SET("_category", $_POST["category"]);
      $this->_modelProduct->__SET("_price", $_POST["price"]);
      $this->_modelProduct->__SET("_weight", $_POST["weight"]);
      $this->_modelProduct->__SET("_reference", strtoupper($_POST["reference"]));
      $this->_modelProduct->__SET("_stock", $_POST["stock"]);

      $this->_modelProduct->create();
      echo'<script type="text/javascript">window.location.href="'.$_POST["baseUrl"].'/register";</script>';
    }
    
    function delete(){
      $this->_modelProduct->__SET("_id", $_POST["id"]);
      echo json_encode($this->_modelProduct->delete());
    }

    function update(){
      $this->_modelProduct->__SET("_id", $_POST["idEdit"]);
      $this->_modelProduct->__SET("_name", $_POST["name"]);
      $this->_modelProduct->__SET("_category", $_POST["category"]);
      $this->_modelProduct->__SET("_price", $_POST["price"]);
      $this->_modelProduct->__SET("_weight", $_POST["weight"]);
      $this->_modelProduct->__SET("_reference", strtoupper($_POST["reference"]));
      $this->_modelProduct->__SET("_stock", $_POST["stock"]);

      $this->_modelProduct->update();
      echo'<script type="text/javascript">window.location.href="'.$_POST["baseUrl"].'/home";</script>';
    }
  }


  $ctrProduct = new Product();
  if (isset($_POST["btnRegister"])) { $ctrProduct->create(); }
  else if (isset($_GET["get"])) { $ctrProduct->getAllProducts(); }
  else if (isset($_POST["id"])) { $ctrProduct->delete(); }
  else if (isset($_POST["idEdit"])) { $ctrProduct->update(); }
