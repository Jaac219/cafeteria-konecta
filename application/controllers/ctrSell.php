<?php 
require_once("controller.php");

class Sell extends Controller{
  private $_modelSell;
  private $_modelProduct;

  function __construct(){
    $this->_modelSell = $this->loadModel('mdlSell');
    $this->_modelProduct = $this->loadModel('mdlProduct');
  }

  function create(){
    $this->_modelSell->__SET("_productId", $_POST["id"]);
    $this->_modelSell->__SET("_amount", $_POST["cant"]);
    $this->_modelSell->__SET("_total", $_POST["total"]);
    
    $this->_modelSell->create();
    
    $this->_modelProduct->__SET("_id", $_POST["id"]);
    $this->_modelProduct->__SET("_amount", $_POST["cant"]);
    $this->_modelProduct->changeStock();
    echo'<script type="text/javascript">window.location.href="'.$_POST["baseUrl"].'/home";</script>';
  }

  function getAllSells(){
    echo json_encode($this->_modelSell->index());
  }
}


$ctrSell = new Sell();
if (isset($_POST["id"])) { $ctrSell->create(); }
else if (isset($_GET["get"])) { $ctrSell->getAllSells(); }