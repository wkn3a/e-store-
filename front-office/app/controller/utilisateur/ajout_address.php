<?php

    include ("../app/model/utilisateur/ajout_address.php");
    $address = ajout_address($_POST);
    
    header ("Location: index.php?module=utilisateur&action=account&notif=addressok");
    