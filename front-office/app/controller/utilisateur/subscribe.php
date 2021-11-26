<?php

  include ("../app/model/utilisateur/subscribe.php");
  $subscribe = subscribe($_POST);
  
  if ($subscribe) {
    
    $_SESSION["user"]["cus_subscriber"] = 1;
    
    header ("Location: index.php?notif=ok");
    
  } else {
    
    header ("Location: index.php&notif=nok");
  }