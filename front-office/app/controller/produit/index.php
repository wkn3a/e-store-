<?php

  if (isset($_GET["id"])) {
    
    include ("../app/model/produit/lire_nb_produits_par_categorie.php");
    include ("../app/model/produit/afficher_produits_par_categorie.php");
    
    $nb = lire_nb_produits_par_categorie($_GET["id"]);
    $pages = ceil($nb / CATEGORY_PRODUCTS_PER_PAGE);
    
    if (isset($_GET["page"])) {
      
      $page = $_GET["page"];
      
      if ($page > $pages) {
        $page = $pages;
      }
      if ($page <= 0) {
        $page = 1;
      }
      
    } else {
      $page = 1;
    }
    
    $offset = ($page - 1) * CATEGORY_PRODUCTS_PER_PAGE;
    $produits = afficher_produits_par_categorie(($_GET["id"]), $offset, CATEGORY_PRODUCTS_PER_PAGE);
    
  } else {
    
    include ("../app/model/produit/lire_nb_produits.php");
    include ("../app/model/produit/afficher_produits.php");
    
    $nb = lire_nb_produits();
    $pages = ceil($nb / PRODUCTS_PER_PAGE);
        if (isset($_GET["page"])) {
      $page = $_GET["page"];
      if ($page > $pages) {
        $page = $pages;
      }
      if ($page <= 0) {
        $page = 1;
      }
    } else {
      $page = 1;
    }
    
    $offset = ($page - 1) * PRODUCTS_PER_PAGE;
    $produits = afficher_produits($offset, PRODUCTS_PER_PAGE);
  }
  
  if (isset($_GET['cus_id']) && isset($_GET['pro_id']) && isset($_SESSION ['user'])) {
    
    include ("../app/model/commande/shop-cart.php");
    $paniers = afficher_panier($_SESSION["user"]["cus_id"]);
    $verif_cad = array_search($_GET['pro_id'], array_column($paniers, 'pro_id'));
   
    if ($verif_cad >= 0) {
      
      include ("../app/model/commande/ajout_un_produit_dup.php");
      $ajout_produit_dup = ajout_un_produit_dup($_GET['cus_id'], $_GET['pro_id']);
      
      header ("Location: index?module=produit&action=index&page=" . $_GET['page'] . "&notif=ok_one_pro_dup");
    }
    
    if ($verif_cad === false) {
      
      include ("../app/model/commande/ajout_un_produit.php");
      $ajout_produit = ajout_un_produit($_GET['cus_id'], $_GET['pro_id']); 

      header ("Location: index?module=produit&action=index&page=" . $_GET['page'] . "&notif=ok_one_pro");
    }
    
  } else if (isset($_GET['cus_id']) && isset($_GET['pro_id']) && !$_SESSION['user']) {
    
    header ("Location: index?module=utilisateur&action=login&notif=nok_nolog");
  }

  define ("PAGE_TITLE", "Produits");
  include ("../app/view/produit/index.php");