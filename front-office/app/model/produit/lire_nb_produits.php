<?php

  function lire_nb_produits() {
    global $pdo;
    
    try {
      $query = "SELECT count(*) as nb
                FROM st_products";
      $req = $pdo->prepare($query);
      $req->execute();
      $req->setFetchMode(PDO::FETCH_ASSOC);
      $data = $req->fetch();
      $req->closeCursor();
      return $data["nb"];
    }
    
    catch (Exception $e) {
      return false;
    }
  }