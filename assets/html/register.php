<?php 

include("../../layouts/header2.php");
include('../../server/connection.php');

  // if user alredy registrated, then take user to account page

if(isset($_SESSION['logged_in'])){
  header('location: account.php');
  exit;
}

if(isset($_POST["register"])){

  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirmPassword'];


  // if passwords dont match
  if($password !== $confirm_password){
    header('location: register.php?error=Passwords dont match!');
  


  // if passwords is less than 6 chars
  } else if(strlen($password) < 6){
    header('location: register.php?error=Password must be at least 6 characters!');
  

  // if there is no error

  } else {

      // check the user with email or not

      $stmt1 = $conn->prepare('SELECT COUNT(*) FROM users WHERE user_email=?');
      $stmt1->bind_param('s', $email);
      $stmt1->execute();
      $stmt1->bind_result($num_rows);
      $stmt1->store_result();
      $stmt1->fetch();

      // if there is a user with already registered with this email

      if($num_rows != 0){
        header('location: register.php?error=User with this email already exists!');

        // if no user registrated with this email

      } else {
     
        // create a new user

        $stmt = $conn->prepare('INSERT INTO users(user_name, user_email, user_password)
        VALUES (?, ?, ?)');

        $stmt->bind_param('sss', $name, $email, md5($password));

        // if account was created successfully

        If($stmt->execute()){
          $user_id = $stmt->insert_id;
          $_SESSION['user_id'] = $user_id;
          $_SESSION['user_email'] = $email;
          $_SESSION['user_name'] = $name;
          $_SESSION['logged_in'] = true;
          header('location: account.php?register_success=You registreted succesfully!');

          // account could not be created

        } else {
          header('location: register.php?register=Could not create an accaount at the moment!');
        }
      }
  }

}

?>
  
    <!-- Register -->
    <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="form-weight-bold">Register</h2>
            <hr class="mx-auto">
        </div>
        <div class="mx-auto container">
            <form id="register-form" method="POST" action="register.php">
              <p style="color: red; "><?php if(isset($_GET['error'])){ echo $_GET['error'];} ?></p>
                <div class="form-group">
                    <label for="">Name</label>
                    <input placeholder="Name" required id="register-name" class="form-control" name="name" type="text">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input placeholder="Email" required id="register-email" class="form-control" name="email" type="text">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input placeholder="Password" required id="register-password" class="form-control" name="password" type="password">
                </div>
                <div class="form-group">
                    <label for="">Confirm Password</label>
                    <input placeholder="Confirm Password" required id="register-confirm-password" class="form-control" name="confirmPassword" type="password">
                </div>
                <div class="form-group">
                    <input id="register-btn" class="btn" name="register" type="submit" value="Register">
                </div>
                <div class="form-group">
                    <a id="login-url" class="btn" href="login.php">Have an account? Log In</a>
                </div>
            </form>
        </div>
    </section>

<?php 

include("../../layouts/footer2.php");

?>