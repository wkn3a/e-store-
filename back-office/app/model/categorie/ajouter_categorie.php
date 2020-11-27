<?php

  function ajouter_categorie($form) {
    global $pdo;
    
    try {
      $query = "INSERT INTO st_categories
                  (cat_descr, cat_img_url)
                VALUES
                  (:cat_descr, :cat_img_url)";
      $req = $pdo->prepare($query);
      $req->bindParam(":cat_descr", $form["cat_descr"], PDO::PARAM_STR);
      $req->bindParam(":cat_img_url", $form["cat_img_url"], PDO::PARAM_STR);
      $req->execute();
      return true;
    }
    
    catch (Exception $e) {
      die ("SQL Erreur : " . utf8_encode($e->getMessage()));
    }
  }