<?php
require_once('./connection.php')
?>
<!-- <form action="success.php" method="POST"> 
<script
    src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="rzp_test_VTQTwtDIBQUCqy" 
    data-amount="<?php echo $order->amount ?>" 
    data-currency="INR"
    data-order_id="<?php echo $order->id ?>"
    data-buttontext="Pay with Razorpay ok"
    data-name="ProVenTech"
    data-description="payment by Us"
    data-image="https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__340.jpg"
    data-prefill.name="Gaurav Kumar"
    data-prefill.email="gaurav.kumar@example.com"
    data-prefill.contact="9999999999"
    data-theme.color="#F37254"
></script>
<input type="hidden" custom="Hidden Element" name="hidden">
</form> -->
<form action="success.php" method="POST" name='razorpayform'>
    <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
    <input type="hidden" name="razorpay_order_id"  id="razorpay_order_id" >
    <input type="hidden" name="razorpay_signature"  id="razorpay_signature" >
</form>
    <button id="rzp-button1">custom Pay buttom</button>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
var options = {
    "key": "rzp_test_VTQTwtDIBQUCqy",
    "amount": "<?php echo $order->amount ?>" ,
    "currency": "INR",
    "name": "Acme Corp",
    "description": "Test Transaction",
    "image": "https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__340.jpg",
    "order_id": "<?php echo $order->id ?>", 
    "handler": function (response){
        // alert(response.razorpay_payment_id);
        // alert(response.razorpay_order_id);
        // alert(response.razorpay_signature);
        document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
        document.getElementById('razorpay_signature').value = response.razorpay_signature;
        document.razorpayform.submit();
    },
    "prefill": {
        "name": "Gaurav Kumar",
        "email": "gaurav.kumar@example.com",
        "contact": "9999999999"
    },
    "notes": {
        "address": "Razorpay Corporate Office"
    },
    "theme": {
        "color": "#F37254"
    }
};
var rzp1 = new Razorpay(options);
document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}
</script>