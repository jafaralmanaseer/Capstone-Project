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