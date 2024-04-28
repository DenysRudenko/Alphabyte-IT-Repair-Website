<?php 

include("layouts/header.php");

?>
   
      <!-- Home -->
      <section id="home">
        <div class="container text-effect">
          <h5>LATEST SERVICES</h5>
          <h1><span>Unbeatable</span> Repair Deals This Season</h1>
          <p>Alphabyte Solutions offers expert computer repairs at the most competitive prices.</p>
          <button>Shop Now</button>
        </div>
      </section>

      <!-- Brand -->

      <!-- container in class -->
      <section id="brand" class=""> 
        <div class="service-features">
        
          <div class="feature-item ">
            <img class="feature-icon img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/images/P.svg" alt="brand">
            <div>
            <h3 class="feature-text"><span>P</span>remuim Quality</h3>
            </div>
          </div>

          <div class="feature-item">
            <img class="feature-icon img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/images/T.svg" alt="brand">
            <div>
            <h3 class="feature-text"><span>G</span>uaranteed Return / Warranty</h3>
            </div>
          </div>

          <div class="feature-item">
            <img class="feature-icon img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/images/E.svg" alt="brand">
            <div>
            <h3 class="feature-text"><span>T</span>echnical Support</h3>
            </div>
          </div>

          <div class="feature-item">
            <img class="feature-icon img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/images/S.svg" alt="brand">
            <div>
            <h3 class="feature-text"><span>H</span>ighly Professional</h3>
            </div>
          </div>
        </div>
      </section>


      <!-- New -->
      <section id="new" class="w-100">
        <div class="row p-0 m-0">
          <!-- One -->
          <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
            <img class="img-fluid" src="assets/images/asus_product.webp" alt="">
            <div class="details">
              <h2>Graphics Processing Power</h2>
              <button class="text-uppercase">Shop Now</button>
            </div>
          </div>
          
          <!-- Two -->
          <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
            <img class="img-fluid" src="assets/images/amd_product.webp" alt="">
            <div class="details">
              <h2>Processors for Computing</h2>
              <button class="text-uppercase">Shop Now</button>
            </div>
          </div>
          
          <!-- Three -->
          <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
            <img class="img-fluid" src="assets/images/gigabyte_product.webp" alt="">
            <div class="details">
              <h2>Mainboards for Peak Performance</h2>
              <button class="text-uppercase">Shop Now</button>
            </div>
          </div>
        </div>
      </section>

      <!-- Featured -->
      <section id="featured" class="my-5 pb-5">
        <div class="container text-center mt-5 py-5">
          <h3>GPUs</h3>
          <hr class="mx-auto color-span">
          <p>Explore our latest selection of high-end GPUs, designed for the ultimate gaming and graphics experience.</p>
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
          <h4>SEASONAL PROMOTION</h4>
          <h1>Tech Essentials Fall Line-Up <br> SAVE UP TO 30%</h1>
          <button class="text-uppercase">Start Shopping</button>
        </div>
      </section>

      <!-- CPUS -->

      <section id="featured" class="my-5 pb-5">
        <div class="container text-center mt-5 py-5">
          <h3>CPUs</h3>
          <hr class="mx-auto">
          <p>Discover our newly showcased CPUs, engineered for cutting-edge computing power and efficiency.</p>
        </div>
        <div class="row mx-auto container-fluid">

        <?php include('server/get_watches.php'); ?>

        <?php while($row = $watches->fetch_assoc()) { ?>

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

      <section id="featured" class="my-5 pb-5">
        <div class="container text-center mt-5 py-5">
          <h3>Motherboards</h3>
          <hr class="mx-auto">
          <p>Browse our latest lineup of premium motherboards, the foundation for building high-performance systems.</p>
        </div>
        <div class="row mx-auto container-fluid">

        <?php include('server/get_shoes.php'); ?>

        <?php while($row = $shoes->fetch_assoc()) { ?>

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

      <!-- Other parts -->

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


<?php 

include('layouts/footer.php');

?>