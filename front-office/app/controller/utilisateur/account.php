<?php

  if ($_SERVER["REQUEST_METHOD"] == "GET") {

    include ("../app/model/utilisateur/account_view.php");
    $account = account_view($_SESSION["user"]["cus_id"]);
    
    include ("../app/model/utilisateur/account_view_addresses.php");
    $addresses = account_view_addresses($_SESSION["user"]["cus_id"]);

  } else {
    
    include ("../app/model/utilisateur/account_update.php");
    $account_update = account_update($_POST);
    
    header ("Location: index.php?module=utilisateur&action=account"); 
  }
  
  define ("PAGE_TITLE", "Mon compte");
  include ("../app/view/utilisateur/account.php");