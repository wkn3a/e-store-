<?php
function update_order($cus_id, $ord_total, $ord_qt) {
 	global $pdo;
		try {
			$query = "UPDATE st_orders SET ord_total = :ord_total, ord_qt = :ord_qt 
								WHERE st_customers_cus_id =:cus_id ORDER BY ord_id DESC LIMIT 1";

	
			$req = $pdo->prepare($query);
			$req->bindParam(":cus_id", $cus_id, PDO::PARAM_STR);
			$req->bindParam(":ord_total", $ord_total, PDO::PARAM_STR);
			$req->bindParam(":ord_qt", $ord_qt, PDO::PARAM_STR);
			


			$req ->execute();


		} catch (Exception $e) {
			return false;
		}
	

}
