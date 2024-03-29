<?php

  session_start();
  
  include ("../app/config/config.inc.php");
  include ("../core/pdo.inc.php");

  if (!isset($_GET["module"])) {
    $module = DEFAULT_MODULE;
  } else {
    $module = $_GET["module"];
  }
  
  if (!isset($_GET["action"])) {
    $action = DEFAULT_ACTION;
  } else {
    $action = $_GET["action"];
  }
  
  $file = "../app/controller/" . $module . "/" . $action . ".php";
  if (file_exists($file)) {
    include ($file);
  } else {
    header ("Location: index.php?module=404&action=index");
  }