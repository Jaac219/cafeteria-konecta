<?php

// permite extraer la informacion de la url a la que se esta accediendo
$ssl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://");
$uri = $_SERVER['REQUEST_URI'];
$uriParts = explode('/', $uri);
array_shift($uriParts);
//----------------------------------------------------------------------

$baseUrl = $ssl.$_SERVER["HTTP_HOST"]."/".$uriParts[0];

require_once('./application/controllers/template.php');
$bodyContent = "";

if($uriParts[1] == ""){
  header("Location: ".$baseUrl."/home");
  exit();
}else if ($uriParts[1] != "app" && count($uriParts) <= 2 && file_exists("application/views/".$uriParts[1].".php")) {
  $bodyContent = new Template("application/views/".$uriParts[1].".php", $baseUrl);
}else{
  header("Location: ".$baseUrl."/error404");
  exit();
}

include("application/views/app.php");