<?php

// Include the connection to database
include('connection.php');

// Database Querry 
$stmt = $conn->prepare("SELECT * FROM products WHERE product_category='gpus' LIMIT 4");

// Run the querry
$stmt->execute();

// Get results and add them to stmt variable
$coats_products = $stmt->get_result();

?>
