<?php 
// database connection 
include('../includes/admin_header.php'); 

if (isset($_POST['submit'])) {
  // fetch data
  
  $cat_name = $_POST['cat_name'];
  // Esiablish connection
  $cat_image = $_FILES['cat_image']['name'];
  $tmp_name    = $_FILES['cat_image']['tmp_name'];
  $path      = "upload/";

  move_uploaded_file($tmp_name, $path.$cat_image);
  if ($_FILES['cat_image']['error']==0) {
    $query = "UPDATE category SET  cat_name='$cat_name',cat_image='$cat_image' WHERE cat_id={$_GET['cat_id']}" ;
  }else{
  $query = "UPDATE category SET  cat_name='$cat_name' WHERE cat_id={$_GET['cat_id']}" ;
  }

  // Applied query
  if(mysqli_query($conn,$query)){
echo "<script> window.top.location='manage_category.php'; </script>";  } /* Back to manage admin page */

}

//fetch data

$query  = " SELECT * FROM category WHERE cat_id={$_GET['cat_id']}";
$result = mysqli_query($conn, $query); 
$row =  mysqli_fetch_assoc($result);






?>



<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Manage Catergory</h3>
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
                    <h2>Add Category <small>sub title</small></h2>
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

                      
                      <span class="section">New Category</span>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Category Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6">
                          <input id="name" class="form-control" data-validate-length-range="6" data-validate-words="2" name="cat_name" required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="password2" class="col-form-label col-md-3 col-sm-3 label-align ">Category image</label>
                        <div class="col-md-6 col-sm-6">
                          <input id="password2" type="file" name="cat_image" data-validate-linked="password" class="form-control" required="required">
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