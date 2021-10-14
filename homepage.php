<?php
  session_start();

  $username=$_SESSION['username'];
  $email=$_SESSION['email'];
  $password=$_SESSION['password'];
  $firstName=$_SESSION['firstName'];
  $lastName=$_SESSION['lastName'];
  $gender=$_SESSION['gender'];


?>
<html>
<head>
  <title>Gelfi</title>
  <meta charset="utf-8">
  <meta name="vuewport" content="width=device-width, initial-scale-1">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <link rel="stylesheet" type="text/css" href="homepage_style.css">
  <link rel="stylesheet" href="homepage_sidebar.css">

  <style>
   @import url('https://fonts.googleapis.com/css?family=Black+Han+Sans|UnifrakturCook:700&display=swap');
  </style>

  <style type="text/css">

		     body  {
			    background: linear-gradient(132deg,#ec5218,#1665c1);
				background-size: 400% 400%;
				animation: BackgroundGradient 30s ease infinite;
			 }

			 @keyframes BackgroundGradient
			 {
			   0% {background-position: 0% 50%}
			   50% {background-position:100% 50%}
			   100% {background-position: 0% 50%}
			 }

		</style>

</head>
<body>
 <div class="wrapper">
     <div class="sidebar-wrapper">
       <ul class="sidebar-nav">
         <li><a href="#">Bio</a></li>
         <li><a href="#">Settings</a></li>
         <li><a href="#">Logout</a></li>
       </ul>
     </div>
     <div class="page-content-wrapper">
       <div class="joe">
         <a href="#" class="btnbtn-success" id="menu-toggle">Toggle Menu</a>
       </div>
     <h1>GELFI</h1>
     <p>Welcome <?php echo $username; ?> to your Gelfi account </p>
     <div class="media">
        <ul>
          <li><a><i class="fa fa-calendar-check-o" aria-hidden="true"></i></a></li>
          <li><a><i class="fa fa-glide-g" aria-hidden="true"></i></a></li>
          <li><a><i class="fa fa-picture-o" aria-hidden="true"></i></a></li>
         <li><a><i class="fa fa-telegram" aria-hidden="true"></i></a></li>
         <li><a><i class="fa fa-newspaper-o" aria-hidden="true"></i></a></li>
       </ul>
     </div>
  </div>
</div>

   <script>
      $("#menu-toggle").click( function(e){
        e.preventDefault();
        $("#wrapper").toggleClass("menuDisplayed");
      });
   </script>
</body>
</html>
