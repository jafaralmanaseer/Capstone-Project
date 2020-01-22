<?php

    include('includes/public_header.php');


    if (isset($_SESSION['customer_id'])) {
        echo "<script> window.top.location='offers.php'; </script>";
       
        exit();

    }

    if (isset($_SESSION['prvider_id'])) {
        echo "<script> window.top.location='the_auction.php'; </script>";
       
        exit();

    }
    
    if (isset($_POST['register'])) {

      if ($_POST['optradio'] == "customer"  ) {
        # code...
      


    // fetch data
    $name1       =$_POST['name'];
    $email1      =$_POST['email'];
    $password1   =$_POST['password'];
    $mobile1     =$_POST['mobile'];
    $country1      =$_POST['country'];
    $address1      =$_POST['address'];
    $city1         =$_POST['city'];

    // Esiablish connection



    $query = "INSERT INTO customer (name, email, password, mobile,country,address,city) VALUES ('$name1','$email1','$password1', '$mobile1','$country1','$address1','$city1')";
    
    // Applied query

    if(mysqli_query($conn,$query)){
        echo "<script> window.top.location='checkout.php'; </script>";
    }
}



      if ($_POST['optradio'] == 'provider'  ) {
        
      


    // fetch data
    $name1       =$_POST['name'];
    $email1      =$_POST['email'];
    $password1   =$_POST['password'];
    $mobile1     =$_POST['mobile'];
    $country1      =$_POST['country'];
    $address1      =$_POST['address'];
    $city1         =$_POST['city'];

    // Esiablish connection



    $query = "INSERT INTO providers (name, email, password, mobile,country,address,city) VALUES ('$name1','$email1','$password1', '$mobile1','$country1','$address1','$city1')";
    
    // Applied query

    if(mysqli_query($conn,$query)){
        echo "<script> window.top.location='regester.php'; </script>";
    }
}

}



// if(isset($_POST['login'])){

// $usern = strtolower($_POST['email']);
// $passw = $_POST['password'];
// $_SESSION['customer'] = '';
// $_SESSION['providers'] = '';

// $sql = " SELECT * FROM customer WHERE email = '$usern' AND password = '$passw'";
// $result = mysqli_query($conn, $sql);
// if($result->num_rows > 0){
//      while($row = $result->fetch_assoc()){
//         if($row['email'] = $usern && $row['password'] = $passw){
//             $_SESSION['customer'] = $usern;
//             echo "<script> window.top.location='offers.php'?log=". $_SESSION['customer'] ."</script>";
//          }
//     }
// }else{
//     $sql1 = " SELECT * FROM providers WHERE email = '$usern' AND password = '$passw'";
//     $result1 = mysqli_query($conn, $sql1);
//     if($result1->num_rows > 0){
//         while($row = $result->fetch_assoc()){
//              if($row['email'] = $usern && $row['password'] = $passw){
//                     $_SESSION['providers'] = $usern;
//                     echo "<script> window.top.location='offers.php'?log=".$_SESSION['providers']."</script>";
//              }
//         }
//     }
// }

// }




if(isset($_POST['login'])){

    $username = strtolower($_POST['email']);
    $password = $_POST['password'];
    
    if (!empty($username) && !empty($password)) {
        
        $query    = "SELECT * FROM customer 
        Where email    = '$username' 
        AND 
              password = '$password'";
              

        $result    = mysqli_query($conn,$query);
        $row       = mysqli_fetch_assoc($result);
        
        if ( $row['email']  ){
         $_SESSION['customer_id'] = $row['customer_id'];
         // $_SESSION['prvider_id'] = $row['prvider_id'];
            echo "<script> window.top.location='offers.php'; </script>";

     }else{
      $username1 = strtolower($_POST['email']);
    $password1 = $_POST['password'];
      $query1= " SELECT * FROM providers WHERE email = '$username1' AND password = '$password1'";
       $result1   = mysqli_query($conn,$query1);
        $row1      = mysqli_fetch_assoc($result1);
          
           
         $_SESSION['prvider_id'] = $row1['prvider_id'];
            echo "<script> window.top.location='the_auction.php'; </script>";
         
        
    }   

}
   

}




