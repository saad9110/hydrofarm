<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		
		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("DELETE FROM admins WHERE id=:id");
			$stmt->execute(['id'=>$id]);

			$_SESSION['success'] = 'Admin deleted successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Select Admin to delete first';
	}

	header('location: admin_users.php');
	
?>