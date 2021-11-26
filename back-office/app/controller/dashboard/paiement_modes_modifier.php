<?php 

  if (!isset($_SESSION["user"])) {
    header ("Location: index.php?module=admin&action=login");
  } else {
    if (!($_SESSION["user"]["cus_id"] >= 1 && $_SESSION["user"]["cus_id"] <= 4)) {
      die ("Pas d'bol, pas admin !");
    }
  }
  
  include ("../app/model/paiement_mode/afficher_paiement_mode.php");
  $paiement_mode = afficher_paiement_mode($_GET["id"]);
  
  define ("PAGE_TITLE", "Dashboard modifier mode de paiement");
  include ("../app/view/dashboard/paiement_modes_modif.php");