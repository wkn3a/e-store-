<?php

  function account_delete($id) {
    global $pdo;
    
    try {
      $query = "DELETE FROM st_payments
                WHERE st_customers_cus_id=:cus_id;
                
                DELETE FROM st_orders_lines
                WHERE st_orders_ord_id=(SELECT ord_id from st_orders WHERE st_customers_cus_id=:cus_id);
                
                DELETE FROM st_orders
                WHERE st_customers_cus_id=:cus_id;
                
                DELETE FROM st_caddies
                WHERE st_customers_cus_id=:cus_id;
                
                DELETE FROM st_addresses
                WHERE st_customers_cus_id=:cus_id;
                
                DELETE FROM st_customers
                WHERE cus_id=:cus_id";
      $req = $pdo ->prepare($query);
      $req->bindParam(":cus_id", $id, PDO::PARAM_INT);
      $req->execute();
      return true;
    }
    
    catch (Exception $e) {
      return false;
    }
  }