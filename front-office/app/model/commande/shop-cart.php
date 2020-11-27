<?php

function afficher_panier($cus_id) {
	global $pdo; 
	
	try {
		$query = "SELECT * FROM st_caddies, st_products
		 WHERE st_customers_cus_id =:cus_id
		 AND st_products_pro_id= pro_ID
			ORDER BY cad_date";
			
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

function afficher_produit($cus_id, $pro_id) {
	global $pdo; 
	
	try {
		$query = "SELECT * FROM st_caddies, st_products
		 WHERE st_customers_cus_id =:cus_id
		 AND st_products_pro_id= pro_ID
		 AND st_products_pro_id= :pro_id
		";
			
		$req= $pdo->prepare($query);
		$req->bindParam(":cus_id", $cus_id, PDO::PARAM_STR);
		$req->bindParam(":pro_id", $pro_id, PDO::PARAM_INT);
		$req->execute();


		$req->setFetchMode(PDO::FETCH_ASSOC);

		$panier = $req->fetchAll(); 

		$req->closeCursor();
		return $panier;



	} catch (Exception $e) {

		return false;
	}
}