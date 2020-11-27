<?php

  function unsubscribe($form) {
    global $pdo;

    try {
     $query = "UPDATE st_customers
               SET cus_subscriber=0
               WHERE cus_id=:cus_id";
      $req = $pdo ->prepare($query);
      $req->bindParam(":cus_id", $_SESSION["user"]["cus_id"], PDO::PARAM_INT);
      $req->execute();
      return true;
    }
    
    catch (Exception $e) {
      return false;
    }
  }