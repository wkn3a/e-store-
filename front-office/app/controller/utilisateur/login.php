<?php

  if ($_SERVER["REQUEST_METHOD"] == "GET") {
    
    define ("PAGE_TITLE", "Se connecter");
    include ("../app/view/utilisateur/login.php");

  } else {
    
    include ("../app/model/utilisateur/verif_login.php");
    $user = verif_login($_POST["cus_mail"], md5($_POST["cus_password"]));
    
    if ($user) {
      
      $_SESSION["user"] = $user;
      
      header ("Location: index?notif=logok");
      
    } else {
      
      header ("Location: index?module=utilisateur&action=login&notif=lognok");
    }
  }