<?php

  function afficher_paniers() {
    global $pdo;
    
    try {
      $query = "SELECT cad_qt, DATE_FORMAT(cad_date,'%d/%m/%Y') AS cad_date, pro_title, cus_mail
                FROM st_caddies, st_products, st_customers
                WHERE st_customers_cus_id=cus_id
                AND st_products_pro_id=pro_id";
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