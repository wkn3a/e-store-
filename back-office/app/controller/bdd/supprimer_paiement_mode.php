<?php

  if (!isset($_SESSION["user"])) {
    header ("Location: index?module=admin&action=login");
  } else {
    if (!($_SESSION["user"]["cus_id"] >= 1 && $_SESSION["user"]["cus_id"] <= 4)) {
      die ("Pas d'bol, pas admin !");
    }
  }
  
  if (isset($_POST["typ_pay_id"])) {
    
    include ("../app/model/paiement_mode/supprimer_paiement_mode.php");
    $supprimer_paiement_mode = supprimer_paiement_mode($_POST["typ_pay_id"]);
    
    header ("Location: index?module=dashboard&action=paiement_modes&notif=ok");  
  } else {
    header ("Location: index?module=dashboard&action=paiement_modes&notif=nok");
  }