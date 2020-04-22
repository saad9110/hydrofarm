<?php
	include 'includes/session.php';
	$conn = $pdo->open();

    

	if(isset($_SESSION['user'])){
       
        $con = @mysqli_connect('localhost', 'root', '', 'ecomm');
        $query = mysqli_query($con,"SELECT * FROM ordernumber ORDER BY ordernum_id DESC LIMIT 0, 1");
        $result = mysqli_fetch_array($query);
        $row['ordernum_id'] = $result['ordernum_id']+1;
        $orderid = $result['ordernum_id']+1;
        $orderstatus = "Pending";
            $userid =$_SESSION['user'];
        	$sql = "INSERT INTO ordernumber (ordernum_category,id) VALUES ('$orderstatus', '$userid')";
				$result = $con->query($sql);

		try{
            $stmt = $conn->prepare("SELECT * FROM cart WHERE user_id=:user_id");
			$stmt->execute(['user_id'=>$user['id']]);
			foreach($stmt as $row){

                    $stmt = $conn->prepare("INSERT INTO `order` (user_id, product_id, quantity,ordernum_id) VALUES (:user_id, :product_id, :quantity,:ordernum_id)");
					$stmt->execute(['user_id'=>$user['id'], 'product_id'=>$row['product_id'], 'quantity'=>$row['quantity'], 'ordernum_id'=>$orderid]);
					
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

