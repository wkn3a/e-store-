<?php
if(isset($_POST['add_address1'])){

    include ("../app/model/utilisateur/account_update.commande.php");
    $account_update = account_update($_POST);
    
    if ($account_update == false) {
      
      header ("Location: index?module=commande&action=checkout&notif=nok");
      
    } else {
      
      header ("Location: index?module=commande&action=checkout&notif=ok");
    }
  }
 
 