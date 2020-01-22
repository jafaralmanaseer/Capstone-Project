<?php include('includes/public_header.php'); 

if (isset($_POST['addtocart'])) {
    $_SESSION['product_id'][]=$_GET['product_id'];
    
}

?>

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
				
				 <?php
         $query="SELECT * FROM product where product_id={$_GET['product_id']}";
                          $result     =mysqli_query($conn,$query);
                          $row =mysqli_fetch_assoc($result);

                          echo "<div class='col-lg-6'>
					<div class='details_image'>
						<div class='details_image_large'> <img width='450px' height='450px' src='admin/upload/{$row['product_image']}' alt=''> 
						 <div class='product_extra product_new'>
						 <a href='categories.html'>New</a></div></div>
						<div class='details_image_thumbnails d-flex flex-row align-items-start justify-content-between'>";
							$query2="SELECT * FROM product_images where product_id={$_GET['product_id']}";
                          $result2     =mysqli_query($conn,$query2);
                          while ($row2 =mysqli_fetch_assoc($result2)) {
                          	echo "<div class='details_image_thumbnail ' data-image='images/details_1.jpg'><img width='99.75px' height='99.75px' src='admin/upload/{$row2['product_image']}' alt=''></div>";
                                                    }
                                                    	echo "		
						</div>
					</div>
				</div>";
						
							
					
                          echo '<div class="col-lg-6">
					            <div class="details_content">';
					echo "<div class='details_name'>{$row['product_name']}</div>
						 <div class='details_price'>{$row['product_price']}</div>";
						echo '<div class="in_stock_container">
							<div class="availability">Availability:</div>
							<span>In Stock</span>
						</div>';
						echo "<div class='details_text'>
							<p>{$row['product_desc']}</p>
						</div>";
                        ?>
				<!-- Product Content -->
				<!-- <div class="col-lg-6">
					<div class="details_content">
						<div class="details_name">Smart Phone</div>
						<div class="details_discount">$890</div>
						<div class="details_price">$670</div>
 -->
						<!-- In Stock -->
						<!-- <div class="in_stock_container">
							<div class="availability">Availability:</div>
							<span>In Stock</span>
						</div>
						<div class="details_text">
							<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Phasellus id nisi quis justo tempus mollis sed et dui. In hac habitasse platea dictumst. Suspendisse ultrices mauris diam. Nullam sed aliquet elit. Mauris consequat nisi ut mauris efficitur lacinia.</p>
						</div>
 -->
						<!-- Product Quantity -->
						<div class="product_quantity_container" style="    display: flex;" >
							<div class="product_quantity clearfix">
								<span>Qty</span>
								<input id="quantity_input" type="text" pattern="[0-9]*" value="1">
								<div class="quantity_buttons">
									<div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fa fa-chevron-up" aria-hidden="true"></i></div>
									<div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fa fa-chevron-down" aria-hidden="true"></i></div>
								</div>
							</div>
							<form  action="" method="post">
							<div class="">
								<button style="margin-left: 20px; padding: 13.5px;" type="submit" class="btn btn-dark btn-lg" name="addtocart" >Add to cart</button>
							</div>
						</form>
						</div>

						<!-- Share -->
						<div class="details_share">
							<span>Share:</span>
							<ul>
								<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<div class="row description_row">
				<div class="col">
					<div class="description_title_container">
						<div class="description_title">Description</div>
						<div class="reviews_title"><a href="#">Reviews <span>(1)</span></a></div>
					</div>
					<div class="description_text">
						<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Phasellus id nisi quis justo tempus mollis sed et dui. In hac habitasse platea dictumst. Suspendisse ultrices mauris diam. Nullam sed aliquet elit. Mauris consequat nisi ut mauris efficitur lacinia.</p>
					</div>
				</div>
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
								<div class='product_title'><a href='product.html'>{$row['product_name']}</a></div>
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
								<div class='product_title'><a href='product.html'>{$row['product_name']}</a></div>
								<div class='product_price'>{$row['product_price']}</div>
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