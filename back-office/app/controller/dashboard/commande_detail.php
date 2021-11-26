<?php 

  if (!isset($_SESSION["user"])) {
    header ("Location: index.php?module=admin&action=login");
  } else {
    if (!($_SESSION["user"]["cus_id"] >= 1 && $_SESSION["user"]["cus_id"] <= 4)) {
      die ("Pas d'bol, pas admin !");
    }
  }
  if (isset($_GET["ord_id"])) {
    
    include ("../app/model/commande/afficher_commande_details.php");
    $commande_details = afficher_commande_details($_GET["ord_id"]);
    
    define ("PAGE_TITLE", "Dashboard Commande détail");
    include ("../app/view/dashboard/commande_detail.php");
    
  } else {
    
    header ("Location: index.php?module=dashboard&action=commandes");
    
  }