<?php
error_reporting(0);
session_start();
$update = 0;
$con = @mysqli_connect('localhost', 'root', '', 'ecomm');



$cancel = $_GET['deleteid'];
//echo $cancel;
//exit;
$orderstatus = $_GET['orderstatus'];
$update = $_GET['updateid'];
$getstatus = $_GET['getstatus'];
if($getstatus == 'neworder'){


	$query_email = "SELECT * FROM `ordernumber` where `readstatus` = 0";
 $result2 = mysqli_query($con, $query_email);
  $result2 = mysqli_num_rows($result2);

echo $result2."";


	//  $orders = "SELECT count(`readstatus`) as count FROM `ordernumber` where `readstatus` = 0";
            //          $result1 = $con->query($orders);
                   //  $order_data = mysqli_fetch_array($result1);
                   //  $result = $order_data['count'];
                   //  echo $result;

}



if($orderstatus == 'ordercheck'){
	$sql = "update `ordernumber` set `readstatus` = 1 where `readstatus` = 0"; 
   $result = $con->query($sql);
}
if($update != 0){
   $sql = "update `ordernumber` set ordernum_category = 'Completed' where ordernum_id = '".$update."'"; 
   $result = $con->query($sql);
    header("Location: order_view.php");
}

if($cancel != null){
    $sql = "update `ordernumber` set ordernum_category = 'Cancel' where ordernum_id = '".$cancel."'"; 
    $update_result = $con->query($sql);
    header("Location: order_view.php");
}
//$name = $_GET['name'];
$price = $_GET['price'];
$user_id = $_GET['user_id'];
if($price != null || $userd_id != null)
{

    $query_email = "SELECT * FROM `sales` where `order_id` = $user_id";
 $result2 = mysqli_query($con, $query_email);
  $result2 = mysqli_num_rows($result2);

if($result2 <= 0)
{


$sql = "INSERT INTO `sales` (pay_id,order_id) VALUES ('$price','$user_id')";
$result= $con->query($sql);
header("Location: order_view.php");
}
else{
    header("Location: order_view.php");
    echo "alreday exists" ; 
}
}

$del = $_GET['condeleteid'];
if($del != null){
$sql = "DELETE FROM `sales` WHERE `order_id` = $del";
$result= $con->query($sql);
header("Location: sales.php");
}
?>