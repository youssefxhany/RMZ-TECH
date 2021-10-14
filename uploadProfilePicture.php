<?php
  if(isset($_POST['submit'])){
    session_start();
    $username = $_SESSION['username'];

    $file = $_FILES['file'];

    $file_name = $_FILES['file']['name'];
    $file_temp_location = $_FILES['file']['tmp_name'];
    $file_type = $_FILES['file']['type'];
    $file_error = $_FILES['file']['error'];
    $file_size = $_FILES['file']['size'];

    $accepted_ext = array('jpg','jpeg','png','pdf');

    $get_file_ext = explode('.',$file_name);
    $file_real_ext = strtolower(end($get_file_ext));

    $file_saved_name = $username .'.'. $file_real_ext;

    if(in_array($file_real_ext,$accepted_ext)){
      if($file_error === 0){
        if($file_size < 1000000){
          $file_destination = 'profilePicsUploads/' . $file_saved_name;
          move_uploaded_file($file_temp_location,$file_destination);
          $conn = mysqli_connect('localhost','root','','gelfi');
          $query = "UPDATE userinfo SET userinfo.profilePictureName = '$file_saved_name' ,userinfo.profilePictureStatus = '1' WHERE username ='$username' ";
          mysqli_query($conn,$query);
          $_SESSION['temp'] = 0;
          header('Location: infoGelfawy.php ?success');
        } else {
          echo "file size is too big";
        }
      } else {
        echo "an error occured please try again";
      }
    } else {
      echo "file of this extention could not be loaded";
    }
  }
 ?>
