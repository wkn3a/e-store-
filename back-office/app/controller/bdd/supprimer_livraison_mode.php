<?php

  if (!isset($_SESSION["user"])) {
    header ("Location: index?module=admin&action=login");
  } else {
    if (!($_SESSION["user"]["cus_id"] >= 1 && $_SESSION["user"]["cus_id"] <= 4)) {
      die ("Pas d'bol, pas admin !");
    }
  }
  
  if (isset($_POST["typ_log_id"])) {
    
    include ("../app/model/livraison_mode/supprimer_livraison_mode.php");
    $supprimer_livraison_mode = supprimer_livraison_mode($_POST["typ_log_id"]);
    
    header ("Location: index?module=dashboard&action=livraison_modes&notif=ok");  
  } else {
    header ("Location: index?module=dashboard&action=livraison_modes&notif=nok");
  }