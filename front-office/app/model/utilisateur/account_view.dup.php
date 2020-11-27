<?php

  function account_view($user) {
    global $pdo;

    try {
     $query = $query = "SELECT cus_id, cus_civility, cus_lastname, cus_firstname, cus_mail, cus_subscriber, add_address1, add_address2, add_zipcode, add_city, st_customers_cus_id,add_id
              FROM st_customers, st_addresses
               WHERE cus_id=:cus_id
                AND st_customers_cus_id=cus_id";
      $req = $pdo ->prepare($query);
      $req->bindParam(":cus_id", $user, PDO::PARAM_INT);
      $req->execute();
      $req->setFetchMode(PDO::FETCH_ASSOC);
      $data = $req->fetch();
      $req->closeCursor();
      return $data;
    }
    
    catch (Exception $e) {
      return false;
    }
  }