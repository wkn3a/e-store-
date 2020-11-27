<?php

  if (isset($_POST)) {
   
    include ("../app/model/commande/afficher_livraison_modes_id.php");
    $prix_livraison = afficher_livraison_modes_id ($_POST['st_types_of_logistics_typ_log_id']);

    include ("../app/model/commande/ajout_order_livraison.php");
    $order = ajout_order_livraison($_POST);

    include ("../app/model/commande/shop-cart.php");
    $paniers = afficher_panier($_SESSION["user"]["cus_id"]);

    foreach ($paniers as $key => $panier) {
      
      $paniers[$key]['pro_price'] = $panier['pro_price'] ." €";
      $paniers[$key]['total'] = (float)$panier['pro_price'] * (float)$panier['cad_qt'] . " €";
    }
    
    $sum = array_sum(array_column($paniers, 'total'));
    $sum_final = sprintf('%.2f',$sum + $prix_livraison["typ_log_price"]);
    
    include ("../app/model/commande/quantiteshop-cart.php");
    $qt = qt_total();
    
    include ("../app/model/commande/checkout.php");
    $paiements = mode_paiement();

    include ("../app/model/commande/afficher_order.php");
    $order = afficher_order($_SESSION["user"]["cus_id"]);
    
    define ("PAGE_TITLE", "Validation commande");
    include ("../app/view/commande/checkoutBis.php");
  }