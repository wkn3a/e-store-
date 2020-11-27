<?php

  function select_last_customer() {
    global $pdo;
    
    try {
      $query = "SELECT cus_id
                FROM st_customers
                ORDER BY cus_id DESC
                LIMIT 1";
      $req = $pdo ->prepare($query);
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