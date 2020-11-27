<?php

  if (!isset($_SESSION["user"])) {
    header ("Location: index?module=admin&action=login");
  } else {
    if (!($_SESSION["user"]["cus_id"] >= 1 && $_SESSION["user"]["cus_id"] <= 4)) {
      die ("Pas d'bol, pas admin !");
    }
  }
  
  if (isset($_POST["pro_id"])) {
    
    include ("../app/model/produit/modifier_produit.php");
    $modifier_produit = modifier_produit($_POST);
    
    include ("../app/model/produit/modifier_produit_categories_supprimer.php");
    $modifier_produit_categories_supprimer = modifier_produit_categories_supprimer($_POST);
    
    if (isset($_POST["cat_id"])) {
      
      include ("../app/model/produit/modifier_produit_categorie_ajouter.php");
      $size = count($_POST["cat_id"]);
      $i = 0;
      while ($i < $size) {
        $cat_id = $_POST["cat_id"][$i];
        $modifier_produit_categorie_ajouter = modifier_produit_categorie_ajouter($_POST, $cat_id);
        ++$i;
      }
    }
      
    header ("Location: index?module=dashboard&action=produits&notif=ok");
    
  } else {
    header ("Location: index?module=dashboard&action=produits&notif=nok");
  }