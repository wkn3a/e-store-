<?php
 function ajout_un_produit ($cus_id, $pro_id) {
 	global $pdo;
		try {
			$query = "INSERT INTO st_caddies (st_customers_cus_id, st_products_pro_id, cad_qt) 
								VALUES (:cus_id, :pro_id, 1)";

	
			$req = $pdo->prepare($query);
			$req->bindParam(":cus_id", $cus_id, PDO::PARAM_STR);
			$req->bindParam(":pro_id", $pro_id, PDO::PARAM_STR);


			$req ->execute();
			return true;

		} catch (Exception $e) {
			return false;
		}
	

}
 