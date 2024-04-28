<?php

// Include the connection to database
include('connection.php');

$stmt = $conn->prepare("SELECT * FROM products WHERE product_category = 'cpus' LIMIT 4");

$stmt->execute();

$watches = $stmt->get_result();

?>