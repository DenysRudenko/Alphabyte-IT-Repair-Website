<?php

include("../../layouts/header2.php");

if(isset($_POST['order_pay_btn'])) {
   $order_status = $_POST['order_status'];
   $order_total_price = $_POST['order_total_price'];
}

?>
   <!-- Payment -->

    <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="form-weight-bold">Payment</h2>
            <hr class="mx-auto">
        </div>
        <div class="mx-auto container text-center">


        <?php if(isset($_POST['order_status']) && $_POST['order_status'] == "not paid") { ?>
                <?php $amount = strval($_POST['order_total_price']); ?>
                <?php $order_id = $_POST['order_id']; ?>
                <p>Total payment: $ <?php echo $_POST['order_total_price']; ?></p>
                <div id="paypal-button-container"></div>

            <?php } else if(isset($_SESSION['total']) && $_SESSION['total'] != 0) {?>
            <?php $amount = strval($_SESSION['total']); ?>
            <?php $order_id = $_SESSION['order_id']; ?>
            <p>Total payment: $ <?php echo $_SESSION['total']; ?></p>

            <div id="paypal-button-container"></div>
        

            <?php } else { ?>
                
                <p style="color: red;">You dont have an order!</p>

            <?php } ?>
                     
        </div>
    </section>

    

<!-- Include the PayPal JavaScript SDK; replace "test" with your own sandbox Business ID -->
<script src="https://www.paypal.com/sdk/js?client-id=AYXRYAMvxvOOJ2DhppgHbKNaFfp2HHtYZdO21HJHkeVfuxZiX2ZLQVD-uaEm1ITYQgZg-Pv4FiTF2Wcp&currency=USD"></script>



<script>
  paypal.Buttons({

    // Sets up the transaction when a payment button is clicked

    createOrder: function(data, actions) {
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: '<?php echo $amount; ?>'
          }
        }]
      });
    },

    // Finalize the transaction after payer approval
    onApprove: function(data, actions) {
    return actions.order.capture().then(function(orderData) {

        // Successful capture! For dev/demo purposes:

        console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
        var transaction = orderData.purchase_units[0].payments.captures[0];
        alert('Transaction ' + transaction.status + ': ' + transaction.id + '\n\nSee console for all available details.');
        

        window.location.href = "../../server/complete_payment.php?transaction_id="+transaction.id+"&order_id="+<?php echo $order_id; ?>;

        // When ready to go live, remove the alert and show a success message within this page. For example:
        // var element = document.getElementById('paypal-button-container');
        // element.innerHTML = '';
        // element.innerHTML = '<h3>Thank you for your payment!</h3>';
        // Or go to another URL: actions.redirect('thank_you.html');

    });
    }
}).render('#paypal-button-container');

</script>


<?php 

include("../../layouts/footer2.php");

?>
