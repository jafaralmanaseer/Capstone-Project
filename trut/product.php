<?php include('includes/public_header.php'); ?>

<!-- Home -->
<link rel="stylesheet" type="text/css" href="styles/product.css">
<link rel="stylesheet" type="text/css" href="styles/product_responsive.css">

	<div class="home">
		<div class="home_container">
			<div class="home_background" style="background-image:url(images/categories.jpg)"></div>
			<div class="home_content_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="home_content">
								<div class="home_title">Smart Phones<span>.</span></div>
								<div class="home_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie eros. Sed viverra velit venenatis fermentum luctus.</p></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Product Details -->

	<div class="product_details">
		<div class="container">
			<div class="row details_row">

				<!-- Product Image -->
				

				
			</div>

			
		</div>
	</div>

	<!-- Products -->

	<div class="products">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="products_title">Related Products</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					
					<div class="product_grid">
						  <?php
                             
                                if (isset($_GET['cat_id'])) {
                                	$query="SELECT * FROM product where cat_id = {$_GET['cat_id']}";
                                	//echo $query;die;
                        			$result     =mysqli_query($conn,$query);
                        			while ($row =mysqli_fetch_assoc($result)){
                        
                                	echo "<div class='product'>
							<div class='product_image'><img height='260' width='250' src='admin/upload/{$row['product_image']}' alt=''>
							</div>
							<div class='product_extra product_new'><a href='categories.html'>New</a></div>
							<div class='product_content'>
								<div class='product_title'><a href='single_product_details.php?product_id={$row['product_id']}'>{$row['product_name']}</a></div>
								<div class='product_price'>{$row['product_price']}</div>
							</div>
						</div>";
					}

                                }else {
                                	$query="SELECT * FROM product";
                        $result     =mysqli_query($conn,$query);
                        while ($row =mysqli_fetch_assoc($result)){
                        
                                	echo "<div class='product'>
							<div class='product_image'><img height='260' width='250' src='admin/upload/{$row['product_image']}' alt=''>
							</div>
							<div class='product_extra product_new'><a href='categories.html'>New</a></div>
							<div class='product_content'>
								<div class='product_title'><a href='single_product_details.php?product_id={$row['product_id']}'>{$row['product_name']}</a></div>
								<div class='product_price'>{$row['product_price']} </div>
							</div>
						</div>";
                                }
                                
                            }
                                	?>

						<!-- Product -->
						

						<!-- Product -->
						


					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Newsletter -->

	<div class="newsletter">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="newsletter_border"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-8 offset-lg-2">
					<div class="newsletter_content text-center">
						<div class="newsletter_title">Subscribe to our newsletter</div>
						<div class="newsletter_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie eros</p></div>
						<div class="newsletter_form_container">
							<form action="#" id="newsletter_form" class="newsletter_form">
								<input type="email" class="newsletter_input" required="required">
								<button class="newsletter_button trans_200"><span>Subscribe</span></button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>





<?php  include('includes/public_footer.php'); ?>