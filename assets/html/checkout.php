<?php

session_start();

if( !empty($_SESSION["cart"]) && isset($_POST['checkout'])) {
    // let user in

    // send user to home page
}else{
  header('location: ../../index.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
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

   <!-- Checkout -->

    <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="form-weight-bold">Checkout</h2>
            <hr class="mx-auto">
        </div>
        <div class="mx-auto container">
            <form id="checkout-form" method="POST" action="../../server/place_order.php">
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