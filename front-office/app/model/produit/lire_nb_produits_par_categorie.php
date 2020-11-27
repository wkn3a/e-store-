<?php

  function lire_nb_produits_par_categorie($id) {
    global $pdo;
    
    try {
      $query = "SELECT count(*) as nb
                FROM st_products_has_st_categories
                WHERE st_categories_cat_id=:id";
      $req = $pdo->prepare($query);
      $req->bindParam(":id", $id, PDO::PARAM_INT);
      $req->execute();
      $req->setFetchMode(PDO::FETCH_ASSOC);
      $data = $req->fetch();
      $req->closeCursor();
      return $data["nb"];
    }
    
    catch (Exception $e) {
      return false;
    }
  }