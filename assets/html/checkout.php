<?php

include("../../layouts/header2.php");

if( !empty($_SESSION["cart"])) {
    // let user in

    // send user to home page
}else{
  header('location: ../../index.php');
}

?>

   <!-- Checkout -->

    <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="form-weight-bold">Checkout</h2>
            <hr class="mx-auto">
        </div>
        <div class="mx-auto container">
            <form id="checkout-form" method="POST" action="../../server/place_order.php">
            
            <p class="text-center" style="color: red;">
                <?php if(isset($_GET['message'])) { echo $_GET['message'];} ?>
                <?php if(isset($_GET['message'])) {?>

                    <a class="btn btn-primary" href="login.php">Login</a>

                <?php } ?>
            </p>
            
              <div class="form-group checkout-small-element">
                    <label for="">Name</label>
                    <input placeholder="Name" required id="checkout-name" class="form-control" name="name" type="text">
                </div>
                <div class="form-group checkout-small-element">
                    <label for="">Email</label>
                    <input placeholder="Email" required id="checkout-email" class="form-control" name="email" type="text">
                </div>
                <div class="form-group checkout-small-element">
                    <label for="">Phone</label>
                    <input placeholder="Phone Number" required id="checkout-password" class="form-control" name="phone" type="tel">
                </div>
                <div class="form-group checkout-small-element">
                    <label for="">City</label>
                    <input placeholder="City" required id="checkout-city" class="form-control" name="city" type="text">
                </div>
                <div class="form-group checkout-large-element">
                    <label for="">Address</label>
                    <input placeholder="City" required id="checkout-address" class="form-control" name="address" type="text">
                </div>
                <div class="form-group checkout-btn-container">
                    <p>Total amount: $ <?php echo $_SESSION['total']; ?></p>
                    <input id="checkout-btn" class="btn" type="submit" name="place_order" value="Place Order">
                </div>
            </form>
        </div>
    </section>


<?php 

include("../../layouts/footer2.php");

?>