<?php

  function supprimer_categorie($id) {
    global $pdo;
    
    try {
      $query = "DELETE
                FROM st_categories
                WHERE cat_id=:cat_id";
      $req = $pdo->prepare($query);
      $req->bindParam(":cat_id", $id, PDO::PARAM_INT);
      $req->execute();
      return true;
    }
    
    catch (Exception $e) {
      die ("SQL Erreur : " . utf8_encode($e->getMessage()));
    }
  }