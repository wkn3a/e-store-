<?php

  function afficher_commandes($ord_id) {
    global $pdo;
    
    try {
      $query = "SELECT ord_total, B.add_city as billing, C.add_city as delivary, B.add_address1 as adres1b, C.add_address1 as adres1d, B.add_address2 as adres2b, C.add_address2 as adres2d, B.add_zipcode as zipcodeb, C.add_zipcode as zipcoded
                FROM st_orders A, st_addresses B, st_addresses C
                WHERE ord_id =:ord_id
                AND st_address_billing = B.add_id
                AND st_address_delivery = C.add_id";
                
      $req = $pdo->prepare($query);
      $req->bindParam(":ord_id", $ord_id, PDO::PARAM_STR);
     
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