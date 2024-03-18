<?php
// Start the session to access and manipulate session data
session_start();

// Initialize the cart in session if not already set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_POST['add_to_cart'])) {
    $products_array_ids = array_column($_SESSION['cart'], 'product_id');

    if (!in_array($_POST['product_id'], $products_array_ids)) {
        $product_array = [
            'product_id' => $_POST['product_id'],
            'product_name' => $_POST['product_name'],
            'product_price' => $_POST['product_price'],
            'product_image' => $_POST['product_image'],
            'product_quantity' => $_POST['product_quantity']
        ];

        $_SESSION['cart'][$_POST['product_id']] = $product_array;
        calculateTotalCart(); // Recalculate cart total after adding
    } else {
        echo '<script>alert("Product was already added!");</script>';
    }
} elseif (isset($_POST['remove_product'])) {
    $product_id = $_POST['product_id'];

    if (isset($_SESSION['cart'][$product_id])) {
        unset($_SESSION['cart'][$product_id]);
        calculateTotalCart(); // Recalculate cart total after removal
    }
} elseif (isset($_POST['edit_quantity'])) {
    $product_id = $_POST['product_id'];
    $product_quantity = $_POST['product_quantity'];

    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]['product_quantity'] = $product_quantity;
        calculateTotalCart(); // Recalculate cart total after editing
    }
} else {
    // header('Location: ../../index.php');
    // exit;
}

function calculateTotalCart() {
    $total = 0;

    foreach ($_SESSION['cart'] as $product) {
        $total += ($product['product_price'] * $product['product_quantity']);
    }

    $_SESSION['total'] = $total;
}
?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">

    <style>
        hr {
            width: 30px;
        }
    </style>
</head>

<body>
  
    <header>
     <!-- Navigation bar Bootstrap -->
     <nav class="navbar navbar-expand-lg navbar-light bg-white py-3 fixed-top">
        <div class="container">
          <img class="logo" src="../images/logo.png" alt="logotype">
          <h2 class="brand">Solutions</h2>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
             
            <!-- Navigation menu -->
              <li class="nav-item">
                <a class="nav-link" href="../../index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="shop.html">Shop</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Blog</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.html">Contact Us</a>
              </li>

              <!-- Navigation icons -->

              <li class="nav-item">
                <a href="cart.php" class="icon-link">
                  <i class="fas fa-shopping-cart"></i>
              </a>
              <a href="account.html" class="icon-link">
                <i class="fas fa-user"></i>
            </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
   </header>   

   <!-- Cart -->

   <section class="cart container my-5 py-5">
    <div class="container mt-5">
        <h2 class="font-weight-bold">Your Cart</h2>
        <hr>
    </div>

    <table class="mt-5 pt-5">
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Subtotal</th>
        </tr>

        <?php foreach($_SESSION['cart'] as $key => $value) { ?>

        <tr>
            <td>
                <div class="product-info">
                    <img src="../images/<?php echo $value['product_image']; ?>" alt="image">
                    <div>
                        <p><?php echo $value['product_name']; ?></p>
                        <small><span>$</span><?php echo $value['product_price']; ?></small>
                        <br>
                        <form method="POST" action="cart.php">
                            <input type="hidden" name="product_id" value="<?php echo $value['product_id']; ?>">
                            <input type="submit" name="remove_product" class="remove-btn" value="Remove"</input>
                        </form>
                        
                    </div>
                </div>
            </td>
            <td>
                
                <form method="POST" action="cart.php">
                  <input type="hidden" name="product_id" value="<?php echo $value['product_id']; ?>">
                  <input type="number" name="product_quantity" value="<?php echo $value['product_quantity']; ?>">
                  <input type="submit" class="edit-btn" value="edit" name="edit_quantity" type="text">
                </form>
                
            </td>

            <td>
                <span>$</span>
                <span class="product-price"><?php echo $value['product_quantity'] * $value['product_price']; ?></span>
            </td>
        </tr>
        
        <?php } ?>
        
    </table>

    <div class="cart-total">
        <table>
            <!-- <tr>
                <td>Subtotal</td>
                <td>$155</td>
            </tr> -->
            <tr>
                <td>Total</td>
                <td>$ <?php echo $_SESSION['total']; ?></td>
            </tr>
        </table>
    </div>

    <div class="checkout-container">
        <form method="POST" action="checkout.php">
        <input type="submit" class="btn checkout-btn" value="Checkout" name="checkout">
        </form>
       
    </div>
   </section>

   <!-- Footer -->

   <footer class="mt-5 py-5">
    <div class="row container mx-auto pt-5">
      <div class="footer-one col-lg-3 col-md-6 col-sm-12">
        <img class="logo" src="../images/logo.png" alt="logo">
        <p class="pt-3">We provide the best products for your computer</p>
      </div>

      <div class="footer-one col-lg-3 col-md-6 col-sm-12">
        <h5 class="pb-2">Featured</h5>
        <ul class="text-uppercase">
          <li><a href="">men</a></li>
          <li><a href="">woman</a></li>
          <li><a href="">boys</a></li>
          <li><a href="">girls</a></li>
          <li><a href="">new arrivals</a></li>
          <li><a href="">clothes</a></li>
        </ul>
      </div>

      <div class="footer-one col-lg-3 col-md-6 col-sm-12">
        <h5 class="pb-2">Contact Us</h5>
        <div>
          <h6 class="text-uppercase">Address</h6>
          <p>1234 Street Name, Dublin</p>
        </div>

        <div>
          <h6 class="text-uppercase">Phone</h6>
          <p>+35 38 781 21 32</p>
        </div>

        <div>
          <h6 class="text-uppercase">Email</h6>
          <p>example@gmail.com</p>
        </div>

      </div>

      <div class="footer-one col-lg-3 col-md-6 col-sm-12">
        <h5 class="pb-2">Instagram</h5>
        <div class="row">
          <img class="image-fluid w-25 h-100 m-2" src="../images/featured2.jpg" alt="image">
          <img class="image-fluid w-25 h-100 m-2" src="../images/featured4.jpg" alt="image">
          <img class="image-fluid w-25 h-100 m-2" src="../images/featured3.jpg" alt="image">
          <img class="image-fluid w-25 h-100 m-2" src="../images/featured2.jpg" alt="image">
          <img class="image-fluid w-25 h-100 m-2" src="../images/featured1.jpg" alt="image">
        </div>
      </div>
    </div>

    <div class="copyright mt-5">
      <div class="row container mx-auto">

        <div class="col-lg-3 col-md-5 col-sm-12 mb-4">
          <img src="../images/payment.png" alt="payment">
        </div>

        <div class="col-lg-3 col-md-5 col-sm-12 mb-4 text-nowrap mb-2">
          <p>ECommerce @ 2024 All Rights Reserved</p>
        </div>
        <div class="col-lg-3 col-md-5 col-sm-12 mb-4">
          <a href="#"><i class="fab fa-facebook"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
        </div>
      </div>
    </div>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>