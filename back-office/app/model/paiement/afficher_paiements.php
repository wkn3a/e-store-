<?php

  function afficher_paiements() {
    global $pdo;
    
    try {
      $query = "SELECT pay_id, typ_pay_descr, cus_mail, DATE_FORMAT(pay_date,'%d/%m/%Y') AS pay_date, pay_amount, st_orders_ord_id
                FROM st_payments, st_types_of_payments, st_customers
                WHERE st_customers_cus_id=cus_id
                  AND st_types_of_payments_typ_pay_id=typ_pay_id";
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