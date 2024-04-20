<?php 


include('header.php');
include('sidemenu.php');

if(!isset($_SESSION['admin_logged_in'])){
  header('location: login.php');
  exit();
}


 // Pagination
 if(isset($_GET['page_no']) && $_GET['page_no'] != "") {

  // if user has already entered page then page number is the one that selected
  $page_no = $_GET['page_no'];
} else {

  // if user just entered the page then default page is 1
  $page_no = 1;
}

// return number of products 
$stmt1 = $conn->prepare("SELECT COUNT(*) AS total_records FROM orders ");

$stmt1->execute();

$stmt1->bind_result($total_records);

$stmt1->store_result();

$stmt1->fetch();

// set the total number of products on the page

$total_records_per_page = 13;

$offset = ($page_no - 1) * $total_records_per_page;

$previous_page = $page_no - 1;
$next_page = $page_no + 1;

$adjacents = "2";

$total_number_of_pages = ceil($total_records / $total_records_per_page);

// get all products

$stmt2 = $conn->prepare("SELECT * FROM orders LIMIT $offset, $total_records_per_page");
$stmt2->execute();
$orders = $stmt2->get_result();

?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
          </div>
        </div>
      </div>


      <h2>Orders</h2>

      <?php if(isset($_GET['order_updated'])){ ?>
      <p class="text-center" style="color: green;"><?php echo $_GET['order_updated']; ?></p>
      <?php } ?>

      <?php if(isset($_GET['order_failed'])){ ?>
      <p class="text-center" style="color: red;"><?php echo $_GET['order_failed']; ?></p>
      <?php } ?>

      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Order Id</th>
              <th scope="col">Order Status</th>
              <th scope="col">User Id</th>
              <th scope="col">Order Date</th>
              <th scope="col">User Phone</th>
              <th scope="col">User Address</th>
              <th scope="col">Edit</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>
          <tbody>

          <?php foreach($orders as $order) {?>
            <tr>
              <td><?php echo $order['order_id']; ?></td>
              <td><?php echo $order['order_status']; ?></td>
              <td><?php echo $order['user_id']; ?></td>
              <td><?php echo $order['order_date']; ?></td>
              <td><?php echo $order['user_phone']; ?></td>
              <td><?php echo $order['user_address']; ?></td>
              <td><a class="btn btn-primary" href="edit_order.php?order_id=<?php echo $order['order_id']; ?>" >Edit </a></td>
              <td><a class="btn btn-danger">Delete</a></td>
            </tr>

            <?php } ?>

          </tbody>
        </table>

        <!-- Pagination Bar -->
        <nav aria-label="Page navigation example">
        <ul class="pagination mt-5 mx-auto">

        <li class="page-item <?php if($page_no <= 1){ echo 'disabled'; } ?>">
        <a class="page-link" href="<?php if($page_no > 1){ 
          echo "?page_no=".($page_no - 1); } else { echo "#"; } ?>">Previous</a>
        </li>

            <li class="page-item"><a class="page-link" href="?page_no=1">1</a></li>
            <li class="page-item"><a class="page-link" href="?page_no=2">2</a></li>

            <?php if($page_no >= 3) { ?>
            <li class="page-item disabled"><span class="page-link">...</span></li>
            <li class="page-item active"><span class="page-link"><?php echo $page_no; ?></span></li>
            <?php } ?>


            <li class="page-item <?php if($page_no >= $total_number_of_pages){ echo 'disabled'; } ?>">
            <a class="page-link" href="<?php if($page_no < $total_number_of_pages){ echo "?page_no=".($page_no + 1); } else { echo "#"; } ?>">Next</a>
            </li>
        </ul>
      </nav>

      </div>
    </main>
    
  </div>

</div>


    <script src="/docs/5.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>