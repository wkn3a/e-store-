<?php 

  if (!isset($_SESSION["user"])) {
    header ("Location: index?module=admin&action=login");
  } else {
    if (!($_SESSION["user"]["cus_id"] >= 1 && $_SESSION["user"]["cus_id"] <= 4)) {
      die ("Pas d'bol, pas admin !");
    }
  }
  
  include ("../app/model/livraison_mode/afficher_livraison_mode.php");
  $livraison_mode = afficher_livraison_mode($_GET["id"]);
  
  define ("PAGE_TITLE", "Dashboard modifier mode de livraison");
  include ("../app/view/dashboard/livraison_modes_modif.php");