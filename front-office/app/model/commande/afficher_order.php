<?php
function afficher_order($cus_id) {
	global $pdo; 
	
	try {
		$query = "SELECT * 
							FROM st_orders 
							WHERE st_customers_cus_id=:cus_id
							ORDER BY ord_id DESC LIMIT 1";
			
		$req= $pdo->prepare($query);
		$req->bindParam(":cus_id", $cus_id, PDO::PARAM_STR);
		
		$req->execute();


		$req->setFetchMode(PDO::FETCH_ASSOC);

		$panier = $req->fetchAll(); 

		$req->closeCursor();
		return $panier;



	} catch (Exception $e) {

		return false;
	}
}