<?php

  function afficher_adresses() {
    global $pdo;
    
    try {
      $query = "SELECT add_id, add_address1, add_address2, add_zipcode, add_city, cus_mail
                FROM st_addresses, st_customers
                WHERE st_customers_cus_id=cus_id";
      $req = $pdo->prepare($query);
      $req->execute();
      $req->setFetchMode(PDO::FETCH_ASSOC);
      $data = $req->fetchAll();
      $req->closeCursor();
      return $data;
    }
    catch (Exception $e) {
      die ("SQL Erreur : " . utf8_encode($e->getMessage()));
    }
  }