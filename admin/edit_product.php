<?php include('header.php'); 


if(isset($_GET['product_id'])) {

    $product_id = $_GET['product_id'];
    $stmt = $conn->prepare("SELECT * FROM products WHERE product_id = ?");
    $stmt->bind_param('i', $product_id);
    $stmt->execute();
    $products = $stmt->get_result();

} else if(isset($_POST['edit_product'])) {

    $product_id = $_POST['product_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $offer = $_POST['offer'];
    $color = $_POST['color'];
    $category = $_POST['category'];

    $stmt = $conn->prepare(
        'UPDATE products SET product_name = ?, product_description = ?, product_price = ?,
        product_special_offer = ?, product_color = ?, product_category = ? WHERE product_id = ? ');
  
    $stmt->bind_param("ssssssi", $title, $description, $price, $offer, $color, $category, $product_id);


    if($stmt->execute()) {

        header('location: products.php?edit_success_message=Product has been update successfully!');

    } else {
        
        header('location: products.php?edit_failure_message=Error occured, try again!');

    }

}else {
    header('products.php');
    exit;
}

?>

<div class="container-fluid">
  <div class="row" style="min-height: 1000px;">
    <?php include('sidemenu.php'); ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
          </div>
        </div>
      </div>

      <h2>Edit Product</h2>
      <div class="table-responsive">


 <div class="mx-auto container">
    <form id="edit-form" method="POST" action="edit_product.php">
    <p style="color: red;"><?php if(isset($_GET['error'])){ echo $_GET['error']; } ?></p>
    <div class="form-group mt-2">

        <?php foreach($products as $product) { ?>
        
      <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">

      <label for="product-title">Title</label>
      <input type="text" class="form-control" id="product-title" value="<?php echo $product['product_name']; ?>" name="title" placeholder="Title" required>
    </div>

    <div class="form-group mt-2">
      <label for="product-description">Description</label>
      <input type="text" class="form-control" id="product-desc" value="<?php echo $product['product_description']; ?>" name="description" placeholder="Description" required>
    </div>

    <div class="form-group mt-2">
      <label for="product-price">Price</label>
      <input type="text" class="form-control" id="product-price" value="<?php echo $product['product_price']; ?>" name="price" placeholder="Price" required>
    </div>

    <div class="form-group mt-2">
      <label for="product-category">Category</label>
      <select class="form-control" required id="product-category" name="category">
        <option value="bags">Bags</option>
        <option value="shoes">Shoes</option>
        <option value="watches">Watches</option>
        <option value="clothes">Clothes</option>
      </select>
    </div>

    <div class="form-group mt-2">
      <label for="product-color">Color</label>
      <input type="text" class="form-control" id="product-color" value="<?php echo $product['product_color']; ?>" name="color" placeholder="Color">
    </div>

    <div class="form-group mt-2">
      <label for="product-special-offer">Special Offer/Sale</label>
      <input type="number" class="form-control" id="product-offer"  value="<?php echo $product['product_special_offer']; ?>" name="offer" placeholder="Sale %">
    </div>

    <div class="form-group mt-2">
    <input type="submit" class="btn btn-primary" name="edit_product" value="Edit">
    </div>

    <?php } ?>

  </form>
</div>
      </div>
    </main>
  </div>
</div>
