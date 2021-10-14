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

  $connection = mysqli_connect('localhost','root','','eabc');

	function function_alert($msg) {
     echo "<script>alert('$msg');</script>";
  }

	if(isset($_POST['update_username'])){
		$old_username = $_POST['username_old'];
		$new_username = $_POST['username_new'];
		if($username == $old_username){
			$query = "UPDATE client SET username='$new_username' WHERE username='$old_username'";
			$result = mysqli_query($connection,$query);
			$username = $new_username;
		}else{
			function_alert("incorrect old username");
		}
	}

	if(isset($_POST['update_password'])){
		$old_password = $_POST['password_old'];
		$new_password = $_POST['password_new'];
		$new_password_encrypted = md5($new_password);
		$old_password_encrypted = md5($old_password);
		echo($old_password_decrypted);
		if($old_password_encrypted == $password){
			echo("entered");
			$query = "UPDATE client SET password='$new_password_encrypted'  WHERE password='$password'";
			$result = mysqli_query($connection,$query);
		}else{
			echo("entered2");
			function_alert("incorrect old password");
		}
	}

	if(isset($_POST['update_address'])){
		$new_address = $_POST['address_new'];
	  $query = "UPDATE client SET billingAddress='$new_address' WHERE username='$username'";
		$result = mysqli_query($connection,$query);
	}

 ?>

<html>
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device.width, initial -scale=1">
<link rel="stylesheet" type="text/css" href="style_Update.css">

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
  <a class="navbar-brand" href="#">PICKABOO-k</a>
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

<h4><?php echo($username) ?></h4>

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
  <button class="tablinks" onclick="openCity(event, 'Info')" id="defaultOpen">Username</button>
  <button class="tablinks" onclick="openCity(event, 'Paris')">Password</button>
  <button class="tablinks" onclick="openCity(event, 'Tokyo')">Address details</button>
</div>


<form   method="post" id="login_form" action="<?php echo $_SERVER['PHP_SELF']; ?>" >

  <div id="Info" class="tabcontent">

    <div class="content">

      <div class="txt">
        <input type="text_login" value="" name="username_old"  placeholder="Old username">
        <span id="c1" class="glyphicon glyphicon-user"></span>
      </div>

      <div class="txt1_login">
        <input type="text_login" name="username_new"  placeholder="New username" value="">
        <span id="c3" class="glyphicon glyphicon-user"></span>
      </div>

    	<div class="profile-user-buttons">
    	  <button class="btn btn-danger btn-sm" name="update_username" >Update</button>
    	</div>

    </div>
  </div>


  <div id="Paris" class="tabcontent">

    <div class="content">

      <div class="txt">
        <input type="password" value="" name="password_old"  placeholder="Old password">
        <span id="c1" class="glyphicon glyphicon-lock"></span>
      </div>

      <div class="txt1_login">
        <input type="password" name="password_new"  placeholder="New password" value="">
        <span id="c3" class="glyphicon glyphicon-lock"></span>
      </div>

      <div class="profile-user-buttons">
        <button class="btn btn-danger btn-sm" name="update_password">Update</button>
      </div>

    </div>

  </div>

  <div id="Tokyo" class="tabcontent">

     <div class="content">

        <div class="txt1_login">
          <input type="text_login" name="address_new"  placeholder="New address" value="">
          <span id="c3" class="glyphicon glyphicon-pushpin"></span>
        </div>

    <div class="profile-user-buttons">
      <button class="btn btn-danger btn-sm" name="update_address">Update</button>
    </div>

  </div>

</div>


  </div>
</form>

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


</html>
