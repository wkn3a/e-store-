<?php

  function modifier_produit($form) {
    global $pdo;
    
    try {
      $query = "UPDATE st_products
                SET pro_title=:pro_title, pro_descr=:pro_descr, pro_img_url=:pro_img_url, pro_price=:pro_price
                WHERE pro_id=:pro_id";
      $req = $pdo->prepare($query);
      $req->bindParam(":pro_title", $form["pro_title"], PDO::PARAM_STR);
      $req->bindParam(":pro_descr", $form["pro_descr"], PDO::PARAM_STR);
      $req->bindParam(":pro_img_url", $form["pro_img_url"], PDO::PARAM_STR);
      $req->bindParam(":pro_price", $form["pro_price"], PDO::PARAM_STR);
      $req->bindParam(":pro_id", $form["pro_id"], PDO::PARAM_INT);
      $req->execute();
      return true;
    }
    
    catch (Exception $e) {
      die ("SQL Erreur : " . utf8_encode($e->getMessage()));
    }
  }