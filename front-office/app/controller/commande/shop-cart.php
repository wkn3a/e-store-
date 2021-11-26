<?php

  if ($_SERVER["REQUEST_METHOD"] == "GET") {
    
    if (!isset($_SESSION["user"])) {

        header ("Location: index.php?module=utilisateur&action=login");
      }

    if (isset($_SESSION["user"])) {
      
      include ("../app/model/commande/shop-cart.php");
      $paniers = afficher_panier($_SESSION["user"]["cus_id"]);
    
      foreach ($paniers as $key => $panier) {
        
        $paniers[$key]['pro_price'] = $panier['pro_price'] ." €";
        $paniers[$key]['total'] = (float)$panier['pro_price'] * (float)$panier['cad_qt'] . " €";
      }
      
      $sum = array_sum(array_column($paniers, 'total'));
      $prixtotal  = sprintf('%.2f',$sum);
      
      include ("../app/model/commande/quantiteshop-cart.php");
      $qt = qt_total();
    }
    
    if (isset($_GET['cus_id']) && isset($_GET['pro_id'])) {

      include ("../app/model/commande/produit_supp.php");
      $supp = produit_supp($_GET['cus_id'], $_GET['pro_id']);

      header ("Location: index.php?module=commande&action=shop-cart&notif=ok");
    }
    
    define ("PAGE_TITLE", "Mon Panier");
    include ("../app/view/commande/shop-cart.php");
    
  } else {
    
    include ("../app/model/commande/modif_produits.php");
    
    $size = count($_POST['cus_id']); 
    $i = 0;
    
    while ($i < $size) {
      $cus_id = $_POST['cus_id'][$i];
      $pro_id = $_POST['pro_id'][$i];
      $cad_qt = $_POST['cad_qt'][$i];
      $modif_produits = modif_produits($cus_id, $pro_id, $cad_qt);
      ++$i;
    }
    
    if ($modif_produits == false) {
      
      header ("Location: index.php?module=commande&action=shop-cart&notif=nok");
      
    } else {
      
      header ("Location: index.php?module=commande&action=shop-cart&notif=ok");
    }
  }