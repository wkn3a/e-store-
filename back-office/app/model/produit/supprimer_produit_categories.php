<?php

  function supprimer_produit_categories($id) {
    global $pdo;
    
    try {
      $query = "DELETE
                FROM st_products_has_st_categories
                WHERE st_products_pro_id=:pro_id";
      $req = $pdo->prepare($query);
      $req->bindParam(":pro_id", $id, PDO::PARAM_INT);
      $req->execute();
      return true;
    }
    
    catch (Exception $e) {
      die ("SQL Erreur : " . utf8_encode($e->getMessage()));
    }
  }