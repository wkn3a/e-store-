<?php
function ajout_order_line ($id, $st_products_pro_id, $ord_lines_qt, $ord_lines_price) {
 	global $pdo;
		try {
			$query = "INSERT INTO st_orders_lines (st_orders_ord_id, st_products_pro_id, ord_lines_qt, ord_lines_price) 
								VALUES (:st_orders_ord_id, :st_products_pro_id, :ord_lines_qt, :ord_lines_price);";

	
			$req = $pdo->prepare($query);
			$req->bindParam(":st_orders_ord_id", $id, PDO::PARAM_INT);
			$req->bindParam(":st_products_pro_id", $st_products_pro_id, PDO::PARAM_STR);
			$req->bindParam(":ord_lines_qt", $ord_lines_qt, PDO::PARAM_STR);
			$req->bindParam(":ord_lines_price", $ord_lines_price, PDO::PARAM_STR);

			$req ->execute();


		} catch (Exception $e) {
			return false;
		}
	

}