<?php

  function afficher_livraison_modes_id($id) {
    global $pdo;
    
    try {
      $query = "SELECT * 
                FROM st_types_of_logistics
                WHERE typ_log_id= :st_customers_cus_id";
      $req = $pdo->prepare($query);
      $req->bindParam(":st_customers_cus_id", $id, PDO::PARAM_STR);
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