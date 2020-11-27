<?php

  function select_produit_categories($id) {
    global $pdo;
    
    try {
      $query = "SELECT st_categories_cat_id
                FROM st_products_has_st_categories
                WHERE st_products_pro_id=:st_products_pro_id";
      $req = $pdo->prepare($query);
      $req->bindParam(":st_products_pro_id", $id, PDO::PARAM_INT);
      $req->execute();
      $req->setFetchMode(PDO::FETCH_ASSOC);
      $data = $req->fetchAll();
      $req->closeCursor();
      return $data;
    }
    catch (Exception $e) {
      die ("SQL Erreur : " . utf8_encode($e->getMessage()));
    }
  }