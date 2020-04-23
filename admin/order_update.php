<?php
error_reporting(0);
session_start();
$update = 0;
$con = @mysqli_connect('localhost', 'root', '', 'ecomm');



$cancel = $_GET['deleteid'];
//echo $cancel;
//exit;

$update = $_GET['updateid'];
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

$sql = "INSERT INTO `sales` (pay_id,user_id) VALUES ('$price','$user_id')";
$result= $con->query($sql);
header("Location: order_view.php");

?>