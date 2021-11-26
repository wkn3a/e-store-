<?php 

  if (!isset($_SESSION["user"])) {
    header ("Location: index.php?module=admin&action=login");
  } else {
    if (!($_SESSION["user"]["cus_id"] >= 1 && $_SESSION["user"]["cus_id"] <= 4)) {
      die ("Pas d'bol, pas admin !");
    }
  }
  
  include ("../app/model/produit/afficher_produits.php");
  $produits = afficher_produits();

  include ("../app/model/produit/afficher_produit_categories.php");

  define ("PAGE_TITLE", "Dashboard Produits");
  include ("../app/view/dashboard/produits.php");