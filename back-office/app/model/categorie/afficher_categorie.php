<?php

  function afficher_categorie($id) {
    global $pdo;
    
    try {
      $query = "SELECT *
                FROM st_categories
                WHERE cat_id=:cat_id";
      $req = $pdo->prepare($query);
      $req->bindParam(":cat_id", $id, PDO::PARAM_INT);
      $req->execute();
      $req->setFetchMode(PDO::FETCH_ASSOC);
      $data = $req->fetch();
      $req->closeCursor();
      return $data;
    }
    
    catch (Exception $e) {
      die ("SQL Erreur : " . utf8_encode($e->getMessage()));
    }
  }