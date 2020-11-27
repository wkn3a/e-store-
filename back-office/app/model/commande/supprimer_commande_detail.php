<?php

  function supprimer_commande_detail($id) {
    global $pdo;
    
    try {
      $query = "DELETE
                FROM st_orders_lines
                WHERE st_orders_ord_id=:ord_id";
      $req = $pdo->prepare($query);
      $req->bindParam(":ord_id", $id, PDO::PARAM_INT);
      $req->execute();
      return true;
    }
    
    catch (Exception $e) {
      die ("SQL Erreur : " . utf8_encode($e->getMessage()));
    }
  }