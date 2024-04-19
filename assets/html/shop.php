<?php 

// Include the connection to database
include("../../layouts/header2.php");
include('../../server/connection.php');

// use the search section
if(isset($_POST['search'])){

  $category = $_POST['category'];

  $price = $_POST['price'];

  $stmt = $conn->prepare("SELECT * FROM products WHERE product_category = ? AND product_price <= ?");

  $stmt->bind_param("si", $category, $price);

  // Run the querry
  $stmt->execute();

  // Get results and add them to stmt variable
  $products = $stmt->get_result();

  // return all products
}else {
  // Database Querry 
$stmt = $conn->prepare("SELECT * FROM products");

// Run the querry
$stmt->execute();

// Get results and add them to stmt variable
$products = $stmt->get_result();
}




?>


   <!-- search -->
   <section id="search" class="my-5 py-5 ms-2">
    <div class="container mt-5 py-5">
      <p>Search Products</p>
      <hr>
    </div>

    <form action="shop.php" method="POST">
      <div class="row mx-auto container">
        <div class="col-lg-12 col-md-12 col-sm-12">

          <p>Category</p>
            <div class="form-check">
              <input id="category_one" value="shoes" class="form-check-input" name="category" type="radio">
              <label for="flexRadioDefault1" class="form-check-label">
                Shoes
              </label>
            </div>

            <div class="form-check">
              <input id="category_two" value="coats" class="form-check-input" name="category" type="radio" checked>
              <label for="flexRadioDefault2" class="form-check-label">
                Coats
              </label>
            </div>

            <div class="form-check">
              <input id="category_two" value="watches" class="form-check-input" name="category" type="radio" checked>
              <label for="flexRadioDefault3" class="form-check-label">
                Watches
              </label>
            </div>

            <div class="form-check">
              <input id="category_two" value="bags" class="form-check-input" name="category" type="radio" checked>
              <label for="flexRadioDefault3" class="form-check-label">
                Bags
              </label>
            </div>
          
        </div>
      </div>

      <div class="row mx-auto container mt-5">
        <div class="col-lg-12 col-md-12 col-sm-12">

          <p>Price</p>
          <input type="range" name="price" value="100" class="form-range w-50" min="1" max="1000" id="customRange2">
          <div class="w-50">
            <span style="float: left;">1</span>
            <span style="float: right;">1000</span>
          </div>
        </div>
      </div>

      <div class="form-group my-3 mx-3">
        <input type="submit" name="search" value="Search" class="btn btn-primary">
      </div>
    </form>

   </section>

   <!-- Featured -->
   <section id="shop" class="my-5 py-5">
    <div class="container mt-5 py-5">
      <h3>Our Products</h3>
      <hr>
      <p>Here you can check out our new products</p>
    </div>
    <div class="row mx-auto container">
        
    <?php while($row = $products->fetch_assoc()) { ?>

      <div onclick="window.location.href='single_product.php';" class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3" src="../images/<?php echo $row['product_image']; ?>" alt="product">
        <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
        <h4 class="p-price"><?php echo $row['product_price']; ?></h4>
        <a class="btn buy-btn" href="<?php echo "single_product.php?product_id=".$row["product_id"]; ?>">Buy Now</a>
      </div>

      <?php } ?>


      <!-- Pagination Bar -->
      <nav aria-label="Page navigation example">
        <ul class="pagination mt-5 ">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
      </nav>
    </div>
  </section>



<?php 

include("../../layouts/footer2.php");

?>