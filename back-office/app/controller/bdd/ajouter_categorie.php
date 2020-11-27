<?php

  if (!isset($_SESSION["user"])) {
    header ("Location: index?module=admin&action=login");
  } else {
    if (!($_SESSION["user"]["cus_id"] >= 1 && $_SESSION["user"]["cus_id"] <= 4)) {
      die ("Pas d'bol, pas admin !");
    }
  }
  
  include ("../app/model/categorie/ajouter_categorie.php");
  $ajouter_categorie = ajouter_categorie($_POST);
  
  header ("Location: index?module=dashboard&action=categories&notif=ok");