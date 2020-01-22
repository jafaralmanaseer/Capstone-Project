<?php 
// database connection 
include('../includes/connection.php');





include('../includes/admin_header.php'); ?>
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
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
                          
                          
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>

                        <tbody>
                          <?php
								
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
										echo "</tr>";
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
  <?php include('../includes/admin_footer.php'); ?>