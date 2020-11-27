<?php

  function afficher_produits() {
    global $pdo;
    
    try {
      $query = "SELECT pro_id, pro_img_url, pro_price, DATE_FORMAT(pro_date,'%d/%m/%Y') AS pro_date, pro_title, pro_descr
                FROM st_products";
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