<?php

  function afficher_livraison_mode($id) {
    global $pdo;
    
    try {
      $query = "SELECT *
                FROM st_types_of_logistics
                WHERE typ_log_id=:typ_log_id";
      $req = $pdo->prepare($query);
      $req->bindParam(":typ_log_id", $id, PDO::PARAM_INT);
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