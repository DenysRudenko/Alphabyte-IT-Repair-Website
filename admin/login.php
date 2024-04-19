<?php 

session_start();

include("../server/connection.php");

if(isset($_SESSION['admin_logged_in'])) {
  header('location: index.php');
  exit;
}

if(isset($_POST["login_btn"])){

  $email = $_POST["email"];
  $password = md5($_POST["password"]);

  $stmt = $conn->prepare("SELECT admin_id, admin_name, admin_email, admin_password FROM admins
                  WHERE admin_email = ? AND admin_password = ?
                  LIMIT 1");

  $stmt->bind_param("ss", $email, $password);

  if($stmt->execute()){

    $stmt->bind_result($admin_id, $admin_name, $admin_email, $admin_password);
    $stmt->store_result();
    
    if($stmt->num_rows() == 1){
      $stmt->fetch();
      
      $_SESSION['admin_id'] = $user_id;
      $_SESSION['admin_name'] = $user_name;
      $_SESSION['admin_email'] = $user_email;
      $_SESSION['admin_logged_in'] = true;

      header('location: index.php?login_success=Logged in successfuly!');
    }else{
      header('location: login.php?error=Could not verify your account!');
      exit();
    }

  }else{

    // error
    header('location: login.php?error=Something went wrong!');

  };
};

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Signin Template · Bootstrap v5.1</title>
    <link rel="stylesheet" href="../assets/css/style.css">

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">

    

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="container text-center mt-5 py-5">
    
  <div class="mx-auto container">
  <form id="login_form" enctype="multipart/form-data" method="POST" action="login.php">
    <p style="color: red;"><?php if(isset($_GET['error'])){ echo $_GET['error']; } ?></p>
    <div class="form-group mt-2">
      <label>Email</label>
      <input type="email" class="form-control" id="product-name" name="email" placeholder="Email">
    </div>
    <div class="form-group mt-2">
      <label>Password</label>
      <input type="password" class="form-control" id="product-desc" name="password" placeholder="Password">
    </div>
    <div class="form-group mt-3">
      <input type="submit" class="btn btn-primary" name="login_btn" value="Login"/>
    </div>
  </form>
</div>



    
  </body>
</html>