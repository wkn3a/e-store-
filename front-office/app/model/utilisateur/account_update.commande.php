<?php

  function account_update($form) {
    global $pdo;
    
    try {   
      $query = "UPDATE st_customers, st_addresses
                  SET add_address1 = :add_address1,
                      add_address2 = :add_address2,
                      add_zipcode = :add_zipcode,
                      add_city = :add_city
                  WHERE cus_id = :cus_id AND cus_id = st_customers_cus_id";    
                    
      $req = $pdo->prepare($query);

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