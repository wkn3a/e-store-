<?php

  if (isset($_POST) && isset($_SESSION['user']["cus_id"])) {

    include ("../app/model/commande/update_order.php");
    $update_order = update_order($_POST['cus_id'], $_POST['ord_total'], $_POST['ord_qt']);

    include ("../app/model/commande/afficher_order.php");
    $order = afficher_order($_POST['cus_id']);
    
    

    include ("../app/model/commande/shop-cart.php");
    $paniers = afficher_panier($_SESSION["user"]["cus_id"]);
    
    foreach ($paniers as $key => $panier) {
      
      $paniers[$key]['pro_price'] = $panier['pro_price'] ." €";
      $paniers[$key]['total'] = (float)$panier['pro_price'] * (float)$panier['cad_qt'];
    }

    include ("../app/model/utilisateur/account_view.php");
    $account = account_view($_SESSION['user']['cus_id']);

    include ("../app/model/commande/afficher_commandes.php");
    $commande = afficher_commandes($_POST['ord_id']);

    include ("../app/model/commande/afficher_livraison_modes_id.php");
    $mode_livraison = afficher_livraison_modes_id($order[0]['st_types_of_logistics_typ_log_id']);

    include ("../app/model/commande/ajout_order_line.php");
  
    $size = count($paniers);
    $i = 0;
    
    while ($i < $size) {
    
      $st_products_pro_id = $paniers[$i]['pro_id'];
      $ord_lines_qt = $paniers[$i]['cad_qt'];
      $ord_lines_price = $paniers[$i]['total'];
      $ajout_order_line = ajout_order_line($order[0]['ord_id'], $st_products_pro_id, $ord_lines_qt, $ord_lines_price);
      ++$i;
    }
    
    include ("../app/model/commande/ajout_order_paiement.php");
    $payments = insertion_paiement($_POST["typ_pay_id"], $_SESSION["user"]["cus_id"], $_POST["ord_total"], $order[0]["ord_id"]);
    
    include ("../app/model/commande/panier_supp.php");
    $panier_suppr = panier_supp($_SESSION["user"]["cus_id"]);
    
    
    define ("PAGE_TITLE", "Commande validée");
    include ("../app/view/commande/validation_commande.php");
  }