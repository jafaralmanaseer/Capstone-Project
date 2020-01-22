<?php 

include('../includes/admin_header.php');


if (isset($_POST['submit'])) {
	// fetch data
	$email 	     = $_POST['admin_email'];
	$password    = $_POST['password'];
	$fullname    = $_POST['admin_fullname'];
	// Esiablish connection
	$admin_image = $_FILES['admin_image']['name'];
	$tmp_name    = $_FILES['admin_image']['tmp_name'];
	$path 		 = "upload/";

	move_uploaded_file($tmp_name, $path.$admin_image);


	$query = "INSERT INTO admin (admin_email, admin_password, fullname, admin_image) VALUES ('$email','$password','$fullname','$admin_image')";
	// Applied query

	if(mysqli_query($conn,$query)){
		 echo "<script> window.top.location='manage_admin.php'; </script>";

	}


}

 

?>
  <!-- page content -->

        <div class="right_col" role="main">
          
            <div class="page-title">
              <div class="title_left">
                <h3>Manage Admin</h3>
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
                    <h2>Product<small>sub title</small></h2>
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
                          <input id="name" class="form-control" data-validate-length-range="6" data-validate-words="2" name="admin_fullname" required="required" type="text">
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
                          <button type="submit" class="btn btn-primary">Cancel</button>
                          <button id="send" type="submit" name="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                    </form>
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
                  $query  = " SELECT * FROM admin";
                  $result = mysqli_query($conn, $query);
                  while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";

                    echo "<td>{$row['admin_id']}</td>";
                    echo "<td>{$row['admin_email']}</td>";
                    echo "<td>{$row['fullname']}</td>";
                    echo "<td> <img width='30px' height='30px' src='upload/{$row['admin_image']}'> </td>";
                    echo "<td><a href='edit_admin.php?admin_id={$row['admin_id']}' class='btn btn-warning'>Edit</a></td>";
                    echo "<td><a href='delete_admin.php?admin_id={$row['admin_id']}' class='btn btn-danger '>Delete</a></td>";
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
        </div>
        </div>
      




  <!--       
<html>
    <head>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function()
            {
                $("#userId").change(function()
                {
                    //get selected parent option 
                    var admin_id = $("#userId").val();
                    //alert(admin_id);
                    $.ajax(
                            {
                                type: "GET",
                                url: "names.php?admin_id=" + admin_id,
                                success: function(data)
                                {
                                    $("#names").html(data);
                                    
                                }
                            });
                });

            });
        </script>
<?php 
$conn = mysqli_connect("localhost","root","","aquamall");

$result = mysqli_query($conn, "SELECT * FROM admin");
while($row = mysqli_fetch_array($result)){
  $userSet[] = $row;
}
?>        
    </head>
    <body>        
        <h2>Select User</h2>
        <form action="ajax.php" method="post">
            <select name='userId' id='userId'>
                <option value=""></option>
                <?php
                foreach ($userSet as $key => $value) {
                    echo "<option value='{$value['admin_id']}'>{$value['admin_id']}</option>";
                }
                ?>
            </select>
            <select id="names"></select>
        </form> 
    </body>
</html> -->

            </div>
         
        </div>















         
              


<?php include('../includes/admin_footer.php'); ?>