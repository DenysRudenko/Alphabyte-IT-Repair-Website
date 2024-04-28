<?php
// include("../layouts/header2.php");
include("validation.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Validation Tests Page</title>
    <!-- Add custom CSS styling here if needed -->
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
                <input id="login-email" class="form-control" name="email" type="text" required>
            </div>

            <!-- <div class="form-group">
                <label for="login-password">Password:</label>
                <input id="login-password" class="form-control" name="password" type="password" required>
            </div> -->

            <div class="form-group">
                <input name="login_test" class="btn order-details-btn" type="submit" value="Submit">
            </div>
        </form>

       

        <div id="output">
            <!-- The output of the PHP script will be displayed here -->
                 
            <p style="color: green;">
                <?php
                echo $output;

                ?>
            </p> 
        </div>


        <!-- Form for Login Validation Tests -->
        <form id="login-form" method="POST" action="">
            <h2>Password Test</h2>
            
            <!-- <div class="form-group">
                <label for="login-email">Email:</label>
                <input id="login-email" class="form-control" name="email" type="text" required>
            </div> -->

            <div class="form-group">
                <label for="login-password">Password:</label>
                <input id="login-password" class="form-control" name="password" type="password" required>
            </div>

            <div class="form-group">
                <input name="login_test" class="btn order-details-btn" type="submit" value="Submit">
            </div>
        </form>


    </div>

</section>    


</body>

</html>

<body>
<section class="my-5 py-5">
    <div class="container text-center mt-3 pt-5">

        

        <!-- Form for Cart Tests (Add, Remove, Edit Quantity) -->
        <form id="cart-form" method="POST" action="validation_tests.php">
            <h2>Cart Tests</h2>

            <!-- Add a product to the cart -->
            <div class="form-group">
                <h3>Add Product to Cart</h3>
                <label for="product_id">Product ID:</label>
                <input id="product_id" class="form-control" name="product_id" type="number" required>
                <label for="product_name">Product Name:</label>
                <input id="product_name" class="form-control" name="product_name" type="text" required>
                <label for="product_price">Product Price:</label>
                <input id="product_price" class="form-control" name="product_price" type="number" step="0.01" required>
                <label for="product_quantity">Quantity:</label>
                <input id="product_quantity" class="form-control" name="product_quantity" type="number" required>
                <input type="hidden" name="add_to_cart" value="true">
                <input name="add_to_cart_test" class="btn order-details-btn" type="submit" value="Add to Cart">
            </div>

            <!-- Remove a product from the cart -->
            <div class="form-group">
                <h3>Remove Product from Cart</h3>
                <label for="remove_product_id">Product ID:</label>
                <input id="remove_product_id" class="form-control" name="product_id" type="number" required>
                <input type="hidden" name="remove_product" value="true">
                <input name="remove_product_test" class="btn order-details-btn" type="submit" value="Remove from Cart">
            </div>

            <!-- Edit product quantity in the cart -->
            <div class="form-group">
                <h3>Edit Quantity in Cart</h3>
                <label for="edit_product_id">Product ID:</label>
                <input id="edit_product_id" class="form-control" name="product_id" type="number" required>
                <label for="edit_product_quantity">New Quantity:</label>
                <input id="edit_product_quantity" class="form-control" name="product_quantity" type="number" required>
                <input type="hidden" name="edit_quantity" value="true">
                <input name="edit_quantity_test" class="btn order-details-btn" type="submit" value="Edit Quantity">
            </div>
        </form>

        <!-- Results container (formerly output) -->
        <div id="results">
            <!-- The output of the PHP script will be displayed here -->
            <p style="color: green;">
                <?php
                // Include the validation tests PHP script
                include("validation2.php");
                ?>
            </p>
        </div>

    </div>
</section>

</body>

</html>



<?php
// include("../../layouts/footer2.php");
?>
