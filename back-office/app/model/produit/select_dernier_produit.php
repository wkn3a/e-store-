<?php

  function select_dernier_produit() {
    global $pdo;
    
    try {
      $query = "SELECT pro_id
                FROM st_products
                ORDER BY pro_id DESC
                LIMIT 1";
      $req = $pdo->prepare($query);
      $req->execute();
      $req->setFetchMode(PDO::FETCH_ASSOC);
      $data = $req->fetch();
      $req->closeCursor();
      return $data;
    }
    
    catch (Exception $e) {
      die ("SQL Erreur : " . utf8_encode($e->getMessage()));
    }
  }