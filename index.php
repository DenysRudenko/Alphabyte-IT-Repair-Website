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
     <nav class="navbar navbar-expand-lg navbar-light bg-white py-3 fixed-top">
        <div class="container">
          <img class="logo" src="assets/images/logo.png" alt="logotype">
          <h2 class="brand">Solutions</h2>
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
                <a class="nav-link" href="assets/html/shop.html">Shop</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Blog</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="assets/html/contact.html">Contact Us</a>
              </li>

              <!-- Navigation icons -->

              <li class="nav-item">
                <a href="assets/html/cart.php" class="icon-link">
                <i class="fa-solid fa-cart-shopping"></i>
              </a>
              <a href="assets/html/account.html" class="icon-link">
                <i class="fas fa-user"></i>
              </a>
              </li>
            
            </ul>
          </div>
        </div>
      </nav>
   </header>

   
      <!-- Home -->
      <section id="home">
        <div class="container">
          <h5>NEW ARRIVALS</h5>
          <h1><span>Best Prices</span> This Season</h1>
          <p>Eshop offers the best products for the most affordable prices</p>
          <button>Shop Now</button>
        </div>
      </section>

      <!-- Brand -->
      <section id="brand" class="container">
        <div class="row">
          <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/images/brand1.png" alt="brand">
          <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/images/brand2.png" alt="brand">
          <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/images/brand3.jpg" alt="brand">
          <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/images/brand4.png" alt="brand">
        </div>
      </section>

      <!-- New -->
      <section id="new" class="w-100">
        <div class="row p-0 m-0">
          <!-- One -->
          <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
            <img class="img-fluid" src="assets/images/1.jpg" alt="">
            <div class="details">
              <h2>Extreamely Awesome Shoes</h2>
              <button class="text-uppercase">Shop Now</button>
            </div>
          </div>
          
          <!-- Two -->
          <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
            <img class="img-fluid" src="assets/images/2.jpeg" alt="">
            <div class="details">
              <h2>Awesome Jacket</h2>
              <button class="text-uppercase">Shop Now</button>
            </div>
          </div>
          
          <!-- Three -->
          <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
            <img class="img-fluid" src="assets/images/3.jpg" alt="">
            <div class="details">
              <h2>50% OFF Watches</h2>
              <button class="text-uppercase">Shop Now</button>
            </div>
          </div>
        </div>
      </section>

      <!-- Featured -->
      <section id="featured" class="my-5 pb-5">
        <div class="container text-center mt-5 py-5">
          <h3>Our Featured</h3>
          <hr class="mx-auto">
          <p>Here you can check out our new featured products</p>
        </div>
        <div class="row mx-auto container-fluid">

        <?php include('server/get_featured_products.php'); ?>

        <?php while($row = $featured_products->fetch_assoc()) { ?>

          <div onclick="window.location.href='assets/html/single_product.html';" class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="assets/images/<?php echo $row['product_image']; ?>" alt="product">
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
            <h4 class="p-price">$<?php echo $row['product_price']; ?></h4>
            <a href="<?php echo "assets/html/single_product.php?product_id=". $row['product_id']; ?>"><button class="buy-btn">Buy Now</button></a>
          </div>

         <?php } ?>

          

         
        </div>
      </section>
    
      <!-- Banner -->

      <section id="banner" class="my-5 py-5">
        <div class="container">
          <h4>MID SEASON SALE</h4>
          <h1>Autumn Collection <br> UP to 30% OFF</h1>
          <button class="text-uppercase">Shop Now</button>
        </div>
      </section>

      <!-- CPUS -->

      <section id="featured" class="my-5">
        <div class="container text-center mt-5 py-5">
          <h3>CPUS</h3>
          <hr>
          <p>Here you can check out our awazing clothes</p>
        </div>
        <div class="row mx-auto container-fluid">

          <?php include('server/get_products.php'); ?>

          <?php while($row=$coats_products->fetch_assoc()) { ?>

          <div onclick="window.location.href='assets/html/single_product.html';" class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="assets/images/<?php echo $row['product_image']; ?>" alt="product">
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
            <h4 class="p-price">$<?php echo $row['product_price']; ?></h4>
            <a href="<?php echo "assets/html/single_product.php?product_id=". $row['product_id']; ?>"><button class="buy-btn">Buy Now</button></a>
            
          </div>

          <?php } ?>

        </div>
      </section>


      <!-- GPUS -->

      <section id="gpu" class="my-5">
        <div class="container text-center mt-5 py-5">
          <h3>GPUS</h3>
          <hr>
          <p>Here you can check out our awazing shoes</p>
        </div>
        <div class="row mx-auto container-fluid">
          <div onclick="window.location.href='assets/html/single_product.html';" class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="assets/images/featured1.jpg" alt="product">
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name">Sports Shoes</h5>
            <h4 class="p-price">199.8</h4>
            <a href="assets/html/single-product.php"><button class="buy-btn">Buy Now</button></a>
          </div>

          <div onclick="window.location.href='assets/html/single_product.html';" class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="assets/images/featured2.jpg" alt="product">
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name">Sports Shoes</h5>
            <h4 class="p-price">199.8</h4>
            <button class="buy-btn">Buy Now</button>
          </div>

          <div onclick="window.location.href='assets/html/single_product.html';" class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="assets/images/featured3.jpg" alt="product">
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name">Sports Shoes</h5>
            <h4 class="p-price">199.8</h4>
            <button class="buy-btn">Buy Now</button>
          </div>

          <div onclick="window.location.href='assets/html/single_product.html';" class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="assets/images/featured4.jpg" alt="product">
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name">Sports Shoes</h5>
            <h4 class="p-price">199.8</h4>
            <button class="buy-btn">Buy Now</button>
          </div>
        </div>
      </section>

      <!-- Other parts -->

      <section id="parts" class="my-5">
        <div class="container text-center mt-5 py-5">
          <h3>Best Parts</h3>
          <hr>
          <p>Here you can check out our awazing shoes</p>
        </div>
        <div class="row mx-auto container-fluid">
          <div onclick="window.location.href='assets/html/single_product.html';" class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="assets/images/featured1.jpg" alt="product">
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name">Sports Shoes</h5>
            <h4 class="p-price">199.8</h4>
            <button class="buy-btn">Buy Now</button>
          </div>

          <div onclick="window.location.href='assets/html/single_product.html';" class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="assets/images/featured2.jpg" alt="product">
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name">Sports Shoes</h5>
            <h4 class="p-price">199.8</h4>
            <button class="buy-btn">Buy Now</button>
          </div>

          <div onclick="window.location.href='assets/html/single_product.html';" class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="assets/images/featured3.jpg" alt="product">
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name">Sports Shoes</h5>
            <h4 class="p-price">199.8</h4>
            <button class="buy-btn">Buy Now</button>
          </div>

          <div onclick="window.location.href='assets/html/single_product.html';" class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="assets/images/featured4.jpg" alt="product">
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name">Sports Shoes</h5>
            <h4 class="p-price">199.8</h4>
            <button class="buy-btn">Buy Now</button>
          </div>
        </div>
      </section>

    <!-- Footer -->

    <footer class="mt-5 py-5">
        <div class="row container mx-auto pt-5">
          <div class="footer-one col-lg-3 col-md-6 col-sm-12">
            <img class="logo" src="assets/images/logo.png" alt="logo">
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
              <img class="image-fluid w-25 h-100 m-2" src="assets/images/featured2.jpg" alt="image">
              <img class="image-fluid w-25 h-100 m-2" src="assets/images/featured4.jpg" alt="image">
              <img class="image-fluid w-25 h-100 m-2" src="assets/images/featured3.jpg" alt="image">
              <img class="image-fluid w-25 h-100 m-2" src="assets/images/featured2.jpg" alt="image">
              <img class="image-fluid w-25 h-100 m-2" src="assets/images/featured1.jpg" alt="image">
            </div>
          </div>
        </div>

        <div class="copyright mt-5">
          <div class="row container mx-auto">

            <div class="col-lg-3 col-md-5 col-sm-12 mb-4">
              <img src="assets/images/payment.png" alt="payment">
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