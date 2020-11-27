<?php

  function account_view($user) {
    global $pdo;

    try {
     $query = "SELECT cus_id, cus_civility, cus_lastname, cus_firstname, cus_mail, cus_subscriber
               FROM st_customers
               WHERE cus_id=:cus_id";
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