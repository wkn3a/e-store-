<?php

  function afficher_commandes() {
    global $pdo;
    
    try {
      $query = "SELECT typ_log_descr, B.add_address1 AS billing_address1, C.add_address1 AS delivery_address1, B.add_address2 AS billing_address2, C.add_address2 AS delivery_address2, B.add_zipcode AS billing_zipcode, C.add_zipcode AS delivery_zipcode, B.add_city AS billing_city, C.add_city AS delivery_city, ord_id, DATE_FORMAT(ord_date,'%d/%m/%Y') AS ord_date, ord_total, ord_qt, cus_mail, cus_id
                FROM st_types_of_logistics, st_orders A, st_customers, st_addresses B, st_addresses C
                WHERE A.st_customers_cus_id=cus_id
                  AND B.st_customers_cus_id=cus_id
                  AND st_types_of_logistics_typ_log_id=typ_log_id
                  AND st_address_billing=B.add_id
                  AND st_address_delivery=C.add_id";
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