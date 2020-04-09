<?php
	include 'includes/session.php';

	if(isset($_POST['activate'])){
		$id = $_POST['id'];
		
		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("UPDATE admins	 SET status=:status WHERE id=:id");
			$stmt->execute(['status'=>1, 'id'=>$id]);
			$_SESSION['success'] = 'User activated successfully and email sent successfully';
			$headers = "From: HydroFarm";

			// Make Query
			$query = "SELECT * FROM admins WHERE id=:id";

			// Get Data From Connection Using The Above Data ($id)
			$stmt = $conn->prepare($query);
			$email = "";

			// Parse Email From Data
			$stmt->execute(['id'=>$id]);

			$result = $stmt->get_result();
			if($result->num_rows == 1){
				while($data = $result->fetch_assoc()){
					$email = $data['email'];
				}
			}

			mail($email, 
				"Admin Activation Message", 
				"Your Account With Hydro Farm Has Been Activate By Admin. Now You Can Login. Thanks", 
				$headers);
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();

	}
	else{
		$_SESSION['error'] = 'Select user to activate first';
	}

	header('location: admin_users.php');
?>