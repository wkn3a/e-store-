<?php

  function modifier_paiement_mode($form) {
    global $pdo;
    
    try {
      $query = "UPDATE st_types_of_payments
                SET typ_pay_descr=:typ_pay_descr
                WHERE typ_pay_id=:typ_pay_id";
      $req = $pdo->prepare($query);
      $req->bindParam(":typ_pay_descr", $form["typ_pay_descr"], PDO::PARAM_STR);
      $req->bindParam(":typ_pay_id", $form["typ_pay_id"], PDO::PARAM_INT);
      $req->execute();
      return true;
    }
    
    catch (Exception $e) {
      die ("SQL Erreur : " . utf8_encode($e->getMessage()));
    }
  }