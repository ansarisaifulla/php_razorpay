 <?php 

$username = "root";
$password = "";
$server ="127.0.0.1";
$db ="razorpay";

$con = mysqli_connect($server,$username,$password,$db);


if($con){
echo "connected"; 
	
}
else
{
	echo "no connection";
}


// <?php
require_once './Razorpay.php';
$amt=10*100;
use Razorpay\Api\Api ;
$key_id='rzp_test_VTQTwtDIBQUCqy';
$key_secret='uWk8Hp4jDtvvFcs5WeGWlhYH';
$api=new Api($key_id,$key_secret);
$order  = $api->order->create([
    'receipt'         => 'order_rcptid_11',
    'amount'          => $amt, // amount in the smallest currency unit
    'currency'        => 'INR',// <a href="/docs/payment-gateway/payments/international-payments/#supported-currencies" target="_blank">See the list of supported currencies</a>.)
    'payment_capture' =>  '0'
  ]);
?>