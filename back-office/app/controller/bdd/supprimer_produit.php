<?php

  if (!isset($_SESSION["user"])) {
    header ("Location: index?module=admin&action=login");
  } else {
    if (!($_SESSION["user"]["cus_id"] >= 1 && $_SESSION["user"]["cus_id"] <= 4)) {
      die ("Pas d'bol, pas admin !");
    }
  }
  
  if (isset($_POST["pro_id"])) {
    
    include ("../app/model/produit/supprimer_produit_categories.php");
    $supprimer_produit_categories = supprimer_produit_categories($_POST["pro_id"]);
    
    include ("../app/model/produit/supprimer_produit.php");
    $supprimer_produit = supprimer_produit($_POST["pro_id"]);
    
    header ("Location: index?module=dashboard&action=produits&notif=ok");  
  } else {
    header ("Location: index?module=dashboard&action=produits&notif=nok");
  }