<?php 

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
  
    <header>
     <!-- Navigation bar Bootstrap -->
     <nav class="navbar navbar-expand-lg navbar-light py-3 fixed-top">
        <div class="container">
          <h2 class="brand color-span">AlphaByte Solutions</h2>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
             
            <!-- Navigation menu -->
              <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="assets/html/shop.php">Shop</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="assets/html/contact.php">Contact Us</a>
              </li>

              <!-- Navigation icons -->

              <li class="nav-item">
                <a href="assets/html/cart.php" class="icon-link">
                <i class="fa-solid fa-cart-shopping">
                  <?php if(isset($_SESSION['quantity']) && $_SESSION['quantity'] != 0) { ?>

                      <span class="cart-quantity"><?php echo $_SESSION['quantity']; ?></span>

                    <?php } ?>
                </i>
              </a>
              <a href="assets/html/account.php" class="icon-link">
                <i class="fas fa-user"></i>
              </a>
              </li>
            
            </ul>
          </div>
        </div>
      </nav>
   </header>

  