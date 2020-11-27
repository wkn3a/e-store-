<?php

  function supprimer_paiement_mode($id) {
    global $pdo;
    
    try {
      $query = "DELETE
                FROM st_types_of_payments
                WHERE typ_pay_id=:typ_pay_id";
      $req = $pdo->prepare($query);
      $req->bindParam(":typ_pay_id", $id, PDO::PARAM_INT);
      $req->execute();
      return true;
    }
    
    catch (Exception $e) {
      die ("SQL Erreur : " . utf8_encode($e->getMessage()));
    }
  }