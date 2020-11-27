<?php


function insertion_paiement($typpay, $cus, $payamount, $ordid) {
	global $pdo; 
	
	try {

		$query = "
					
		    INSERT INTO st_payments(st_types_of_payments_typ_pay_id, st_customers_cus_id, pay_amount, st_orders_ord_id)
		    VALUES ( :typ_pay_id, :st_customers_cus_id, :pay_amount, :st_orders_ord_id)";

 
		$req= $pdo->prepare($query);

		$req->bindParam(":typ_pay_id", $typpay, PDO::PARAM_INT);
		$req->bindParam(":st_customers_cus_id", $cus, PDO::PARAM_INT);
		$req->bindParam(":pay_amount", $payamount, PDO::PARAM_STR);
		$req->bindParam(":st_orders_ord_id", $ordid, PDO::PARAM_INT);

		$req->execute();

		

	} catch (Exception $e) {
		die ("SQL Erreur : " . utf8_encode($e->getMessage()));
	}
}

 

