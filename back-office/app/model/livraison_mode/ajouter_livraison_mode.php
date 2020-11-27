<?php

  function ajouter_livraison_mode($form) {
    global $pdo;
    
    try {
      $query = "INSERT INTO st_types_of_logistics
                  (typ_log_descr, typ_log_price)
                VALUES
                  (:typ_log_descr, :typ_log_price)";
      $req = $pdo->prepare($query);
      $req->bindParam(":typ_log_descr", $form["typ_log_descr"], PDO::PARAM_STR);
      $req->bindParam(":typ_log_price", $form["typ_log_price"], PDO::PARAM_STR);
      $req->execute();
      return true;
    }
    
    catch (Exception $e) {
      die ("SQL Erreur : " . utf8_encode($e->getMessage()));
    }
  }