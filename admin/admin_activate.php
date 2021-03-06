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
			

			// Get Data From Connection Using The Above Data ($id)
			$stmt = $conn->prepare("SELECT email FROM admins WHERE id=:id");
			$email = "";

			// Parse Email From Data
			$stmt->execute(['id'=>$id]);
			$result = $stmt->fetch();
			$email = $result['email'];

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