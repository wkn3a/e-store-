<?php

  if (isset($_POST) && ($_SESSION["user"]["cus_id"])) {

    include ("../app/model/commande/checkout.php");
    $livraisons = mode_livraison();
    
    include ("../app/model/utilisateur/account_view.dup.php");
    $account = account_view($_SESSION['user']['cus_id']);
    

    include ("../app/model/utilisateur/account_view_commande.php");
    $accounts = account_view_commande($_SESSION['user']['cus_id']);

    define ("PAGE_TITLE", "Commande");
    include ("../app/view/commande/checkout.php");
  }