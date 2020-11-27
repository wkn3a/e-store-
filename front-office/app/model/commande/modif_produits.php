<?php
function modif_produits ($cus_id, $pro_id, $cad_qt){
	global $pdo;
	
try {
				$query = "UPDATE st_caddies SET cad_qt = :cad_qt
											WHERE st_customers_cus_id = :cus_id
											AND st_products_pro_id = :pro_id";
			
				$req = $pdo->prepare($query);
				
				$req->bindParam(":cus_id", $cus_id, PDO::PARAM_STR);
				$req->bindParam(":pro_id", $pro_id, PDO::PARAM_STR);
				$req->bindParam(":cad_qt", $cad_qt, PDO::PARAM_STR);
	
				$req ->execute();

				return true;
			
			} catch (Exception $e) {
					return false;
			}
	
}

		