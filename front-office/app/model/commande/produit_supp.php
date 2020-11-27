<?php
 function produit_supp ($cus_id, $pro_id) {
 	global $pdo;
		try {
			$query = "DELETE FROM st_caddies 
								 WHERE st_customers_cus_id =:cus_id
								 AND st_products_pro_id =:pro_id ";

	
			$req = $pdo->prepare($query);
			$req->bindParam(":cus_id", $cus_id, PDO::PARAM_STR);
			$req->bindParam(":pro_id", $pro_id, PDO::PARAM_STR);
			$req ->execute();


		} catch (Exception $e) {
			return false;
		}
	

}
 