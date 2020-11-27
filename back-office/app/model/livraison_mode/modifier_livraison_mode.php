<?php

  function modifier_livraison_mode($form) {
    global $pdo;
    
    try {
      $query = "UPDATE st_types_of_logistics
                SET typ_log_descr=:typ_log_descr, typ_log_price=:typ_log_price
                WHERE typ_log_id=:typ_log_id";
      $req = $pdo->prepare($query);
      $req->bindParam(":typ_log_descr", $form["typ_log_descr"], PDO::PARAM_STR);
      $req->bindParam(":typ_log_price", $form["typ_log_price"], PDO::PARAM_STR);
      $req->bindParam(":typ_log_id", $form["typ_log_id"], PDO::PARAM_INT);
      $req->execute();
      return true;
    }
    
    catch (Exception $e) {
      die ("SQL Erreur : " . utf8_encode($e->getMessage()));
    }
  }