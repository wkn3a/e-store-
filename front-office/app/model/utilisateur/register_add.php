<?php

  function register_add($form) {
    global $pdo;
    
    try {
      $query = "INSERT INTO st_customers
                  (cus_lastname, cus_firstname, cus_mail, cus_password)
                VALUES
                  (:cus_lastname, :cus_firstname, :cus_mail, :cus_password)";
      $req = $pdo ->prepare($query);
      $req->bindParam(":cus_lastname", $form["cus_lastname"], PDO::PARAM_STR);
      $req->bindParam(":cus_firstname", $form["cus_firstname"], PDO::PARAM_STR);
      $req->bindParam(":cus_mail", $form["cus_mail"], PDO::PARAM_STR);
      $req->bindParam(":cus_password", md5($form["cus_password"]), PDO::PARAM_STR);
      $req->execute();   
      return true;
    }
    
    catch (Exception $e) {
      return false;
    }
  }