<?php

  function afficher_categories() {
    global $pdo;
    
    try {
      $query = "SELECT *
                FROM st_categories";
      $req = $pdo->prepare($query);
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