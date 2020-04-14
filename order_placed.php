<?php
	include 'includes/session.php';
	$conn = $pdo->open();


	if(isset($_SESSION['user'])){
		try{
            $stmt = $conn->prepare("SELECT * FROM cart WHERE user_id=:user_id");
			$stmt->execute(['user_id'=>$user['id']]);
			foreach($stmt as $row){

                    $stmt = $conn->prepare("INSERT INTO `order` (user_id, product_id, quantity) VALUES (:user_id, :product_id, :quantity)");
					$stmt->execute(['user_id'=>$user['id'], 'product_id'=>$row['product_id'], 'quantity'=>$row['quantity']]);
					
			try{
				$stmt = $conn->prepare("SELECT * FROM `order` LEFT JOIN products ON products.id=order.product_id WHERE user_id=:user_id");
				$stmt->execute(['user_id'=>$user['id']]);

				foreach($stmt as $row){

					$stmt = $conn->prepare("INSERT INTO `details` (order_id, product_id, quantity) VALUES (:order_id, :product_id, :quantity)");
					$stmt->execute(['order_id'=>$row['id'], 'product_id'=>$row['product_id'], 'quantity'=>$row['quantity']]);
				}
				$stmt = $conn->prepare("DELETE FROM cart WHERE user_id=:user_id");
				$stmt->execute(['user_id'=>$user['id']]);
				
			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
				$output['message'] = 'Order Has be placed';
			}
		

		}
		catch(PDOException $e){
			$output['message'] = $e->getMessage();
		}
	}
	else{
		header('location: home.php');
		
	}

	$pdo->close();
	echo json_encode($output);

?>

