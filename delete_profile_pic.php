<?php
echo "string";
if(isset($_POST['delete_pic'])){
  session_start();
  $username = $_SESSION['username'];
  $conn = mysqli_connect('localhost','root','','gelfi');
  $filename = "profilePicsUploads/" . $username . "*";
  $real_filename = glob($filename);
  $filename_ext = explode(".",$real_filename[0]);
  $ext=end($filename_ext);
  $full_real_name = "profilePicsUploads/" .$username. ".". $ext;

  if(!unlink($full_real_name)){
    $query = "UPDATE userinfo SET profilePictureStatus ='0',profilePictureName='' WHERE username = '$username' ";
    mysqli_query($conn,$query);
    header('Location:infoGelfawy.php?deleteSuccess');
  } else {
    header("Location:infoGelfawy.php?deleteFailure");
  }
}
?>
