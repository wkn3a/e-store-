<?php 

  if (!isset($_SESSION["user"])) {
    header ("Location: index.php?module=admin&action=login");
  } else {
    if (!($_SESSION["user"]["cus_id"] >= 1 && $_SESSION["user"]["cus_id"] <= 4)) {
      die ("Pas d'bol, pas admin !");
    }
  }
  
  include ("../app/model/categorie/afficher_categories.php");
  $categories = afficher_categories();

  define ("PAGE_TITLE", "Dashboard Catégories");
  include ("../app/view/dashboard/categories.php");