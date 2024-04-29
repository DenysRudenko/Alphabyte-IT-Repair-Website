<?php
// Include the validation functions

include("validation.php");

// Initialize output variables
$login_output = "";
$orders_output = "";
$cart_output = "";
$order_status_output = "";
$payment_date_output = "";


if (isset($_POST['payment_status_test_btn']) && !empty($_POST['order_status_email'])) {
    $email = $_POST['order_status_email'];
    $payment_date_status = getPaymentDetailsByEmail($email); // Call the function and capture the output
}

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle login test form submission
    if (isset($_POST['login_test_btn'])) {
        // Get the submitted email for the login test
        $email = $_POST['login_email'];
        // Perform the login test and store feedback in $login_output
        $login_output = checkEmailInDatabase($email);
    }
    // Handle orders test form submission
    elseif (isset($_POST['orders_test_btn'])) {
        // Get the submitted email for the orders test
        $email = $_POST['orders_email'];
        // Perform the orders test and store feedback in $orders_output
        $orders_output = validateOrdersByEmail($email);
    }
    // Handle edit quantity test form submission
    elseif (isset($_POST['edit_quantity'])) {
        // Retrieve product ID and new quantity from the form
        $product_id = $_POST['product_id'];
        $new_quantity = $_POST['product_quantity'];

        // Perform the quantity edit and store feedback in $cart_output
        $cart_output = editProductQuantityInCart($product_id, $new_quantity);
    }
    // Handle order status test form submission
    elseif (isset($_POST['order_status_test_btn'])) {
        // Get the submitted email for the order status test
        $email = $_POST['order_status_email'];
        // Perform the order status test and store feedback in $order_status_output
        $order_status_output = validateOrderStatusByEmail($email);
    }
    // Handle payment date test form submission
    elseif (isset($_POST['payment_date_test_btn'])) {
        // Get the submitted email for the payment date test
        $email = $_POST['payment_date_email'];
        // Perform the payment date test and store feedback in $payment_date_output
        $payment_date_output = getPaymentDetailsByEmail($email);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Validation Tests Page</title>
</head>

<body>

<section class="my-5 py-5">
    <div class="container text-center mt-3 pt-5">
        <h1>Validation Tests</h1>

        <!-- Form for Login Validation Tests -->
        <form id="login-form" method="POST" action="">
            <h2>Login Test</h2>
            <div class="form-group">
                <label for="login-email">Email:</label>
                <input id="login-email" class="form-control" name="login_email" type="text" required>
            </div>
            <div class="form-group">
                <input name="login_test_btn" class="btn order-details-btn" type="submit" value="Submit">
            </div>
        </form>

        <div id="login_output">
            <p style="color: green;">
                <?php echo $login_output; ?>
            </p>
        </div>
    </div>
</section>

<section class="my-5 py-5">
    <div class="container text-center mt-3 pt-5">

        <!-- Form for Orders Validation Tests -->
        <form id="orders-form" method="POST" action="">
            <h2>Orders Test by Email</h2>
            <div class="form-group">
                <label for="orders-email">Email:</label>
                <input id="orders-email" class="form-control" name="orders_email" type="text" required>
            </div>
            <div class="form-group">
                <input name="orders_test_btn" class="btn order-details-btn" type="submit" value="Submit">
            </div>
        </form>

        <div id="orders_output">
            <p style="color: green;">
                <?php echo $orders_output; ?>
            </p>
        </div>
    </div>
</section>

<section class="my-5 py-5">
    <div class="container text-center mt-3 pt-5">
        <h2>Order Status Test by Email</h2>

        <!-- Form for Order Status Test -->
        <form id="order-status-form" method="POST" action="">
            <div class="form-group">
                <label for="order-status-email">Email:</label>
                <input id="order-status-email" class="form-control" name="order_status_email" type="text" required>
            </div>
            <div class="form-group">
                <input name="order_status_test_btn" class="btn order-details-btn" type="submit" value="Submit">
            </div>
        </form>

        <!-- Output for Order Status Test -->
        <div id="order_status_output">
            <p style="color: green;">
                <?php echo $order_status_output; ?>
            </p>
        </div>
    </div>
</section>


<section class="my-5 py-5">
    <div class="container text-center mt-3 pt-5">
        <h2>Payment Date Test by Email</h2>

        <!-- Form for Payment Date Test -->
        <form id="order-status-form" method="POST" action="">
            <div class="form-group">
                <label for="payment-status-email">Email:</label>
                <input id="payment-status-email" class="form-control" name="payment_date_email" type="email" required>
            </div>
            <div class="form-group">
                <input name="payment_date_test_btn" class="btn btn-primary" type="submit" value="Submit">
            </div>
        </form>

        <!-- Output for Payment Date Test -->
        <div id="payment_date_status">
            <p style="color: <?php echo isset($payment_date_output) && strpos($payment_date_output, 'No payment details') === false ? 'green' : 'red'; ?>;">
                <?php echo $payment_date_output; ?>
            </p>
        </div>
    </div>
</section>


<section class="my-5 py-5">
    <div class="container text-center mt-3 pt-5">
        <h2>Cart Test</h2>

        <!-- Form for editing quantity in the cart -->
        <form id="edit-quantity-form" method="POST" action="">
            <h3>Edit Quantity in Cart</h3>
            <div class="form-group">
                <label for="edit_product_id">Product ID:</label>
                <input id="edit_product_id" class="form-control" name="product_id" type="number" required>
            </div>
            <div class="form-group">
                <label for="edit_product_quantity">New Quantity:</label>
                <input id="edit_product_quantity" class="form-control" name="product_quantity" type="number" required>
            </div>
            <input type="hidden" name="edit_quantity" value="true">
            <div class="form-group">
                <input name="edit_quantity_test" class="btn order-details-btn" type="submit" value="Edit Quantity">
            </div>
        </form>

        <!-- Output for cart operations -->
        <div id="cart_output">
            <p style="color: green;">
                <?php echo $cart_output; ?>
            </p>
        </div>
    </div>
</section>

</body>

</html>

