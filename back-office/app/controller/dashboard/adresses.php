<?php 

  if (!isset($_SESSION["user"])) {
    header ("Location: index?module=admin&action=login");
  } else {
    if (!($_SESSION["user"]["cus_id"] >= 1 && $_SESSION["user"]["cus_id"] <= 4)) {
      die ("Pas d'bol, pas admin !");
    }
  }
  
  include ("../app/model/adresse/afficher_adresses.php");
  $adresses = afficher_adresses();

  define ("PAGE_TITLE", "Dashboard Adresses");
  include ("../app/view/dashboard/adresses.php");