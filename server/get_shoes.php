<?php

// Include the connection to database
include('connection.php');

$stmt = $conn->prepare("SELECT * FROM products WHERE product_category = 'motherboards' LIMIT 4");

$stmt->execute();

$shoes = $stmt->get_result();

?>