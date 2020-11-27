<?php

  if ($_SERVER["REQUEST_METHOD"] == "GET") {
  
    define ("PAGE_TITLE", "S'enregister");
    include ("../app/view/utilisateur/register.php");
 
  } else {
    
    include ("../app/model/utilisateur/register_add.php");
    $register = register_add($_POST);
    
    include ("../app/model/utilisateur/select_last_customer.php");
    $cus_id = select_last_customer();

    
    include ("../app/model/utilisateur/register_address.php");
    $register_address = register_address($cus_id, $_POST);
    
    if ($register && $cus_id && $register_address) {
      
      header ("Location: index?module=utilisateur&action=login&notif=regok");
      
    } else {
      
      header ("Location: index?module=utilisateur&action=register&notif=regnok");
    }
  }