<?php

  function ajouter_produit($form) {
    global $pdo;
    
    try {
      $query = "INSERT INTO st_products
                  (pro_title, pro_descr, pro_img_url, pro_price)
                VALUES
                  (:pro_title, :pro_descr, :pro_img_url, :pro_price)";
      $req = $pdo->prepare($query);
      $req->bindParam(":pro_title", $form["pro_title"], PDO::PARAM_STR);
      $req->bindParam(":pro_descr", $form["pro_descr"], PDO::PARAM_STR);
      $req->bindParam(":pro_img_url", $form["pro_img_url"], PDO::PARAM_STR);
      $req->bindParam(":pro_price", $form["pro_price"], PDO::PARAM_STR);
      $req->execute();
      return true;
    }
    
    catch (Exception $e) {
      die ("SQL Erreur : " . utf8_encode($e->getMessage()));
    }
  }