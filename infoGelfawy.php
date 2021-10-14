<?php
  session_start();
  $username = $_SESSION['username'];
  $temp = $_SESSION['temp'];
  if($temp === 1){
  $conn = mysqli_connect('localhost','root','','gelfi');
  $query = "INSERT INTO userinfo(userinfo.username) VALUES('$username')";
  mysqli_query($conn,$query);
  }
 ?>
<html>
<head>
  <title>Gelfi</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale-1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="infoGelfawy.css">
  <style type="text/css">

		     body  {
			    background: linear-gradient(132deg,#ff4757,#57606f);
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

  <div class="profile-card">
    <div class="image-container">
      <?php
          $conn = mysqli_connect('localhost','root','','gelfi');
          $query = "SELECT userinfo.profilePictureStatus FROM userinfo WHERE username = '$username' ";
          $result = mysqli_query($conn,$query);
          $result_list = mysqli_fetch_assoc($result);
          if($result_list['profilePictureStatus'] == 0)
             echo "<img  class='profile-pic' src='profilePicsUploads/default_profile_img.png' style='width:100%''>";
          else {
              $query = "SELECT userinfo.profilePictureName FROM userinfo WHERE username = '$username' ";
              $result = mysqli_query($conn,$query);
              $result_list = mysqli_fetch_assoc($result);
              $name = 'profilePicsUploads/' . $result_list ['profilePictureName'] ;
              echo "<img  class='profile-pic' src='". $name."' style='width:100%'>";
            }
        ?>

      <div class ="title">
        <h2><?php echo $username;?></h2>
    </div>
    <div class="main-container">
      <form method="post" action="uploadProfilePicture.php" enctype="multipart/form-data">
      <i class="fa fa-film info" ></i> <input class="txt" type="text" name="favoriteMovie" placeholder="your favorite movie"><br>
      <i class="fa fa-music info" ></i> <input class="txt" type="text" name="favoriteSong" placeholder="your favorite song"><br>
      <i class="fa fa-quote-right info" ></i> <input class="txt" type="text" name="favoriteQuote" placeholder="your favorite quote"><br>
      <i class="fa fa-graduation-cap info" ></i></i> <input class="txt" type="text" name="userSchool" placeholder="your high school">
      <hr>
      <p><b><i class="fa fa-asterisk info" >Skills</i></b></p>
      <p>Adobe photoshop</p>
      <div class="skill-bar">
        <div class="progress-bar " style="width:80%;">80%
        </div>
      </div>
      <input type="file" name="file">
      <button type="submit" name="submit">submit pic</button>
    </form>
      <form action = "delete_profile_pic.php" method="post" >
          <button type="submit" name="delete_pic" >Delete Pic</button>
      </form>
    </div>
  </div>
</body>
</html>
