<?php

  function account_update($form) {
    global $pdo;
    
    try {   
      $query = "UPDATE st_customers
                  SET cus_lastname = :cus_lastname,
                      cus_firstname = :cus_firstname,
                      cus_mail = :cus_mail,
                      cus_civility = :cus_civility,
                      cus_subscriber = :cus_subscriber
                  WHERE cus_id = :cus_id";      
      $req = $pdo->prepare($query);
      $req->bindParam(":cus_lastname", $form["cus_lastname"], PDO::PARAM_STR);
      $req->bindParam(":cus_firstname", $form["cus_firstname"], PDO::PARAM_STR);
      $req->bindParam(":cus_mail", $form["cus_mail"], PDO::PARAM_STR);
      $req->bindParam(":cus_civility", $form["cus_civility"], PDO::PARAM_INT);
      $req->bindParam(":cus_subscriber", $form["cus_subscriber"], PDO::PARAM_INT);
      $req->bindParam(":cus_id", $form["cus_id"], PDO::PARAM_INT);
      $req->execute();
      return true;
    }
    catch (Exception $e) {
      return false;
    }
  }