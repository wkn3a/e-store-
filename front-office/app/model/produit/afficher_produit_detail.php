<?php

  function afficher_produit_detail($id) {
    global $pdo;
    
    try {
      $query = "SELECT pro_id, pro_title, pro_descr, pro_img_url, pro_price
                FROM st_products
                WHERE pro_id=:id";
      $req = $pdo->prepare($query);
      $req->bindParam(":id", $id, PDO::PARAM_INT);
      $req->execute();
      $req->setFetchMode(PDO::FETCH_ASSOC);
      $data = $req->fetch();
      $req->closeCursor();
      return $data;
    }
    
    catch (Exception $e) {
      return false;
    }
  }