<?php 

include("layouts/header.php");

?>
   
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

<?php 

include('layouts/footer.php');

?>