<?php

    include('includes/public_header.php');
    ?>


<link rel="stylesheet" type="text/css" href="styles/cart.css">
<link rel="stylesheet" type="text/css" href="styles/cart_responsive.css">




<!-- Home -->

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
										<li><a href="categories.html">Categories</a></li>
										<li>Shopping Cart</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Cart Info -->

	<div class="cart_info">
		<div class="container">
			<div class="row">
				<div class="col">
					<!-- Column Titles -->
					<div class="cart_info_columns clearfix">
						<div class="cart_info_col cart_info_col_product">Product</div>
						<div class="cart_info_col cart_info_col_price">Price</div>
						
						
					</div>
				</div>
			</div>
			<div class="row cart_items_row">
				<div class="col">

					<!-- Cart Item -->
					
						<!-- Name -->
						
											 <?php
        				$price=0;
                if (isset($_SESSION['product_id']) && count($_SESSION['product_id'])>0) {
                   foreach ($_SESSION['product_id'] as $pro_id) {
                          $query="select * from product where product_id=$pro_id";
                          $result=mysqli_query($conn,$query);
                          while ($row =mysqli_fetch_assoc($result)){
                        echo "<div class='cart_item d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start'>
                        <div class='cart_item_product d-flex flex-row align-items-center justify-content-start'>
                          	<div class='cart_item_image'>
								<div> <img width='183px' height='163px' src='admin/upload/{$row['product_image']}' alt=''> 
								</div>
							</div>
							<div class='cart_item_name_container'>
								<div class='cart_item_name'><a href='#''>{$row['product_name']}</a></div>
								<div class='cart_item_edit'><a href='#''>Edit Product</a></div>
							</div>
						</div>
						<!-- Price -->
						<div class='cart_item_price'>{$row['product_price']} $ </div>
						<!-- Quantity -->
						
								
								</div>
								";
								$price+=$row['product_price'];
							}
						}
					}
                           ?>
                           
						
						<!-- Price -->
						
						<!-- Quantity -->
						
						<!-- Total -->
						
					

				</div>
			</div>
			<div class="row row_cart_buttons">
				<div class="col">
					<div class="cart_buttons d-flex flex-lg-row flex-column align-items-start justify-content-start">
						<div class="button continue_shopping_button"><a href="#">Continue shopping</a></div>
						<div class="cart_buttons_right ml-lg-auto">
							<div class="button clear_cart_button"><a href="#">Clear cart</a></div>
							<div class="button update_cart_button"><a href="#">Update cart</a></div>
						</div>
					</div>
				</div>
			</div>
			<div class="row row_extra">
				<div class="col-lg-4">
					
					

					<!-- Coupon Code -->
					<div class="coupon">
						<div class="section_title">Coupon code</div>
						<div class="section_subtitle">Enter your coupon code</div>
						<div class="coupon_form_container">
							<form action="#" id="coupon_form" class="coupon_form">
								<input type="text" class="coupon_input" required="required">
								<button class="button coupon_button"><span>Apply</span></button>
							</form>
						</div>
					</div>
				</div>

				<div class="col-lg-6 offset-lg-2">
					<div class="cart_total">
						<div class="section_title">Cart total</div>
						<div class="section_subtitle">Final info</div>
						<div class="cart_total_container">
							<ul>
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="cart_total_title">Subtotal</div>
									<div class="cart_total_value ml-auto"><?php echo $price." "."$"; ?>
										
									</div>
								</li>
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="cart_total_title">Shipping</div>
									<div class="cart_total_value ml-auto">Free</div>
								</li>
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="cart_total_title">Total</div>
									<div class="cart_total_value ml-auto"><?php echo $price." "."$"; ?></div>
								</li>
							</ul>
						</div>
						<div class="button checkout_button"><a href="checkout.php">Proceed to checkout</a></div>
					</div>
				</div>
			</div>
		</div>		
	</div>

<?php include('includes/public_footer.php');?>