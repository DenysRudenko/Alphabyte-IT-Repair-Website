<?php

// Include the database connection file
include("../server/connection.php");

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Start a session to handle session data
session_start();

// Initialize the cart array if not already set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Define output variables for login, orders, cart, and order status validation tests
$login_output = ""; // Output for login test
$orders_output = ""; // Output for orders test
$cart_output = ""; // Output for cart operations
$order_status_output = ""; // Output for order status validation

// Function to check if the email exists in the database and return an appropriate message
function checkEmailInDatabase($email) {
    global $conn;
    
    // Prepare the SQL statement
    $stmt = $conn->prepare("SELECT user_email FROM users WHERE user_email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($existingEmail);
    
    // Check if the email exists in the database
    if ($stmt->num_rows() > 0) {
        // Fetch the email and return a success message
        $stmt->fetch();
        return "The email '$existingEmail' is in the database.";
    } else {
        // Return a message indicating the email does not exist
        return "The email '$email' does not exist in the database.";
    }
}

// Function to validate orders by email and return an appropriate message
function validateOrdersByEmail($email) {
    global $conn;

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "<p style='color: red;'>Invalid email format. Please enter a valid email address.</p>";
    }

    // Prepare the SQL statement to count the number of orders
    $stmt = $conn->prepare("SELECT COUNT(*) FROM orders JOIN users ON orders.user_id = users.user_id WHERE users.user_email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($orderCount);
    $stmt->fetch();

    // Check if any orders were found
    if ($orderCount > 0) {
        return "<p style='color: green;'>Orders found for the provided email address.</p>";
    } else {
        return "<p style='color: red;'>No orders found for the provided email address.</p>";
    }
}

// Function to validate order status by email and return the list of orders with their statuses (paid or unpaid)
function validateOrderStatusByEmail($email) {
    global $conn;

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "<p style='color: red;'>Invalid email format. Please enter a valid email address.</p>";
    }

    // Prepare the SQL statement to retrieve order IDs and order statuses based on the given email
    $stmt = $conn->prepare("
        SELECT orders.order_id, orders.order_status
        FROM orders
        JOIN users ON orders.user_id = users.user_id
        WHERE users.user_email = ?
    ");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($order_id, $order_status);
    
    // Initialize output message
    $output = "";
    
    // Fetch each order and construct the output message
    while ($stmt->fetch()) {
        $output .= "<p>Order ID: $order_id - Order Status: $order_status</p>";
    }
    
    // If no results, indicate no orders found
    if ($stmt->num_rows() == 0) {
        $output .= "<p>No orders found for the provided email address.</p>";
    }

    return $output;
}


function getPaymentDetailsByEmail($email) {
    global $conn; // Ensure that $conn is accessible within this function

    // Prepare SQL query to get payment details for the given email
    $stmt = $conn->prepare("
        SELECT p.payment_date, p.transaction_id 
        FROM payments AS p
        INNER JOIN orders AS o ON p.order_id = o.order_id
        INNER JOIN users AS u ON o.user_id = u.user_id
        WHERE u.user_email = ?
    ");

    // Bind the email parameter to the prepared statement
    $stmt->bind_param('s', $email);

    // Execute the prepared statement
    $stmt->execute();

    // Get the result set from the prepared statement
    $result = $stmt->get_result();

    $output = "";
    // Check if any results are returned
    if ($result->num_rows > 0) {
        // Fetch the result as an associative array
        while ($row = $result->fetch_assoc()) {
            $output .= "<p>Payment Date: " . $row['payment_date'] . "<br></p>";
            $output .= "<p>Transaction ID: " . $row['transaction_id'] . "<br></p>";
        }
    } else {
        // No results found for the provided email address
        $output = "No payment details found for the provided email address.";
    }
    

    // Close the prepared statement
    //$stmt->close();
    return $output;
}



// Function to calculate total cart price and quantity
function calculateTotalCart() {
    $total_price = 0;
    $total_quantity = 0;

    // Iterate over each product in the cart
    foreach ($_SESSION['cart'] as $product) {
        // Calculate total price and quantity
        $total_price += $product['product_price'] * $product['product_quantity'];
        $total_quantity += $product['product_quantity'];
    }
    
    // Store the total price and quantity in the session
    $_SESSION['total'] = $total_price;
    $_SESSION['quantity'] = $total_quantity;
}

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Edit product quantity in the cart
    if (isset($_POST['edit_quantity'])) {
        // Retrieve product ID and new quantity from the form
        $product_id = $_POST['product_id'];
        $new_quantity = $_POST['product_quantity'];

        // Update the product quantity if the product exists in the cart
        if (isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id]['product_quantity'] = $new_quantity;
            calculateTotalCart();
            $cart_output .= "<p>Product quantity updated!</p>";
        } else {
            // Add message if the product is not found in the cart
            $cart_output .= "<p>Product not found in cart!</p>";
        }
    }
    // Handle the 4th validation test for order status by email
    elseif (isset($_POST['order_status_test_btn'])) {
        // Get the submitted email for the order status test
        $email = $_POST['order_status_email'];
        // Perform the order status test and store feedback in $order_status_output
        $order_status_output = validateOrderStatusByEmail($email);
    }
}

?>
