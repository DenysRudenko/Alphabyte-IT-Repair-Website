<?php include('header.php'); 


if(isset($_GET['order_id'])) {

    $order_id = $_GET['order_id'];
    $stmt = $conn->prepare("SELECT * FROM orders WHERE order_id = ?");
    $stmt->bind_param('i', $order_id);
    $stmt->execute();
    $order = $stmt->get_result();

} else if(isset($_POST['edit_order'])) {

    $order_status = $_POST['order_status'];
    $order_id = $_POST['order_id'];

    
    $stmt = $conn->prepare(
        'UPDATE orders SET order_status = ? WHERE order_id = ? ');
  
    $stmt->bind_param("si", $order_status, $order_id);


    if($stmt->execute()) {

        header('location: index.php?order_updated=Order has been update successfully!');

    } else {
        
        header('location: products.php?order_failed=Error occured, try again!');

    }

} else {
    header('location: index.php');
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
            <!-- Buttons can go here -->
          </div>
        </div>
      </div>

      <h2>Edit Order</h2>
      <div class="table-responsive">


 <div class="mx-auto container">
    <form id="edit-order-form" method="POST" action="edit_order.php">

    <?php foreach($order as $r) {?>

    <p style="color: red;"><?php if(isset($_GET['error'])){ echo $_GET['error']; } ?></p>
    <div class="form-group mt-2">
        <label>OrderId</label>
        <p class="my-4"><?php echo $r['order_id']; ?></p>
    
    </div>

    <div class="form-group mt-3">
        <label>OrderPrice</label>
        <p class="my-4"><?php echo $r['order_amount']; ?></p>
    </div>

    <input type="hidden" name="order_id" value="<?php echo $r['order_id']; ?>">


    <div class="form-group mt-2">
  <label for="order_status">Order Status</label>
  <select class="form-control" required id="order_status" name="order_status">
    <option value="not paid" <?php if($r['order_status'] == 'not paid') { echo "selected"; } ?>>Not Paid</option>
    <option value="paid" <?php if($r['order_status'] == 'paid') { echo "selected"; } ?>>Paid</option>
    <option value="delivered" <?php if($r['order_status'] == 'delivered') { echo "selected"; } ?>>Delivered</option>
    <option value="shipped" <?php if($r['order_status'] == 'shipped') { echo "selected"; } ?>>Shipped</option>
  </select>
</div>

    <div class="form-group mt-3">
        <label>OrderDate</label>
        <p class="my-4"><?php echo $r['order_date']; ?></p>
    </div>


    <div class="form-group mt-2">
    <input type="submit" class="btn btn-primary" name="edit_order" value="Edit">
    </div>
    
    <?php } ?>

  </form>
</div>



        <!-- Table goes here -->
      </div>
    </main>
  </div>
</div>
