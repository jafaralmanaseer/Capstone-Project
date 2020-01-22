<?php 
include('../includes/admin_header.php');
// database connection 


if (isset($_POST['submit'])) {
	// fetch data
	$catname 	 = $_POST['cat_name'];
	$cat_image   = $_FILES['cat_image']['name'];
	$tmp_name    = $_FILES['cat_image']['tmp_name'];
	$path 		 = "upload/";

	move_uploaded_file($tmp_name, $path.$cat_image);

	$query = "INSERT INTO category (cat_name,cat_image) VALUES ('$catname','$cat_image')";
	// Applied query
	

	if(mysqli_query($conn,$query)){
		echo "<script> window.top.location='manage_category.php' </script>";
	}


}














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
                          <button type="submit" class="btn btn-primary">Cancel</button>
                          <button id="send" type="submit" name="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
             <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Admin Info <small></small></h2>
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

                    <p>Add class <code>bulk_action</code> to table for bulk actions options on row select</p>

                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                           

                            <th class="column-title">ID </th>
                            <th class="column-title">Email </th>
                            <th class="column-title">Name </th>
                            <th class="column-title">Image </th>
                            <th class="column-title">Edit </th>
                            <th class="column-title">Delete </th>
                            </th>
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>

                        <tbody>
                          <?php
									$query  = " SELECT * FROM category";
									$result = mysqli_query($conn, $query);
									while ($row = mysqli_fetch_assoc($result)) {
										echo "<tr>";
										echo "<td>{$row['cat_id']}</td>";
										echo "<td>{$row['cat_name']}</td>";
										echo "<td><img height='50px' width='50px' src='upload/{$row['cat_image']}'></td>";
										echo "<td><a href='view_product.php?cat_id={$row['cat_id']}' class='btn btn-primary'>View</a></td>";
										echo "<td><a href='edit_category.php?cat_id={$row['cat_id']}' class='btn btn-warning'>Edit</a></td>";
										echo "<td><a href='delete_category.php?cat_id={$row['cat_id']}' class='btn btn-danger ' >Delete</a></td>";
										echo "<tr>";
									}
								?>
                        </tbody>
                      </table>
                    </div>
							
						
                  </div>
                </div>
              </div>
          </div>
        </div>

             
            

<?php include('../includes/admin_footer.php'); ?>