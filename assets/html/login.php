<?php 

include("../../layouts/header2.php");
include("../../server/connection.php");

if(isset($_SESSION['logged_in'])) {
  header('location: account.php');
  exit;
}

if(isset($_POST["login_btn"])){

  $email = $_POST["email"];
  $password = md5($_POST["password"]);

  $stmt = $conn->prepare("SELECT user_id, user_name, user_email, user_password FROM users
                  WHERE user_email = ? AND user_password = ?
                  LIMIT 1");

  $stmt->bind_param("ss", $email, $password);

  if($stmt->execute()){

    $stmt->bind_result($user_id, $user_name, $user_email, $user_password);
    $stmt->store_result();
    
    if($stmt->num_rows() == 1){
      $stmt->fetch();
      
      $_SESSION['user_id'] = $user_id;
      $_SESSION['user_name'] = $user_name;
      $_SESSION['user_email'] = $user_email;
      $_SESSION['logged_in'] = true;

      header('location: account.php?login_success=Logged in successfuly!');
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
 
    <!-- login -->
    <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="form-weight-bold">Login</h2>
            <hr class="mx-auto">
        </div>
        <div class="mx-auto container">
            <form id="login-form" method="POST" action="login.php">

              <p style="color:red" class="text-center">
                <?php if(isset($_GET['error'])){echo $_GET['error'];} ?>
              </p>

                <div class="form-group">
                    <label for="">Email</label>
                    <input placeholder="Email" required id="login-email" class="form-control" name="email" type="text">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input placeholder="Password" required id="login-password" class="form-control" name="password" type="password">
                </div>
                <div class="form-group">
                    <input id="login-btn" name="login_btn" class="btn" type="submit" value="Login">
                </div>
                <div class="form-group">
                    <a id="register-url" class="btn" href="register.php">Dont have an account? Register</a>
                </div>
            </form>
        </div>
    </section>

<?php

include("../../layouts/footer2.php");

?>