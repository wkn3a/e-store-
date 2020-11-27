<?php

  function supprimer_categorie_produits($id) {
    global $pdo;
    
    try {
      $query = "DELETE
                FROM st_products_has_st_categories
                WHERE st_categories_cat_id=:cat_id";
      $req = $pdo->prepare($query);
      $req->bindParam(":cat_id", $id, PDO::PARAM_INT);
      $req->execute();
      return true;
    }
    
    catch (Exception $e) {
      die ("SQL Erreur : " . utf8_encode($e->getMessage()));
    }
  }