// if(isset($_POST['login'])){

//     $username = strtolower($_POST['email']);
//     $password = $_POST['password'];
    
//     if (!empty($username) && !empty($password)) {
        
//         $query    = "SELECT * FROM customer 
//         Where email    = '$username' 
//         AND 
//               password = '$password'";
              

//         $result    = mysqli_query($conn,$query);
//         $row       = mysqli_fetch_assoc($result);
        
//         if ( $row['email'] ){
//          $_SESSION['customer_id'] = $row['customer_id'];
//          // $_SESSION['prvider_id'] = $row['prvider_id'];
//             echo "<script> window.top.location='offers.php'; </script>";

//      }else{
//         $error = "Your password or username is incorrect";
//     }   

// }
   

// }



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
        <div class="col-lg-6">
          <div class="billing checkout_section">
            <div class="section_title">Login</div>
            <div class="section_subtitle"></div>
            <div class="checkout_form_container">
              <form action="#" id="checkout_form" class="checkout_form" method="post">
                
                  <div>
                  <!-- Company -->
                  <label for="checkout_company">Email</label>
                  <input type="text" id="checkout_company" class="checkout_input" name="email">
                </div>
                <div>
                  <!-- Company -->
                  <label for="checkout_company">Password</label>
                  <input type="text" id="checkout_company" class="checkout_input" name="password">
                </div>

                <button class="btn btn-info" name="login">
                   <span> 
                   Login 
                  </span>
                     
                  
                </button>
              
              </form>
            </div>
          </div>
        </div>

        <!-- Billing Info -->
        <div class="col-lg-6">
          <div class="billing checkout_section">
            <div class="section_title">Registration</div>
            <div class="section_subtitle">Enter your info</div>
            <div class="checkout_form_container">
              <form action="#" id="checkout_form" class="checkout_form" method="post">
                
                
                <div>
                  <!-- Company -->
                  <label for="checkout_company">FULL NAME*</label>
                  <input type="text" id="checkout_company" class="checkout_input" name="name">
                </div>
                <div>
                  <!-- Company -->
                  <label for="checkout_company">PHON NO*</label>
                  <input type="number" id="checkout_company" class="checkout_input" name="mobile">
                </div>
                <div>
                  <!-- Company -->
                  <label for="checkout_company">EMAIL ADDRESS</label>
                  <input type="text" id="checkout_company" class="checkout_input" name="email">
                </div>
                <div>
                  <!-- Company -->
                  <label for="checkout_company">PASSWORD</label>
                  <input type="text" id="checkout_company" class="checkout_input" name="password">
                </div>
                <div>
                  <!-- Country -->
                  <label for="checkout_country">COUNTRY*</label>
                  <select name="checkout_country" id="checkout_country" class="dropdown_item_select checkout_input" require="required" name="country">
                    <option>Jordan</option>
                    <option>Lithuania</option>
                    <option>Sweden</option>
                    <option>UK</option>
                    <option>Italy</option>
                  </select>
                </div>
                <div>
                  <!-- Address -->
                  <label for="checkout_address">ADDRESS*</label>
                  <input type="text" id="checkout_address" class="checkout_input" required="required" name="address">
                  
                </div>
                <div>
                  <!-- Zipcode -->
                  <label for="checkout_zipcode">TOWN/Zip*</label>
                  <input type="text" id="checkout_zipcode" class="checkout_input" required="required" name="city">
                </div>
                
                <div class="checkout_extra ">
                  <div>
                  <!-- Country -->
                  <label for="checkout_country">COUNTRY*</label>
                  <select name="optradio" id="checkout_country" class="dropdown_item_select checkout_input" require="required" name="country">
                    <option value="customer" >customer</option>
                    <option value="provider">provider</option>
                    
                  </select>
                </div>
                  
                  <button class="btn btn-info" type="submit" name="register"> Sign up </button>
                </div>
              </form>
            </div>
          </div>
        </div>



        <!-- Order Info -->






        

      </div>
    </div>
  </div>
</div>
  <?php include('includes/public_footer.php'); ?> 