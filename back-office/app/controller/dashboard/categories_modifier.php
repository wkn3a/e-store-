<?php 

  if (!isset($_SESSION["user"])) {
    header ("Location: index.php?module=admin&action=login");
  } else {
    if (!($_SESSION["user"]["cus_id"] >= 1 && $_SESSION["user"]["cus_id"] <= 4)) {
      die ("Pas d'bol, pas admin !");
    }
  }
  
  include ("../app/model/categorie/afficher_categorie.php");
  $categorie = afficher_categorie($_GET["id"]);
  
  define ("PAGE_TITLE", "Dashboard modifier catégorie");
  include ("../app/view/dashboard/categories_modif.php");