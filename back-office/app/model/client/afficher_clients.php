<?php

  function afficher_clients() {
    global $pdo;
    
    try {

      $query = "SELECT cus_id, cus_civility, cus_lastname, cus_firstname, cus_mail, cus_subscriber

                FROM st_customers";
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