<?php include('includes/public_header.php'); 
 
 if (isset($_SESSION['prvider_id']) ) {
        echo "<script> window.top.location='the_auction.php'; </script>";
       
        
         exit();
    }

if (!isset($_SESSION['customer_id']) ) {
        echo "<script> window.top.location='regester.php'; </script>";
       
        exit();

    }
   

if (isset($_POST['submit'])) {
	// fetch data

	$product_name1  	= $_POST['product_name'];
	
	$description1   	= $_POST['description'];
	$category_id1	  	= $_POST['checkout_country'];
	$customer_id        = $_SESSION['customer_id'];
	$price				= $_POST['price'];
	$query = "INSERT INTO offers(product_name ,cat_id ,description , customer_id,price) VALUES ('$product_name1','$category_id1' ,'$description1','$customer_id','$price')";
	
	mysqli_query($conn,$query);

	// Applied query
	
	// if(mysqli_query($conn,$query)){
	// 	echo "<script> window.top.location='manage_product.php' </script>";
	// }


}

?>

<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

#myInput12 {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd !important;
  margin-bottom: 12px;

}

#myTable12 {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd !important;
  font-size: 18px;
}

#myTable12 th, #myTable12 td {
  text-align: left;
  padding: 12px;
  color: black;
}

#myTable12 tr {
  border-bottom: 1px solid #ddd !important;
}

#myTable12 tr.header12, #myTable12 tr:hover {
  background-color: #f1f1f1 !important;

}
</style>






<link rel="stylesheet" type="text/css" href="styles/contact.css">
<link rel="stylesheet" type="text/css" href="styles/contact_responsive.css">
<link rel="stylesheet" type="text/css" href="styles/checkout.css">
<link rel="stylesheet" type="text/css" href="styles/checkout_responsive.css">

<div class="super_container">
	<div class="home">
		<div class="home_container">
			<div class="home_background" style="background-image:url(images/contact.jpg)"></div>
			<div class="home_content_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="home_content">
								<div class="breadcrumbs">
									<ul>
										<li><a href="index.php">Home</a></li>
										<li>Offers</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<div class="checkout">
		<div class="container">
			<div class="row">

						<!-- Billing Info -->
				<div class="col-lg-6">
					<div class="billing checkout_section">
						<div class="section_title">Registration</div>
						<div class="section_subtitle">Enter your info</div>
						<div class="checkout_form_container">
							<form action="#" id="checkout_form" class="checkout_form" method="post">
								
								<div>
									<!-- Country -->
									<label for="checkout_country">CATEGORY*</label>
									<select name="checkout_country" id="checkout_country" class="dropdown_item_select checkout_input" require="required" name="category">
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
								<div>
									<!-- Company -->
									<label for="checkout_company">Product Name</label>
									<input type="text" id="checkout_company" class="checkout_input" name="product_name">
								</div>
								<div>
									<!-- Company -->
									<label for="checkout_company">Product Description</label>
									<input type="text" id="checkout_company" class="checkout_input" name="description">
								</div>
								
								
								<div class="checkout_extra">
									
									<button class="btn btn-info" type="submit" name="submit"> Save </button>
								</div>
							</form>
						</div>
					</div>
				</div>
					<div class="checkout">
		<div class="container">
			<div class="row">	

<h2>My Customers</h2>

<input type="text" id="myInput12" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">

<table id="myTable12">
  <tr class="header12">
    <th style="width:20%;">Name</th>
    <th style="width:20%;">Email</th>
    <th style="width:20%;">Product</th>
    <th style="width:20%;">Description</th>
    <th style="width:20%;">Vew</th>
    <th style="width:20%;">Contact Provider</th>
    
  </tr>
  <?php
  $query="SELECT * FROM offers 	LEFT JOIN customer on offers.customer_id = customer.customer_id   where 
  customer.customer_id = {$_SESSION['customer_id']} 
  UNION 
  SELECT * FROM offers 		RIGHT JOIN customer on offers.customer_id = customer.customer_id      where 
  customer.customer_id = {$_SESSION['customer_id']} 
   ";
                                	
     $result     =mysqli_query($conn,$query);
        while ($row =mysqli_fetch_assoc($result)){
         
							        	echo "<tr>
							                <td>{$row['name']}</td>
							   				 <td>{$row['email']}</td>
							   				 <td>{$row['product_name']}</td>
							   				 <td>{$row['description']}</td>
							   				 <td>";
							   				 $price1  ="{$row['price']}";
							   				 if(empty($price1)){
							   				 
							   							echo "<p class='alert alert-danger'>no price yet</p>";
							   			}else {
							   				 			echo"{$row['price']}";
							   				   }

							   				 		
							   				 	echo "
							   				 	</td>
							   				 	<td>
							   				 		<a href='contact.php?prvider_id={$row['prvider_id']}'>
							   				 			<button class='btn btn-info'>Contact Provider</button>
							   				 		</a>
							   				 	</td>
							   				 
								</form>
								
											  </tr>";
		}


          ?>
  
 
</table>

<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
</div>
</div>
</div>


			</div>
		</div>
	</div>
</div>

















<?php include('includes/public_footer.php'); ?>
