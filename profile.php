<!DOCTYPE html>
<?php
    session_start();
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


		$_SESSION['username'] = $username;
	  $_SESSION['email'] = $email;
		$_SESSION['password'] = $password;
		$_SESSION['firstName'] = $firstName;
		$_SESSION['lastName'] = $lastName;
		$_SESSION['gender'] = $gender;
	  $_SESSION['phone_number'] = $phoneNumber;
		$_SESSION['Billing_address'] = $billingAddress;
		$_SESSION['favorite_category'] = $favCategory;
		$_SESSION['birth_date'] = $birthDate;

 ?>

<html>
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device.width, initial -scale=1">
<link rel="stylesheet" type="text/css" href="styleProf.css">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<!--Bootsrap-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>

<style>
* {box-sizing: border-box}
body {font-family: "Lato", sans-serif;}

/* Style the tab */
.tab {
  float: left;
  border: 0.5% solid #ccc;
  background-color: #f1f1f1;
  width: 30%;
  height: 30%;
}

/* Style the buttons inside the tab */
.tab button {
  display: block;
  background-color: inherit;
  color: black;
  padding: 5% 4%;
  width: 100%;
  border: none;
  outline: none;
  text-align: left;
  cursor: pointer;
  transition: 0.3s;

}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current "tab button" class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  float: left;
  padding: 0% 4%;
  border: 1px solid #ccc;
  width: 70%;
  border-left: none;
  height: 30%;
}
</style>




</head>

<body>

<div id="particles-js"></div>
<script type="text/javascript" src="particles.js"></script>
<script type="text/javascript" src="app.js"></script>

<div class="con">



<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">EABC</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

   <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="main.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about_us.html">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact2.html">Contact</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="profile.php">Profile</a>
      </li>
    </ul>
  </div>
</nav>
</div>

<div class="bg-text3">
<h1><img src="7cc7a630624d20f7797cb4c8e93c09c1.png" alt="Avatar" class="avatar"></h1>

<h2><?php echo($username) ?></h2>

</div>

<div class="bg-text1">
<h3><span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span>
</h3>
</div>






<div class="bg-text2">

<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'Info')" id="defaultOpen">Info</button>
  <button class="tablinks" onclick="openCity(event, 'Paris')">Orders</button>
  <!--<button class="tablinks" onclick="openCity(event, 'Tokyo')">Offered Books</button>-->
</div>

<div id="Info" class="tabcontent">
  <h3>Email</h3>
  <p><?php echo($email) ?></p>
  <h3>Phone number</h3>
  <p><?php echo($phoneNumber) ?></p>
  <h3>Billing address</h3>
  <p><?php echo($billingAddress) ?></p>


	<div class="profile-user-buttons">
	  <button class="btn btn-danger btn-sm" onclick="location.href='updateProfile.php'" >Update</button>
	</div>
</div>

<div id="Paris" class="tabcontent">
  <h3>Orders</h3>
  <p><?php
             $conn = mysqli_connect('localhost','root','','eabc');
						 $query = "SELECT * FROM orders WHERE client_username='$username'";
						 $result = mysqli_query($conn,$query);
						 if(mysqli_num_rows($result) > 0){
							 /*$result_list = mysqli_fetch_assoc($result);
							 $n = mysqli_num_rows($result);*/
							 while($result_list = mysqli_fetch_assoc($result)){
								 $message = "order ID: " .$result_list['order_id']. " book_name: " .$result_list['book_name']. " order price: " .$result_list['order_price'] ."  delivery date: " .$result_list['delivery_date']. PHP_EOL ."  Order status: on its way";
								 echo($message);
								 echo("</p>\n");
							 }

						 }else {
							 echo("no orders");
						 }
	?></p>
</div>

<div id="Tokyo" class="tabcontent">
  <h3>Tokyo</h3>
  <p>Tokyo is the capital of Japan.</p>
</div>

</div>
<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
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
