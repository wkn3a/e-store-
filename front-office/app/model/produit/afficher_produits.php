<?php

  function afficher_produits($offset, $limit) {
    global $pdo;
    
    try {
      $query = "SELECT DISTINCT pro_id, pro_title, pro_img_url, pro_price, pro_descr
                FROM st_products, st_products_has_st_categories, st_categories
                WHERE st_categories_cat_id=cat_id
                  AND st_products_pro_id=pro_id
                ORDER BY st_categories_cat_id, pro_title
                LIMIT :offset, :limi";
      $req = $pdo->prepare($query);
      $req->bindParam(":offset", $offset, PDO::PARAM_INT);
      $req->bindParam(":limi", $limit, PDO::PARAM_INT);
      $req->execute();
      $req->setFetchMode(PDO::FETCH_ASSOC);
      $data = $req->fetchAll();
      $req->closeCursor();
      return $data;
    }
    
    catch (Exception $e) {
      return false;
    }
  }