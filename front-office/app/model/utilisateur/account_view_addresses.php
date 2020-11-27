<?php

  function account_view_addresses($user) {
    global $pdo;

    try {
     $query = "SELECT add_id, add_address1, add_address2, add_zipcode, add_city
               FROM st_addresses, st_customers
               WHERE st_customers_cus_id=cus_id
                 AND cus_id=:cus_id";
      $req = $pdo ->prepare($query);
      $req->bindParam(":cus_id", $user, PDO::PARAM_INT);
      $req->execute();
      $req->setFetchMode(PDO::FETCH_ASSOC);
      $data = $req->fetchAll();
      $req->closeCursor();
      return $data;
    }
    
    catch (Exception $e) {
      return false;
    }
  }