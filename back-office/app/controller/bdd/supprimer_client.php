<?php

  if (!isset($_SESSION["user"])) {
    header ("Location: index.php?module=admin&action=login");
  } else {
    if (!($_SESSION["user"]["cus_id"] >= 1 && $_SESSION["user"]["cus_id"] <= 4)) {
      die ("Pas d'bol, pas admin !");
    }
  }
  
  if (isset($_POST["cus_id"])) {
    
    include ("../app/model/client/supprimer_client.php");
    $supprimer_client = supprimer_client($_POST["cus_id"]);
    
    header ("Location: index.php?module=dashboard&action=clients&notif=ok");  
  } else {
    header ("Location: index.php?module=dashboard&action=clients&notif=nok");
  }