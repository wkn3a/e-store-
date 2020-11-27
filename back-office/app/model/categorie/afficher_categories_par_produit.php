<?php

  function afficher_categories_par_produit() {
    global $pdo;
    
    try {
      $query = "SELECT cat_descr, pro_title
                FROM st_products, st_products_has_st_categories, st_categories
                WHERE st_products_pro_id=pro_id
                  AND st_categories_cat_id=cat_id";
      $req = $pdo->prepare($query);
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