<?php

  function login($mail, $pass) {
    global $pdo;

    try {
      $query =  "SELECT *
                 FROM st_customers
                 WHERE cus_mail =:cus_mail
                  AND cus_password =:cus_password
                  AND cus_id BETWEEN 1 AND 4";
      $req = $pdo ->prepare($query);
      $req->bindParam(":cus_mail", $mail, PDO::PARAM_STR);
      $req->bindParam(":cus_password",$pass, PDO::PARAM_STR);       
      $req->execute();
      $req->setFetchMode(PDO::FETCH_ASSOC);
      $data = $req->fetch();
      $req->closeCursor();
      return $data;

    } catch (Exception $e) {
        return false;
    }
  }