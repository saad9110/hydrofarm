<?php

$con = @mysqli_connect('localhost', 'root', '', 'ecomm');
 
	if(!$con) {
		echo "Error" . mysqli_connect_error();
		exit();
		
	}

  //  $query = mysqli_query($con,"SELECT * FROM ordernumber ORDER BY ordernum_id DESC LIMIT 0, 1");
	//$result = mysqli_fetch_array($query);
	//$orderid = $result['ordernum_id']+1;
	//echo $orderid;
    //exit;
    $status = "Pending";
    $userid = $_SESSION['user'];
  //  $sql = "INSERT INTO ordernumber (ordernum_category,id) VALUES ('$status', '$userid')";
   // $result = $con->query($sql);
   // exit;
?>
