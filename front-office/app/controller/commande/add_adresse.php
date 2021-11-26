<?php
if(isset($_POST['add_address1'])){

    include ("../app/model/utilisateur/ajout_address.php");
    $adress_new = ajout_address($_POST);
    
    if ($adress_new == false) {
      
      header ("Location: index.php?module=commande&action=checkout&notif=nok");
      
    } else {
      
      header ("Location: index.php?module=commande&action=checkout&notif=ok");
    }
  }
 
 