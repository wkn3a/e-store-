<?php

  function ajouter_produit_categorie($dernier_produit, $cat_id) {
    global $pdo;
    
    try {
      $query = "INSERT INTO st_products_has_st_categories
                  (st_products_pro_id, st_categories_cat_id)
                VALUES
                  (:st_products_pro_id, :st_categories_cat_id)";
      $req = $pdo->prepare($query);
      $req->bindParam(":st_products_pro_id", $dernier_produit["pro_id"], PDO::PARAM_INT);
      $req->bindParam(":st_categories_cat_id", $cat_id, PDO::PARAM_INT);
      $req->execute();
      return true;
    }
    
    catch (Exception $e) {
      die ("SQL Erreur : " . utf8_encode($e->getMessage()));
    }
  }