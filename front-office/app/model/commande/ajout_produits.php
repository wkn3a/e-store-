<?php
 
function ajout_produits ($form) {
 	global $pdo;
		try {
			$query = "INSERT INTO st_caddies (st_customers_cus_id, st_products_pro_id, cad_qt) 
								VALUES (:cus_id, :pro_id, :cad_qt)";

	
			$req = $pdo->prepare($query);
			$req->bindParam(":cus_id", $form['cus_id'], PDO::PARAM_STR);
			$req->bindParam(":pro_id", $form['pro_id'], PDO::PARAM_STR);
			$req->bindParam(":cad_qt", $form['cad_qt'], PDO::PARAM_STR);

			$req ->execute();


		} catch (Exception $e) {
			return false;
		}
	

}
 

