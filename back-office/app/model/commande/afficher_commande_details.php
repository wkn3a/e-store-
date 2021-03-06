<?php

  function afficher_commande_details($id) {
    global $pdo;
    
    try {
      $query = "SELECT pro_title, ord_lines_qt, ord_lines_price, cus_mail
                FROM st_orders_lines, st_products, st_customers, st_orders
                  WHERE st_products_pro_id=pro_id
                    AND st_orders_ord_id=:id
                    AND st_customers_cus_id=cus_id
                    AND st_orders_ord_id=ord_id";
      $req = $pdo->prepare($query);
      $req->bindParam(":id", $id, PDO::PARAM_INT);
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