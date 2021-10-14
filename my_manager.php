<!DOCTYPE html>
<?php
      session_start();

      $book_description = $_SESSION['book_description'] ;
      $author = $_SESSION['author'];
      $publish_date = $_SESSION['publish_date'] ;
      $book_price = $_SESSION['Book_price'] ;
      $book_name = $_SESSION['book_name'];
      $book_quantity = $_SESSION['book_quantity'] ;
      $book_photo = $_SESSION['book_photo'];


      $username=$_SESSION['username'];
      $email=$_SESSION['email'];
      $password=$_SESSION['password'];
      $firstName=$_SESSION['firstName'];
      $lastName=$_SESSION['lastName'];
      $gender=$_SESSION['gender'];
      $phoneNumber = $_SESSION['phone_number'];
      $billingAddress = $_SESSION['Billing_address'];
      $favCategory = $_SESSION['favorite_category'];
      $birthDate = $_SESSION['birth_date'];


      $order_quantity = $_POST['order_quantity'];
      $order_price = $order_quantity * $book_price;
      $order_delivery_date = date("Y-m-d H:i:s") ;
      $order_delivery_date = date('Y-m-d H:i:s',strtotime($order_delivery_date. ' + 10 days'));
      $client_city = $_POST['city'];
      $client_street = $_POST['street'];


      $connection = mysqli_connect('localhost','root','','eabc');

      $query = "SELECT book_id FROM books where book_name = '$book_name'";
      $result = mysqli_query($connection,$query);
      $result = mysqli_fetch_assoc($result);
      $book_id = $result['book_id'];
      $book_quantity = $result['book_quantity'];

      $query = "SELECT client_id FROM client where username = '$username'";
      $result = mysqli_query($connection,$query);
      $result = mysqli_fetch_assoc($result);
      $client_id = $result['client_id'];
      $client_payment_method = $_POST['payment_method'];

      function function_alert($msg) {
         echo "<script>alert('$msg');</script>";
      }

      if(isset($_POST['Confirm_order_submit'])) {
        echo("entered");
        echo($book_quantity);
        if($book_quantity >= $order_quantity){

        $query = " INSERT INTO orders(order_price,delivery_date,book_quantity,book_name,book_id,client_billing_address,client_id,client_username,client_street,client_city,client_payment_method) VALUES('$order_price','$order_delivery_date','$order_quantity','$book_name','$book_id','$billingAddress','$client_id','$username','$client_street','$client_city','$client_payment_method')";
        $result = mysqli_query($connection,$query);

        $query = " SELECT * FROM books WHERE book_name = ''$book_name' ";
        $result = mysqli_query($connection,$query);
        $result_list = mysqli_fetch_assoc($result);
        $new_book_quantity = $result_list['book_quantity'] - $order_quantity;

        $query = "UPDATE books SET book_quantity = '$new_book_quantity' WHERE book_name = '$book_name' ";
        $result = mysqli_query($connection,$query);

      } else {
          function_alert("Unfortunately the quantity you want is not available in our store right now");
      }
    }

 ?>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="style4.css"/>
</head>
<body>


  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
  .alert {
    padding: 20px;
    background-color: #f44336;
    color: white;
  }

  .closebtn {
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
  }

  .closebtn:hover {
    color: black;
  }

  #myDIV {
  width: 100%;
  padding: 50px 0;
  text-align: center;
  background-color: lightblue;
  margin-top: 20px;
  visibility: hidden;
  }

  </style>


	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<nav class="navbar navbar-expand-lg navbar-light bg-light">

  <a class="navbar-brand" href="#">EABC</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about_us.html">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact2.html">Contact</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="profile.html">Profile</a>
      </li>
    </ul>
  </div>
      </li>

    </ul>
  </div>
</nav>
<div class="xx">
			<h1>
	| BOOK DESCRIPTION

</h1>
	</div>
