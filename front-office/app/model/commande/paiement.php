<?php


function validation_commande() {
	global $pdo; 
	try {

		$query = " SELECT cus_id, typ_log_id, add_id, pay_amount, cad_qt
			FROM st_customers, st_types_of_logistics, st_addresses, st_payments, st_caddies
			WHERE typ_log_id = typ_log_price
			AND cus_id = ". $_SESSION["user"]["cus_id"]."
			AND pay_amount = pay_id
			AND add_id = add_address1
			 ";

		$req= $pdo->prepare($query);
		$req->execute();
		$req->setFetchMode(PDO::FETCH_ASSOC);
      	$commande = $req->fetch();
      	$req->closeCursor();
      	return $commande;		

	} catch (Exception $e) {
		die ("SQL Erreur : " . utf8_encode($e->getMessage()));
	}
}


function insertion_commande($cus, $typ_log, $add, $pay, $cad) {
	global $pdo; 
	
	try {

		$query = "
		    INSERT INTO st_orders(st_customers_cus_id, st_types_of_logistics_typ_log_id, st_address_billing, st_address_delivery, ord_total, ord_qt)
		    VALUES (:cus_id, :typ_log_id, :add_id, :add_id2, :pay_amount, :cad_qt)";
		
 
		$req= $pdo->prepare($query);

		$req->bindParam(":cus_id", $_SESSION["user"]['cus_id'], PDO::PARAM_INT);
		$req->bindParam(":typ_log_id", $typ_log, PDO::PARAM_INT);
		$req->bindParam(":add_id", $add, PDO::PARAM_INT);
		$req->bindParam(":add_id2", $add, PDO::PARAM_INT);
		$req->bindParam(":pay_amount", $pay, PDO::PARAM_INT);
		$req->bindParam(":cad_qt", $cad, PDO::PARAM_INT);

		$req->execute();
		
		
		

	} catch (Exception $e) {
		die ("SQL Erreur : " . utf8_encode($e->getMessage()));
	}
}

 

