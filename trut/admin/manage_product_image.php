<?php 
include('../includes/admin_header.php');
// database connection 


if (isset($_POST['submit'])) {
	// fetch data
	$product_id 	 = $_POST['product_id'];
	$product_image   = $_FILES['product_image']['name'];
	$tmp_name    	 = $_FILES['product_image']['tmp_name'];
	$path 			 = "upload/";

	move_uploaded_file($tmp_name, $path.$product_image);

	$query = "INSERT INTO product_images (product_image,product_id) VALUES ('$product_image','$product_id')";
	// Applied query
	

	if(mysqli_query($conn,$query)){
		echo "<script> window.top.location='manage_product_image.php' </script>";
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
                        <label for="password2" class="col-form-label col-md-3 col-sm-3 label-align ">image</label>
                        <div class="col-md-6 col-sm-6">
                          <input id="password2" type="file" name="product_image" data-validate-linked="password" class="form-control" required="required">
                        </div>
                      </div>
                       <div class="item form-group">
                        <label for="password2" class="col-form-label col-md-3 col-sm-3 label-align ">Product Name</label>
                        <div class="col-md-6 col-sm-6">
                        	


										<select name="product_id" id="select" class="form-control">
									<option selected disabled>Show all product</option>


								<?php
									$query  = " SELECT * FROM product";
									$result = mysqli_query($conn, $query);
									$currentName = $row["product_id"];

									while ($row = mysqli_fetch_array($result)) 
										echo "<option value='$row[0]'>{$row[1]}</option>";
										?>
								</select>
                         
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
                            
                            
                            <th class="column-title">Image </th>
                            
                            <th class="column-title">Delete </th>
                            </th>
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>
                        <?php
                          $query  = " SELECT * FROM product_images ";
                  $result = mysqli_query($conn,$query);
                  while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$row['product_id']}</td>";
                   
                    
                    echo "<td><img height='50px' width='50px' src='upload/{$row['product_image']}'></td>";
                    
                    echo "<td><a href='delete_product_image.php?product_id={$row['product_id']}' class='btn btn-danger '>Delete</a></td>";
                    echo "<tr>";
                  }
                  ?>

                        <tbody>
                         
                        </tbody>
                      </table>
                    </div>
							
						
                  </div>
                </div>
              </div>
          </div>
        </div>






            

<?php include('../includes/admin_footer.php'); ?>