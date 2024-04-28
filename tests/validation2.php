<?php
// Include the header file for page layout
// include("../../layouts/header2.php");

// Start a session to handle session data (e.g., cart)
// session_start();

// Initialize the output variable
$results = "";

// Function to calculate total cart price and quantity
function calculateTotalCart() {
    $total_price = 0;
    $total_quantity = 0;

    // Iterate over each product in the cart
    foreach ($_SESSION['cart'] as $key => $product) {
        $price = $product['product_price'];
        $quantity = $product['product_quantity'];

        // Calculate total price and quantity
        $total_price += $price * $quantity;
        $total_quantity += $quantity;
    }
    
    // Store the total price and quantity in the session
    $_SESSION['total'] = $total_price;
    $_SESSION['quantity'] = $total_quantity;
}

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check for 'add_to_cart' action
    if (isset($_POST['add_to_cart'])) {
        // Get product details from form input
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_quantity = $_POST['product_quantity'];

        // Check if product already exists in the cart
        if (!array_key_exists($product_id, $_SESSION['cart'])) {
            // Add product to cart if not already present
            $_SESSION['cart'][$product_id] = [
                'product_id' => $product_id,
                'product_name' => $product_name,
                'product_price' => $product_price,
                'product_quantity' => $product_quantity
            ];
            calculateTotalCart();
            // Add success message to results
            $results .= "<p>Product added to cart successfully!</p>";
        } else {
            // Add message if product is already in cart
            $results .= "<p>Product already in cart!</p>";
        }
    }
    // Check for 'remove_product' action
    elseif (isset($_POST['remove_product'])) {
        $product_id = $_POST['product_id'];
        // Remove product from cart if it exists
        if (isset($_SESSION['cart'][$product_id])) {
            unset($_SESSION['cart'][$product_id]);
            calculateTotalCart();
            $results .= "<p>Product removed from cart!</p>";
        } else {
            // Add message if product not found in cart
            $results .= "<p>Product not found in cart!</p>";
        }
    }
    // Check for 'edit_quantity' action
    elseif (isset($_POST['edit_quantity'])) {
        $product_id = $_POST['product_id'];
        $new_quantity = $_POST['product_quantity'];
        
        // Update product quantity in cart
        if (isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id]['product_quantity'] = $new_quantity;
            calculateTotalCart();
            $results .= "<p>Product quantity updated!</p>";
        } else {
            // Add message if product not found in cart
            $results .= "<p>Product not found in cart!</p>";
        }
    }
}

// Output the results
echo $results;

// Include the footer file for page layout
// include("../../layouts/footer2.php");
?>
