<?php 

  if (!isset($_SESSION["user"])) {
    header ("Location: index?module=admin&action=login");
  } else {
    if (!($_SESSION["user"]["cus_id"] >= 1 && $_SESSION["user"]["cus_id"] <= 4)) {
      die ("Pas d'bol, pas admin !");
    }
  }
  
  include ("../app/model/paiement/afficher_paiements.php");
  $paiements = afficher_paiements();

  define ("PAGE_TITLE", "Dashboard Paiements");
  include ("../app/view/dashboard/paiements.php");