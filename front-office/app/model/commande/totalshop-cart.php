<?php

function montant_total() {
global $pdo; 
	
	try {
		$query = "
		    SELECT SUM(pro_price*cad_qt) AS pro_price_sum
			FROM st_caddies, st_products
			WHERE pro_id=st_products_pro_id
			AND st_customers_cus_id = ". $_SESSION["user"]["cus_id"];

		
		$req= $pdo->prepare($query);

		
		$req->execute();

		$req->setFetchMode(PDO::FETCH_ASSOC);
		$total = $req->fetch(); 

		$req->closeCursor();
		return $total;

	} catch (Exception $e) {

		return false;
	}
	
}
