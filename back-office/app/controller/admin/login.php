<?php

  if ($_SERVER["REQUEST_METHOD"] == "GET") {
  
    define ("PAGE_TITLE", "Se connecter");
    include ("../app/view/admin/login.php");

  } else {
    
    include ("../app/model/admin/login.php");
    
    $admin = login($_POST["cus_mail"], md5($_POST["cus_password"]));
    if ($admin) {
      $_SESSION["user"] = $admin;
      header ("Location: index?notif=ok");
    } else {
      die ("Pas d'bol toto, pas admin !");
    }
  }