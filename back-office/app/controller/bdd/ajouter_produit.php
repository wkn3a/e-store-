<?php

  if (!isset($_SESSION["user"])) {
    header ("Location: index?module=admin&action=login");
  } else {
    if (!($_SESSION["user"]["cus_id"] >= 1 && $_SESSION["user"]["cus_id"] <= 4)) {
      die ("Pas d'bol, pas admin !");
    }
  }
  
  include ("../app/model/produit/ajouter_produit.php");
  $ajouter_produit = ajouter_produit($_POST);
  
  if (isset($_POST["cat_id"])) {
    
    include ("../app/model/produit/select_dernier_produit.php");
    include ("../app/model/produit/ajouter_produit_categorie.php");
    $dernier_produit = select_dernier_produit();
    $size = count($_POST["cat_id"]);
    $i = 0;
    while ($i < $size) {
      $cat_id = $_POST["cat_id"][$i];
      $ajouter_produit_categorie = ajouter_produit_categorie($dernier_produit, $cat_id);
      ++$i;
    }
  }
  
  header ("Location: index?module=dashboard&action=produits&notif=ok");