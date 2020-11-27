<?php

  if (!isset($_SESSION["user"])) {
    header ("Location: index?module=admin&action=login");
  } else {
    if (!($_SESSION["user"]["cus_id"] >= 1 && $_SESSION["user"]["cus_id"] <= 4)) {
      die ("Pas d'bol, pas admin !");
    }
  }
  
  include ("../app/model/livraison_mode/ajouter_livraison_mode.php");
  $ajouter_livraison_mode = ajouter_livraison_mode($_POST);
  
  header ("Location: index?module=dashboard&action=livraison_modes&notif=ok");