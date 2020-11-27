<?php

  function ajouter_paiement_mode($form) {
    global $pdo;
    
    try {
      $query = "INSERT INTO st_types_of_payments
                  (typ_pay_descr)
                VALUES
                  (:typ_pay_descr)";
      $req = $pdo->prepare($query);
      $req->bindParam(":typ_pay_descr", $form["typ_pay_descr"], PDO::PARAM_STR);
      $req->execute();
      return true;
    }
    
    catch (Exception $e) {
      die ("SQL Erreur : " . utf8_encode($e->getMessage()));
    }
  }