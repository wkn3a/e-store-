<?php 

  if (!isset($_SESSION["user"])) {
    header ("Location: index?module=admin&action=login");
  } else {
    if (!($_SESSION["user"]["cus_id"] >= 1 && $_SESSION["user"]["cus_id"] <= 4)) {
      die ("Pas d'bol, pas admin !");
    }
  }
  
  include ("../app/model/panier/afficher_paniers.php");
  $paniers = afficher_paniers();

  define ("PAGE_TITLE", "Dashboard Paniers");
  include ("../app/view/dashboard/paniers.php");