<div class="vv">
<h1 style="margin-left: 35%;
margin-top: 1-%;
color: black;"><?php echo $book_name ?></h1>
<div class="kk9">
		<p1><?php echo $book_description ?> </p1>
	</div>
	<div class="all">
	<div class="k1">
		BOOK AUTHOR : <?php echo $author ?> <br>
		GENRE : ACTION<br>
		PRICE FOR BUYING : <?php echo $book_price ?><br>
    Quantity available: <?php echo $book_quantity ?><br>
    publication_date: <?php echo $publish_date ?><br>
		<br>
	</div>
		<div class="k2">
<input type="radio" id="buy" name="gender" value="buy">
<label for="buy" style="color: blue; font-weight: bold;font-size: 25px;">BUY</label><br>



	  </div>

	   <div class="k3">
        <button onclick="myFunction()" type="submit" name="add-to-cart" value="8692" class="single_add_to_cart_button"  >ADD TO CART</button>
      </div>


<img src="cd95e0e5-3ec2-473a-942f-03f382d75f2e.jpg" id="img1">
</div>

</div>
</div>

<div id="myDIV">
  <form   method="post" id="login_form" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;

   </span>
      <div class="container" >
        <div class="inner_login">
          <div class="title_login">
            <h3>Delivery details</h3>
          </div>
          <div class="content">
            <div class="txt">
                <p>Order quantity</p>
                <input  type="number"  name="order_quantity" class="input-text qty text" step="1" min="1" max="59"  value="1" title="Qty" size="4" placeholder="book quantity" inputmode="numeric" />
                <span id="c1" class="glyphicon glyphicon-user"></span>
            </div>
            <div class="txt">
              <input type="text" value="" name="street"  placeholder="Street">
              <span id="c1" class="glyphicon glyphicon-user"></span>
            </div>
            <div class="txt1_login">
              <input type="text" name="city"  placeholder="City" value="">
              <span id="c3" class="glyphicon glyphicon-lock"></span>
            </div>


            <p>Please select your payment method:</p>
    <input type="radio" id="Cash" name="payment_method" value="Cash">
    <label for="Cash">Cash</label><br>
    <input type="radio" id="Credit card" name="payment_method" value="Credit_card">
    <label for="Credit card">Credit card</label><br>
    <div class="txt1_login">
      <input type="text" name="credit_card_number"  placeholder="Credit number" value="">
      <span id="c3" class="glyphicon glyphicon-lock"></span>
      <input type="password" name="credit_card_password"  placeholder="Credit pass" value="">
      <span id="c3" class="glyphicon glyphicon-lock"></span>
    </div>

    <br></br>

            <div class="btnsub_login">
              <input type="submit" name="Confirm_order_submit" value="Confirm order" id="Login_btn"/>
            </div>


          </div>
        </div>
      </div>
    </form>
</div>

<script>
function myFunction() {
  var x = document.getElementById("myDIV");
  if (window.getComputedStyle(x).visibility === "hidden") {
    x.style.visibility = "visible";
  }
}
</script>

</body>


<footer class="page-footer font-small blue pt-4">

  <!-- Footer Links -->
  <div class="container-fluid text-center text-md-left">

    <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-md-6 mt-md-0 mt-3">

        <!-- Content -->
        <h3 class="text-uppercase">EABC</h3>

      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none pb-3">

      <!-- Grid column -->
      <div class="col-md-3 mb-md-0 mb-3">

        <!-- Links -->
        <h5 class="text-uppercase">About Us</h5>

        <ul class="list-unstyled">
          <li>
            <a href="#!">History</a>
          </li>
          <li>
            <a href="#!">Blog</a>
          </li>
          <li>
            <a href="#!">Careers</a>
          </li>
          <li>
            <a href="#!">Values</a>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-3 mb-md-0 mb-3">

        <!-- Links -->
        <h5 class="text-uppercase">Our Services</h5>

        <ul class="list-unstyled">
          <li>
            <a href="#!">Rent</a>
          </li>
          <li>
            <a href="#!">Book Library</a>
          </li>
          <li>
            <a href="#!">Book Campus</a>
          </li>

        </ul>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2020 Copyright:
    <a href="#"> ShababHandasa</a>
  </div>
  <!-- Copyright -->

</footer>


</html>
