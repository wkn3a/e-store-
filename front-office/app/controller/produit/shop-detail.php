<?php

  if (isset($_GET["id"])) {
    
    if (isset($_SESSION["user"])) {
      
      include ("../app/model/produit/afficher_produit_qt.php");
      $qt = afficher_produit_qt($_SESSION["user"]["cus_id"],$_GET["id"]);
    }
    
    include ("../app/model/produit/afficher_produit_detail.php");
    $produit = afficher_produit_detail($_GET["id"]);
    
    include ("../app/model/produit/afficher_produit_categories.php");
    $categories_produit = afficher_produit_categories($_GET["id"]);
    
    if (in_array($_GET["id"], $produit)) {
      
      define ("PAGE_TITLE", "Produit détaillé");
      include ("../app/view/produit/shop-detail.php");
      
    } else {
      
      header ("Location: index.php?module=404&action=index");
    }
    
  } else if (isset($_SESSION["user"]["cus_id"] )) {
    
    include ("../app/model/commande/shop-cart.php");
    $paniers = afficher_panier($_SESSION["user"]["cus_id"]);
    $verif_cad = array_search($_POST['pro_id'], array_column($paniers, 'pro_id'));

    if (isset($_POST['cus_id']) && $verif_cad >= 0) {
      
      include ("../app/model/commande/modif_produits.php");
      $modif_produits = modif_produits($_POST['cus_id'], $_POST['pro_id'], $_POST['cad_qt']);
      
      header ("Location: index.php?module=produit&action=index&notif=ok_modif");
    }
    
    if (isset($_POST['cus_id']) && !$verif_cad) {
      
      include ("../app/model/commande/ajout_produits.php");
      $ajout_produit = ajout_produits($_POST);

      header ("Location: index.php?module=produit&action=index&notif=ok_ajout");
    }
  } else {
    
    header ("Location: index.php?module=utilisateur&action=register");
  }