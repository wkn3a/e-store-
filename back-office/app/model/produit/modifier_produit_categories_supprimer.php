<?php

  function modifier_produit_categories_supprimer($form) {
    global $pdo;
    
    try {
      $query = "DELETE
                FROM st_products_has_st_categories
                WHERE st_products_pro_id=:pro_id";
      $req = $pdo->prepare($query);
      $req->bindParam(":pro_id", $form["pro_id"], PDO::PARAM_INT);
      $req->execute();
      return true;
    }
    
    catch (Exception $e) {
      return false;
    }
  }