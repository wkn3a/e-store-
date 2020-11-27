<?php

function afficher_produit_qt($cus_id, $pro_id) {
	global $pdo; 
	
	try {
		$query = "SELECT cad_qt 
							FROM st_caddies
							WHERE st_customers_cus_id =:cus_id
							AND st_products_pro_id =:pro_id";
			
		$req= $pdo->prepare($query);
		$req->bindParam(":cus_id", $cus_id, PDO::PARAM_STR);
		$req->bindParam(":pro_id", $pro_id, PDO::PARAM_STR);
		$req->execute();


		$req->setFetchMode(PDO::FETCH_ASSOC);

		$panier = $req->fetch(); 

		$req->closeCursor();
		return $panier;

	} catch (Exception $e) {

		return false;
	}
}