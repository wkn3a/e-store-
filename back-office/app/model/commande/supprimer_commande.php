<?php

  function supprimer_commande($id) {
    global $pdo;
    
    try {
      $query = "DELETE
                FROM st_orders
                WHERE ord_id=:ord_id";
      $req = $pdo->prepare($query);
      $req->bindParam(":ord_id", $id, PDO::PARAM_INT);
      $req->execute();
      return true;
    }
    
    catch (Exception $e) {
      die ("SQL Erreur : " . utf8_encode($e->getMessage()));
    }
  }