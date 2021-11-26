<?php

  if (!isset($_SESSION["user"])) {
    header ("Location: index.php?module=admin&action=login");
  } else {
    if (!($_SESSION["user"]["cus_id"] >= 1 && $_SESSION["user"]["cus_id"] <= 4)) {
      die ("Pas d'bol, pas admin !");
    }
  }
  
  if (isset($_POST["ord_id"])) {
    
    include ("../app/model/commande/supprimer_paiement.php");
    $supprimer_paiement = supprimer_paiement($_POST["ord_id"]);
    
    include ("../app/model/commande/supprimer_commande_detail.php");
    $supprimer_commande_detail = supprimer_commande_detail($_POST["ord_id"]);
    
    include ("../app/model/commande/supprimer_commande.php");
    $supprimer_commande = supprimer_commande($_POST["ord_id"]);
    
    header ("Location: index.php?module=dashboard&action=commandes&notif=ok");  
  } else {
    header ("Location: index.php?module=dashboard&action=commandes&notif=nok");
  }