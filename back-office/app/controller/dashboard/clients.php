<?php 

  if (!isset($_SESSION["user"])) {
    header ("Location: index.php?module=admin&action=login");
  } else {
    if (!($_SESSION["user"]["cus_id"] >= 1 && $_SESSION["user"]["cus_id"] <= 4)) {
      die ("Pas d'bol, pas admin !");
    }
  }
  
  include ("../app/model/client/afficher_clients.php");
  $clients = afficher_clients();
  
  define ("PAGE_TITLE", "Dashboard Clients");
  include ("../app/view/dashboard/clients.php");