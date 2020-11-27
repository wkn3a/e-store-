<?php

  function modifier_categorie($form) {
    global $pdo;
    
    try {
      $query = "UPDATE st_categories
                SET cat_descr=:cat_descr, cat_img_url=:cat_img_url
                WHERE cat_id=:cat_id";
      $req = $pdo->prepare($query);
      $req->bindParam(":cat_descr", $form["cat_descr"], PDO::PARAM_STR);
      $req->bindParam(":cat_img_url", $form["cat_img_url"], PDO::PARAM_STR);
      $req->bindParam(":cat_id", $form["cat_id"], PDO::PARAM_INT);
      $req->execute();
      return true;
    }
    
    catch (Exception $e) {
      die ("SQL Erreur : " . utf8_encode($e->getMessage()));
    }
  }