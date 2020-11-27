<?php

  if (!isset($_SESSION["user"])) {
    header ("Location: index?module=admin&action=login");
  } else {
    if (!($_SESSION["user"]["cus_id"] >= 1 && $_SESSION["user"]["cus_id"] <= 4)) {
      die ("Pas d'bol, pas admin !");
    }
  }
  
  if (isset($_POST["cat_id"])) {
    
    include ("../app/model/categorie/modifier_categorie.php");
    $modifier_categorie = modifier_categorie($_POST);
    
    header ("Location: index?module=dashboard&action=categories&notif=ok");
    
  } else {
    header ("Location: index?module=dashboard&action=categories&notif=nok");
  }