<?php 
// database connection 
include('../includes/admin_header.php'); 

if (isset($_POST['submit'])) {
  // fetch data
  $email       = $_POST['admin_email'];
  $password    = $_POST['password'];
  $fullname    = $_POST['fullname'];

  // Esiablish connection
  $admin_image = $_FILES['admin_image']['name'];
  $tmp_name    = $_FILES['admin_image']['tmp_name'];
  $path      = "upload/";

  move_uploaded_file($tmp_name, $path.$admin_image);
  if ($_FILES['admin_image']['error']==0) {
    $query = "UPDATE admin SET  admin_email='$email' ,admin_password='$password' ,fullname='$fullname', admin_image='$admin_image' WHERE admin_id={$_GET['admin_id']}" ;
  }else{
  $query = "UPDATE admin SET  admin_email='$email' ,admin_password='$password' ,fullname='$fullname' WHERE admin_id={$_GET['admin_id']}" ;
  }
  // Applied query
  if(mysqli_query($conn,$query)){
echo "<script> window.top.location='manage_admin.php'; </script>";  } /* Back to manage admin page */

}

//fetch data from edit

$query  = " SELECT * FROM admin WHERE admin_id={$_GET['admin_id']}";
$result = mysqli_query($conn, $query); 
$row = mysqli_fetch_assoc($result);







?>

        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Edit Admin</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                              <button class="btn btn-default" type="button">Go!</button>
                          </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
 <div class="row">
              <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Update Admin<small>sub title</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                          </div>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <form class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data">

                      
                      <span class="section">Admin Info</span>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Admin fullName <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6">
                          <input id="name" class="form-control" data-validate-length-range="6" data-validate-words="2" name="fullname" required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Admin Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6">
                          <input type="email" id="email" name="admin_email" required="required" class="form-control">
                        </div>
                      </div>
                      
                      <div class="item form-group">
                        <label for="password" class="col-form-label col-md-3 label-align">Password</label>
                        <div class="col-md-6 col-sm-6">
                          <input id="password" type="password" name="password" data-validate-length="6,8" class="form-control" required="required">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="password2" class="col-form-label col-md-3 col-sm-3 label-align ">Admin image</label>
                        <div class="col-md-6 col-sm-6">
                          <input id="password2" type="file" name="admin_image" data-validate-linked="password" class="form-control" required="required">
                        </div>
                      </div>
                     
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 offset-md-3">
                          
                          <button id="send" type="submit" name="submit" class="btn btn-success">Update</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php include('../includes/admin_footer.php'); ?>