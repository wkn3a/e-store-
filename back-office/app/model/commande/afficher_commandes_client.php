<?php

  function afficher_commandes_client($id) {
    global $pdo;
    
    try {
      $query = "SELECT typ_log_descr, st_address_billing, st_address_delivery, ord_id, DATE_FORMAT(ord_date,'%d/%m/%Y') AS ord_date, ord_total, ord_qt, cus_mail, cus_id
                FROM st_types_of_logistics, st_orders, st_customers
                WHERE st_customers_cus_id=cus_id
                  AND st_types_of_logistics_typ_log_id=typ_log_id
                  AND cus_id=:cus_id";
      $req = $pdo->prepare($query);
      $req->bindParam(":cus_id", $id, PDO::PARAM_INT);
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