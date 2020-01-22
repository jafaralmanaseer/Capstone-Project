<?php
session_start();
include('../includes/connection.php');
if (isset($_POST['submit'])) {
    $email    =  $_POST['email'];
    $password =  $_POST['password'];

    if (!empty($email)&& !empty($password)) {
        $query="SELECT * FROM admin 
                WHERE admin_email ='$email'
                AND admin_password= '$password' ";

                $result =  mysqli_query($conn,$query);

                $row    =  mysqli_fetch_assoc($result);

                if ($row['admin_id']) {
                    $_SESSION['admin_id'] = $row['admin_id'];
                    
                    echo "<script> window.top.location='index.php'; </script>";  

                }else{
                    $error =  "you are not authoraized";
                }
    }
}
 ?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form  action="" method="post">
              <h1>Login Form</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" name="email" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" name="password" />
              </div>
              <div>
                
                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name="submit">Log in</button>
                <a class="reset_pass" href="#">Lost your password?</a>
              </div>

              <?php
              if (isset($error)) {
                echo "<div class='btn btn-danger'>$error</div>";
              }
              ?>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="index.html">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>