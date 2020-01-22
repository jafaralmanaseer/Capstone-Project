
<?php

    include('includes/public_header.php');
    if (isset($_POST['submit'])) {
    // fetch data
    $country1      = $_POST['country'];
    $address1      = $_POST['address'];
    $city1         = $_POST['city'];
   
   $query = "UPDATE customer SET  country='$country1' ,address='$address1' ,city='$city1' WHERE customer_id={$_SESSION['customer_id']}" ;

   if (mysqli_query($conn,$query)) {
       echo "<script> window.top.location='order.php'; </script>";

   }

    

}
    ?>
    <link rel="stylesheet" type="text/css" href="styles/checkout.css">
<link rel="stylesheet" type="text/css" href="styles/checkout_responsive.css">
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
	<!-- Checkout -->
	
	<div class="checkout">
		<div class="container">
			<div class="row">

				<!-- Billing Info -->
				<div class="col-lg-6">
					<div class="billing checkout_section">
						<div class="section_title">Billing Address</div>
						<div class="section_subtitle">Enter your address info</div>
						<div class="checkout_form_container">
							<form action="#" id="checkout_form" class="checkout_form" method="post">
								
								
								<div>
									<!-- Country -->
									<label for="checkout_country">Country*</label>
									<select name="country" id="checkout_country" class="dropdown_item_select checkout_input" require="required">
										<option></option>
										<option>Lithuania</option>
										<option>Sweden</option>
										<option>UK</option>
										<option>Italy</option>
									</select>
								</div>
								<div>
									<!-- Address -->
									<label for="checkout_address">Address*</label>
									<input type="text" name="address" class="checkout_input" required="required">
									
								</div>
								
								
								
								
								<div>
									<!-- Email -->
									<label for="checkout_email">TOWN/CITY*</label>
									<input type="text" name="city" class="checkout_input" required="required">
								</div>
								<div class="checkout_extra">
									<div>
										<input type="checkbox" id="checkbox_terms" name="regular_checkbox" class="regular_checkbox" checked="checked">
										<label for="checkbox_terms"><img src="images/check.png" alt=""></label>
										<span class="checkbox_title">Terms and conditions</span>
									</div>
									
									
								</div>
							</form>
						</div>
					</div>
				</div>

				<!-- Order Info -->

				<div class="col-lg-6">
					<div class="order checkout_section">
						<div class="section_title">Your order</div>
						<div class="section_subtitle">Order details</div>

						<!-- Order details -->
						<div class="order_list_container">
							<div class="order_list_bar d-flex flex-row align-items-center justify-content-start">
								<div class="order_list_title">Product</div>
								<div class="order_list_value ml-auto">Total</div>
							</div>
							<ul class='order_list'>
							 <?php
							 $price=0;
                             if (isset($_SESSION['product_id'])) {
                                 
                            
                                $query  = "SELECT * FROM product ";
                                $result = mysqli_query($conn,$query);
                                 while ( $row = mysqli_fetch_assoc($result) ) {

                                    foreach($_SESSION["product_id"] as $key => $value) {
                                        if ($row['product_id'] == $value) {
                                            echo "
                                             <li class='d-flex flex-row align-items-center justify-content-start'>
												<div class='order_list_title'>{$row['product_name']}</div>
												<div class='order_list_value ml-auto'>{$row['product_price']} $</div>
													</li>";
													$price+=$row['product_price'];
                                        }
                                    }
                                }  
                               } 
                            ?>
                        
							
								
								
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="order_list_title">Shipping</div>
									<div class="order_list_value ml-auto">Free</div>
								</li>
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="order_list_title">Total</div>
									<div class="order_list_value ml-auto"><?php echo $price." "."$"; ?></div>
								</li>
							</ul>
						</div>

						<!-- Payment Options -->
						<div class="payment">
							<div class="payment_options">
								<label class="payment_option clearfix">Paypal
									<input type="radio" name="radio">
									<span class="checkmark"></span>
								</label>
								<label class="payment_option clearfix">Cach on delivery
									<input type="radio" name="radio">
									<span class="checkmark"></span>
								</label>
								<label class="payment_option clearfix">Credit card
									<input type="radio" name="radio">
									<span class="checkmark"></span>
								</label>
								<label class="payment_option clearfix">Direct bank transfer
									<input type="radio" checked="checked" name="radio">
									<span class="checkmark"></span>
								</label>
							</div>
						</div>

						<!-- Order Text -->
						<div class="order_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra temp or so dales. Phasellus sagittis auctor gravida. Integ er bibendum sodales arcu id te mpus. Ut consectetur lacus.</div>
						<div class="button order_button"><a href="">Place Order</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include('includes/public_footer.php'); ?>	