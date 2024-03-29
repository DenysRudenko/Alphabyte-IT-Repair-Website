<?php
session_start();

include("connection.php");

if(isset($_POST["place_order"])) {
    
    // get user information and store it in DB
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $order_cost = $_SESSION['total'];
    $order_status = "on_hold";
    $user_id = 1;
    $order_date = date("Y-m-d H:i:s");

    // store each single item in order_items database
    $stmt = $conn->prepare('INSERT INTO orders (
        order_cost, order_status, 
        user_id, user_phone, 
        user_city, user_address, order_date)
        VALUES (?, ?, ?, ?, ?, ?, ?)');

    $stmt->bind_param('dsissss', $order_cost, $order_status, $user_id, $phone, $city, $address, $order_date);
    
    $stmt->execute();

    // issue new order store order info in DB
    $order_id = $conn->insert_id;


    // get products from cart(from session)
    foreach($_SESSION['cart'] as $key => $value) {
        $product = $_SESSION['cart'][$key];
        $product_id = $product['product_id'];
        $product_name = $product['product_name'];
        $product_image = $product['product_image'];
        $product_price = $product['product_price'];
        $product_quantity = $product['product_quantity'];

        $stmt1 = $conn->prepare('INSERT INTO order_items(
            order_id, product_id,
            product_name, product_image,
            product_price, product_quantity,
            user_id, order_date)
            VALUES(?, ?, ?, ?, ?, ?, ?, ?)');
        
        $stmt1->bind_param('iissiiis', $order_id, $product_id, $product_name, $product_image, $product_price, $product_quantity, $user_id, $order_date);

        $stmt1->execute();
    }


    // remove everything from cart --> delay until payment is done

    //unset($_SESSION['cart']);



    // inform user status
    header('location: ../assets/html/payment.php?order_status=Order Placed Successfuly!');
}

?>