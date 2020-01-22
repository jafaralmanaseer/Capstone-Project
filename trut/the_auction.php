<?php
include('includes/public_header.php');

if (!isset($_SESSION['prvider_id']) ) {
        echo "<script> window.top.location='regester.php'; </script>";
       
        exit();

    }
 
if (isset($_POST['submit'])) {
	$price =$_POST['price'];


	// fetch data
$query     ="SELECT price from offers where offer_id={$_POST['offerss']}";
$result    =mysqli_query($conn,$query);
$row       =mysqli_fetch_assoc($result);
if(empty($row)){

$query1= "INSERT into offers (price,prvider_id) VALUES ('$price',{$_SESSION['prvider_id']})";


}else{
	$query1="UPDATE offers SET price ='$price', prvider_id = {$_SESSION['prvider_id']}  where offer_id={$_POST['offerss']}";
}
	
	

	
	if(mysqli_query($conn,$query1)){
		echo "<script> window.top.location='the_auction.php' </script>";
	}



}


?>
<link rel="stylesheet" type="text/css" href="styles/checkout.css">
<link rel="stylesheet" type="text/css" href="styles/checkout_responsive.css">

<!DOCTYPE html>
<html>
<head>
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

.disable{
	cursor: not-allowed;
}
</style>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function()
    {
      $("#checkout_company").keyup(function()
        {
          //get selected parent option 
          var price = $("#checkout_company").val();
          var offers = $("#offers").val();

          //alert(admin_id);
          $.ajax(
          {
			type: "GET",
            url: "ajax.php?price=" + price +"&offer_id=" + offers,
            success: function(data)
            {
              $("#vaild-price").html(data);
            }
          });

          var className = $("#vaild-price p").attr('class');
          if (className =='text-danger') {
          	$('.btn.btn-info').attr('disabled',true);
          }

        });
    });
</script>
</head>
	
<body>
<div class="super_container">
<div class="home">
		<div class="home_container">
			<div class="home_background" style="background-image:url(images/cart.jpg)"></div>
			<div class="home_content_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="home_content">
								<div class="breadcrumbs">
									<ul>
										<li><a href="index.html">Home</a></li>
										<li><a href="cart.html">Shopping Cart</a></li>
										<li>Checkout</li>
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

<h2>My Customers</h2>

<input type="text" id="myInput12" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">

<table id="myTable12">
	<caption id="vaild-price" >
		
	</caption>
  <tr class="header12">
    <th style="width:20%;">Name</th>
    <th style="width:20%;">Email</th>
    <th style="width:20%;">Product</th>
    <th style="width:20%;">Description</th>
    <th style="width:20%;">Inter Price</th>
    
  </tr>
  <?php
  $query="SELECT * FROM offers 	LEFT JOIN customer on offers.customer_id = customer.customer_id
  UNION 
  SELECT * FROM offers 		RIGHT JOIN customer on offers.customer_id = customer.customer_id ";
                                	
     $result     =mysqli_query($conn,$query);
        while ($row =mysqli_fetch_assoc($result)){
          
							        	echo "<tr>
							                <td>{$row['name']}</td>
							   				 <td>{$row['email']}</td>
							   				 <td>{$row['product_name']}</td>
							   				 <td>{$row['description']}</td>
							   				 <td><div>
									<!-- Company -->
									<form action='#' id='checkout_form' class='checkout_form' method='post'>
									
									<input type='number' id='checkout_company' class='checkout_input' name='price' placeholder='$' style='width:40% !important'>
									<input type='number' id='offers' value='{$row['offer_id']}' name='offerss' hidden>
									<button class='btn btn-info' type='submit' name='submit'> Save </button>

								</div>
								</form>
								</td>
											  </tr>";
		}


          ?>
  
 
</table>

<script > 
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

</body>
</html>












<?php include('includes/public_footer.php'); ?>