<?php

  function panier_supp($cus_id) {
    global $pdo;
  
    try {
      $query = "DELETE 
                FROM st_caddies
                WHERE st_customers_cus_id =:cus_id";
      $req = $pdo->prepare($query);
      $req->bindParam(":cus_id", $cus_id, PDO::PARAM_INT);
      $req ->execute();
      return true;
      
    }
    
    catch (Exception $e) {
      return false;
    }
  }