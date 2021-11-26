<?php 

  if (!isset($_SESSION["user"])) {
    header ("Location: index.php?module=admin&action=login");
  } else {
    if (!($_SESSION["user"]["cus_id"] >= 1 && $_SESSION["user"]["cus_id"] <= 4)) {
      die ("Pas d'bol, pas admin !");
    }
  }
  if (isset($_GET["cus_id"])) {
    
    include ("../app/model/commande/afficher_commandes_client.php");
    $commandes_client = afficher_commandes_client($_GET["cus_id"]);
    
    define ("PAGE_TITLE", "Dashboard Commandes client");
    include ("../app/view/dashboard/commandes_client.php");
    
  } else {
    
    include ("../app/model/commande/afficher_commandes.php");
    $commandes = afficher_commandes();

    define ("PAGE_TITLE", "Dashboard Commandes");
    include ("../app/view/dashboard/commandes.php");
  }