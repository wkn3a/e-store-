<?php

  function account_view_commande($id) {
    global $pdo;


    try {
     $query = "SELECT *
               FROM st_customers, st_addresses
               WHERE cus_id = st_customers_cus_id
                 AND cus_id =:cus_id";
      $req = $pdo ->prepare($query);
      $req->bindParam(":cus_id", $id, PDO::PARAM_STR);
      $req->execute();
      $req->setFetchMode(PDO::FETCH_ASSOC);
      $data = $req->fetchAll();
      //si y a qu'on a besoin une adresse, ça suffi "fetch" simple.....
      $req->closeCursor(); 
      return $data;
    }
    
    catch (Exception $e) {
      return false;     

    } 
  }