<?php

  function afficher_produits_par_categorie($id, $offset, $limit) {
    global $pdo;
    
    try {
      $query = "SELECT pro_id, pro_title, pro_descr, pro_img_url, pro_price, cat_id, cat_descr
                FROM st_products, st_products_has_st_categories, st_categories
                WHERE st_products_pro_id=pro_id
                  AND st_categories_cat_id=cat_id
                  AND cat_id=:id
                ORDER BY pro_title
                LIMIT :offset, :limi";
      $req = $pdo->prepare($query);
      $req->bindParam(":id", $id, PDO::PARAM_INT);
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