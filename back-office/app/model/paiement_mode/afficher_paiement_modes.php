<?php

  function afficher_paiement_modes() {
    global $pdo;
    
    try {
      $query = "SELECT *
                FROM st_types_of_payments";
      $req = $pdo->prepare($query);
      $req->execute();
      $req->setFetchMode(PDO::FETCH_ASSOC);
      $data = $req->fetchAll();
      $req->closeCursor();
      return $data;
    }
    catch (Exception $e) {
      die ("SQL Erreur : " . utf8_encode($e->getMessage()));
    }
  }