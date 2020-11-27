<?php

  function ajout_address($form) {
    global $pdo;
    
    try {
      $query = "INSERT INTO st_addresses
                  (st_customers_cus_id, add_address1, add_address2, add_zipcode, add_city)
                VALUES
                  (:cus_id, :add_address1, :add_address2, :add_zipcode, :add_city)";
      $req = $pdo ->prepare($query);
      $req->bindParam(":cus_id", $form["cus_id"], PDO::PARAM_INT);
      $req->bindParam(":add_address1", $form["add_address1"], PDO::PARAM_STR);
      $req->bindParam(":add_address2", $form["add_address2"], PDO::PARAM_STR);
      $req->bindParam(":add_zipcode", $form["add_zipcode"], PDO::PARAM_INT);
      $req->bindParam(":add_city", $form["add_city"], PDO::PARAM_STR);
      $req->execute();
      return true;
    }
    
    catch (Exception $e) {
      return false;
    }
  }