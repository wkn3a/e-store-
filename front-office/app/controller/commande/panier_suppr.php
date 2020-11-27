<?php

  if (isset($_SESSION['user']["cus_id"])) {
    
    include ("../app/model/commande/panier_supp.php");
    $panier_suppr = panier_supp($_SESSION["user"]["cus_id"]);
    
    header ("Location: index?module=produit&action=index");
  }