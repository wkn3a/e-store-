<?php

  include ("../app/model/utilisateur/unsubscribe.php");
  $unsubscribe = unsubscribe($_POST);
  
  if ($unsubscribe) {
    
    $_SESSION["user"]["cus_subscriber"] = 0;
    
    header ("Location: index?notif=ok");
    
  } else {
    
    header ("Location: index?notif=nok");
  }