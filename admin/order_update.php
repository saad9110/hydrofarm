<?php
error_reporting(0);
session_start();
$update = 0;
$con = @mysqli_connect('localhost', 'root', '', 'ecomm');

$type = $_GET['requestType'];

if($type == "update"){
    $update = $_GET['updateid'];
    $sql = "update `ordernumber` set ordernum_category = 'Completed' where ordernum_id = '".$update."'"; 
    $result = $con->query($sql);
    header("Location: order_view.php");
}else if($type == "cancel"){
    $cancel = $_GET['deleteid'];
    $sql = "update `ordernumber` set ordernum_category = 'Cancel' where ordernum_id = '".$cancel."'"; 
    $update_result = $con->query($sql);
    header("Location: order_view.php");
}else if($type == "move"){
    $name = $_GET['name'];
    $price = $_GET['price'];
    $user_id = $_GET['user_id'];

    $query = `SELECT * FROM sales WHERE user_id is $user_id`;
    $preReqResult = $result= $con->query($query);
    if($preReqResult!=null){
        $sql = "INSERT INTO `sales` (pay_id,user_id) VALUES ('$price','$user_id')";
        $result= $con->query($sql); 
        header("Location: order_view.php");
    }else {
        echo "alert(\"Data already Exist\");";
        header("Location: order_view.php");
    }
}

?>