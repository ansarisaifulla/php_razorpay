<?php
require_once './connection.php';
$payment_id=$_POST['razorpay_payment_id'];
$order_id=$_POST['razorpay_order_id'];
$signature_hash=$_POST['razorpay_signature'];
$insertQuery="insert into pay_razor(payment_id,order_id,signature_hash) 
values ( '$payment_id','$order_id','$signature_hash')";
// ,'".$_POST['razorpay_order_id']"' , '".$_POST['razorpay_signature']"' 

//   if($con->ques)
 if(mysqli_query($con,$insertQuery))
 {
    echo "inserted ";
 }
 else{
    echo "not inserted";
 }
echo "succcess";
?>