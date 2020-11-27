<?php

function qt_total() {
global $pdo; 
	
	try {
		$query = "
		    SELECT SUM(cad_qt) AS cad_qt_count
			FROM st_caddies
			WHERE st_customers_cus_id = :cus_id";

		$req= $pdo->prepare($query);

		$req->bindParam(":cus_id", $_SESSION["user"]["cus_id"], PDO::PARAM_STR);

		$req->execute();

		$req->setFetchMode(PDO::FETCH_ASSOC);
		$qt = $req->fetch(); 


		$req->closeCursor();
		return $qt;

	} catch (Exception $e) {

		return false;
	}
	
}