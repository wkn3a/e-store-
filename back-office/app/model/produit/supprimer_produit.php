<?php

  function supprimer_produit($id) {
    global $pdo;
    
    try {
      $query = "DELETE
                FROM st_products
                WHERE pro_id=:pro_id";
      $req = $pdo->prepare($query);
      $req->bindParam(":pro_id", $id, PDO::PARAM_INT);
      $req->execute();
      return true;
    }
    
    catch (Exception $e) {
      die ("SQL Erreur : " . utf8_encode($e->getMessage()));
    }
  }