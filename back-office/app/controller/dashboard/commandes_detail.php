<?php 

  if (!isset($_SESSION["user"])) {
    header ("Location: index.php?module=admin&action=login");
  } else {
    if (!($_SESSION["user"]["cus_id"] >= 1 && $_SESSION["user"]["cus_id"] <= 4)) {
      die ("Pas d'bol, pas admin !");
    }
  }
  
  include ("../app/model/commande/afficher_commandes_detail.php");
  $commandes = afficher_commandes_detail();

  define ("PAGE_TITLE", "Dashboard Commandes en détail");
  include ("../app/view/dashboard/commandes_detail.php");