<?php 

  if (!isset($_SESSION["user"])) {
    header ("Location: index.php?module=admin&action=login");
  } else {
    if (!($_SESSION["user"]["cus_id"] >= 1 && $_SESSION["user"]["cus_id"] <= 4)) {
      die ("Pas d'bol, pas admin !");
    }
  }
  
  include ("../app/model/produit/afficher_produit_detail.php");
  $produit = afficher_produit_detail($_GET["id"]);
  
  include ("../app/model/categorie/select_categories.php");
  $categories = select_categories();
  
  include ("../app/model/produit/select_produit_categories.php");
  $produit_categories = select_produit_categories($_GET["id"]);
  
  define ("PAGE_TITLE", "Dashboard modifier produit");
  include ("../app/view/dashboard/produits_modif.php");