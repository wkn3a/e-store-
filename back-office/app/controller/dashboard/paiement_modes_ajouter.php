<?php

  if (!isset($_SESSION["user"])) {
    header ("Location: index?module=admin&action=login");
  } else {
    if (!($_SESSION["user"]["cus_id"] >= 1 && $_SESSION["user"]["cus_id"] <= 4)) {
      die ("Pas d'bol, pas admin !");
    }
  }
  
  define ("PAGE_TITLE", "Dashboard Ajouter mode de paiement");
  include ("../app/view/dashboard/paiement_modes_ajout.php");