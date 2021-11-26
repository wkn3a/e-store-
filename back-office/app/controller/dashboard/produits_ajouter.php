<?php

  if (!isset($_SESSION["user"])) {
    header ("Location: index.php?module=admin&action=login");
  } else {
    if (!($_SESSION["user"]["cus_id"] >= 1 && $_SESSION["user"]["cus_id"] <= 4)) {
      die ("Pas d'bol, pas admin !");
    }
  }
  
  include ("../app/model/categorie/select_categories.php");
  $categories = select_categories();
  
  define ("PAGE_TITLE", "Dashboard Ajouter produit");
  include ("../app/view/dashboard/produits_ajout.php");