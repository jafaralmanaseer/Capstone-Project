<?php
 include('../includes/admin_header.php');

if (isset($_POST['submit'])) {
	// fetch data
	$product_name   		= $_POST['product_name'];
	$product_price  		= $_POST['product_price'];
	$product_description   	= $_POST['product_description'];
	$category_id	  		= $_POST['cat_id'];
	$product_image= $_FILES['product_image']['name'];
	$tmp_name    = $_FILES['product_image']['tmp_name'];
	$path 		 = "upload/";
	move_uploaded_file($tmp_name, $path.$product_image);

	$query = "INSERT INTO product (product_name, product_price, product_desc,cat_id,product_image) VALUES ('$product_name','$product_price','$product_description',$category_id,'$product_image')";

	// Applied query
	
	if(mysqli_query($conn,$query)){
		echo "<script> window.top.location='manage_product.php' </script>";
	}


}


 ?>
<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Manage Product</h3>
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
                    <h2>Add product <small>sub title</small></h2>
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

                      
                      <span class="section">product Info</span>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Product Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6">
                          <input id="name" class="form-control" data-validate-length-range="6" data-validate-words="2" name="product_name" required="required" type="text">
                        </div>
                      </div>

                       <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Product Price<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6">
                          <input id="name" class="form-control" data-validate-length-range="6" data-validate-words="2" name="product_price" required="required" type="text">
                        </div>
                      </div>


                     
                      
                      <div class="item form-group">
                        <label for="password" class="col-form-label col-md-3 label-align">Product Description
                        </label>
                        <div class="col-md-6 col-sm-6">
                          <input id="password" type="text" name="product_description" data-validate-length="6,8" class="form-control" required="required">
                        </div>
                      </div>

                       <div class="item form-group">
                        <label for="password2" class="col-form-label col-md-3 col-sm-3 label-align ">Category ID</label>
                        <div class="col-md-6 col-sm-6">
                        	


										<select name="cat_id" id="select" class="form-control">
									<option selected disabled>Show all Category</option>


								<?php
									$query  = " SELECT * FROM category";
									$result = mysqli_query($conn, $query);
									$currentName = $row["cat_id"];

									while ($row = mysqli_fetch_array($result)) 
										echo "<option value='$row[0]'>{$row[1]}</option>";
										?>
								</select>
                         
                        </div>
                      </div>

                      <div class="item form-group">
                        <label for="password2" class="col-form-label col-md-3 col-sm-3 label-align ">Product Image</label>
                        <div class="col-md-6 col-sm-6">
                          <input id="password2" type="file" name="product_image" data-validate-linked="password" class="form-control" required="required">
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
                            <th class="column-title">Name </th>
                            <th class="column-title">Price </th>
                            <th class="column-title">Description </th>
                            <th class="column-title">Category Id </th>
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
								if (isset($_GET['sort']) && isset($_GET['cat_id'])) {
									$query  = " SELECT * FROM product WHERE cat_id = {$_GET['cat_id']} ";
									$result = mysqli_query($conn, $query);
									while ($row = mysqli_fetch_assoc($result)) {
										echo "<tr>";
										echo "<td>{$row['product_id']}</td>";
										echo "<td>{$row['product_name']}</td>";
										echo "<td>{$row['product_price']}</td>";
										echo "<td>{$row['product_desc']}</td>";
										echo "<td>{$row['cat_id']}</td>";
										echo "<td><img height='50px' width='50px' src='upload/{$row['product_image']}'></td>";
										echo "<td><a href='edit_product.php?product_id={$row['product_id']}' class='btn btn-warning'>Edit</a></td>";
										echo "<td><a href='delete_product.php?product_id={$row['product_id']}' class='btn btn-danger '>Delete</a></td>";
										echo "<tr>";
									}

								}else {
									$query  = " SELECT * FROM product";
									$result = mysqli_query($conn, $query);
									while ($row = mysqli_fetch_assoc($result)) {
										echo "<tr>";
										echo "<td>{$row['product_id']}</td>";
										echo "<td>{$row['product_name']}</td>";
										echo "<td>{$row['product_price']}</td>";
										echo "<td>{$row['product_desc']}</td>";
										echo "<td>{$row['cat_id']}</td>";
										echo "<td><img height='50px' width='50px' src='upload/{$row['product_image']}'></td>";
										echo "<td><a href='edit_product.php?product_id={$row['product_id']}' class='btn btn-warning'>Edit</a></td>";
										echo "<td><a href='delete_product.php?product_id={$row['product_id']}' class='btn btn-danger '>Delete</a></td>";
										echo "<tr>";
									}
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