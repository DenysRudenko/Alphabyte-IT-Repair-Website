<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
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
      
    <!-- Account -->
    <section class="my-5 py-5">
        <div class="row container mx-auto">
            <div class="text-center mt-3 pt-5 col-lg-6 col-md-12 col-sm-12">
                <h3 class="font-weight-bold">Account Info</h3>
                <hr class="mx-auto">
                <div class="account-info">
                    <p>Name <span>John</span></p>
                    <p>Email <span>john@email.com</span></p>
                    <p><a href="#" id="orders-btn">Your Orders</a></p>
                    <p><a href="#" id="logout-btn">Logout</a></p>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <form id="account-form" action="">
                    <h3>Change Password</h3>
                    <hr class="mx-auto">
                    <div class="form-group">
                        <label for="">Password</label>
                        <input required class="form-control" name="password" id="account-password" placeholder="Password" type="password">
                    </div>
                    <div class="form-group">
                        <label for="">Confirm Password</label>
                        <input required class="form-control" name="confirmPassword" id="account-password-confirm" placeholder="Password" type="password">
                    </div>
                    <div class="form-group">
                        <input value="Change Password" class="btn" id="change-pass-btn" type="submit">
                    </div>
                </form>
            </div>
        </div>
    </section>
    
    <!-- Orders -->
    <section class="orders container my-5 py-3">
        <div class="container mt-2">
            <h2 class="font-weight-bold text-center">Your Orders</h2>
            <hr class="mx-auto">
        </div>
    
        <table class="mt-5 pt-5">
            <tr>
                <th>Product</th>
                <th>Date</th>
            </tr>
            <tr>
                <td>
                   <div class="product-info">
                        <img src="../images/featured1.jpg" alt="image">
                        <div>
                            <p class="mt-3">White Shoes</p>
                        </div>
                   </div>
                </td>

                <td>
                    <span>2024-11-3</span>
                </td>
    
                
            </tr>
           
           
        </table>
    
        
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