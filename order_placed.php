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
					
					

				$output['message'] = 'Order Has be placed';
			}
			$stmt = $conn->prepare("DELETE FROM cart WHERE user_id=:user_id");
			$stmt->execute(['user_id'=>$user['id']]);

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

