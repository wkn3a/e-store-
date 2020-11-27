<?php
function ajout_order_livraison ($form) {
 	global $pdo;
		try {
			$query = "INSERT INTO st_orders (st_customers_cus_id, st_types_of_logistics_typ_log_id, st_address_billing, st_address_delivery, ord_total, ord_qt) 
								VALUES (:st_customers_cus_id, :st_types_of_logistics_typ_log_id, :st_address_billing, :st_address_delivery, 0, 0)";

	
			$req = $pdo->prepare($query);
			$req->bindParam(":st_customers_cus_id", $form['st_customers_cus_id'], PDO::PARAM_STR);
			$req->bindParam(":st_types_of_logistics_typ_log_id", $form['st_types_of_logistics_typ_log_id'], PDO::PARAM_STR);
			$req->bindParam(":st_address_billing", $form['st_address_billing'], PDO::PARAM_STR);
			$req->bindParam(":st_address_delivery", $form['st_address_delivery'], PDO::PARAM_STR);


			$req ->execute();


		} catch (Exception $e) {
			return false;
		}
	

}
