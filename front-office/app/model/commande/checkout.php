<?php


function mode_livraison() {

	global $pdo; 
	
	try {

		$query = "
		    SELECT *
		    FROM st_types_of_logistics 
                ";

		$req= $pdo->prepare($query);
	
		$req->execute();
		$req->setFetchMode(PDO::FETCH_ASSOC);
      	$data = $req->fetchAll();
      	$req->closeCursor();
      	return $data;
		

	} catch (Exception $e) {
		return false;
	}
}

function mode_paiement() {

	global $pdo; 
	
	try {

		$query = "
		    SELECT *
		    FROM st_types_of_payments 
                ";

		$req= $pdo->prepare($query);
	
		$req->execute();
		$req->setFetchMode(PDO::FETCH_ASSOC);
      	$data = $req->fetchAll();
      	$req->closeCursor();
      	return $data;
		

	} catch (Exception $e) {
		return false;
	}
}
