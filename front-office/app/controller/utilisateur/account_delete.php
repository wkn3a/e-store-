<?php

  include("../app/model/utilisateur/account_delete.php");
  $account_delete = account_delete($_SESSION["user"]["cus_id"]);
  
  if ($account_delete) {

    unset($_SESSION["user"]);
    header ("Location: index?module=accueil&action=index&notif=deleteok");

  } else {

    header ("Location: index?module=utilisateur&action=account&notif=deletenok");
  }