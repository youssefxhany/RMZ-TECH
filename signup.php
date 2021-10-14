<?php

    $msg='';
    $msgClass='';
    if(isset($_POST['login_submit'])){
     $username = $_POST['username_login'];
     $password = $_POST['password_login'];

     $conn = mysqli_connect('localhost','root','','eabc');
     $query = " SELECT * FROM client WHERE username = '$username' ";
     $result = mysqli_query($conn,$query);

     echo mysqli_num_rows($result);
     if(mysqli_num_rows($result) == 0){
       $msg="please insert correct username   ";
       $msgClass='alert-danger';

     }
     else{
       session_start();
       $result_list = mysqli_fetch_assoc($result);
       $password_decrypted = md5($password);
       echo $password_decrypted;
       if($result_list['password']== $password_decrypted ){
       $_SESSION['username']=$result_list['username'];
       $_SESSION['email']=$result_list['email'];
       $_SESSION['password']=$result_list['password'];
       $_SESSION['gender']=$result_list['gender'];
       $_SESSION['firstName']=$result_list['firstName'];
       $_SESSION['lastName']=$result_list['lastName'];

       $_SESSION['temp'] = 1;
       header('Location: homepage.php');
     } else {
       $msg="please insert correct password  ";
       $msgClass='alert-danger';
     }
     }
    }

   if(filter_has_var(INPUT_POST,'submit')){

     $gender=$_POST['gender'];
     $username=$_POST['username'];
     $email=$_POST['email'];
     $password=$_POST['password'];
     $confirm_password=$_POST['confirm_password'];
     $firstName=$_POST['firstName'];
     $lastName=$_POST['lastName'];
     $phoneNumber = $_POST['phone_number'];
     $billingAddress = $_POST['Billing_address'];
     $favCategory = $_POST['favorite_category'];
     $birthDate = $_POST['birth_date'];

     if(!empty($username) && !empty($email) && !empty($password) && !empty($confirm_password) && !empty($firstName)  && !empty($lastName) && !empty($gender) && !empty($phoneNumber) && !empty($billingAddress) && !empty($favCategory) && !empty($birthDate)){
       if(filter_var($email,FILTER_VALIDATE_EMAIL) === false){
         $msg="please use a valid email";
         $msgclass="alert-danger";
       } else {
         if(strcmp($password,$confirm_password)!=0){
           $msg="please confirm your password";
           $msgclass="alert-danger";
         }else {
           $conn = mysqli_connect('localhost','root','','eabc');

           $gender=mysqli_real_escape_string($conn,$_POST['gender']);
           $username=mysqli_real_escape_string($conn,$_POST['username']);
           $email=mysqli_real_escape_string($conn,$_POST['email']);
           $password=mysqli_real_escape_string($conn,$_POST['password']);
           $confirm_password=mysqli_real_escape_string($conn,$_POST['confirm_password']);
           $firstName=mysqli_real_escape_string($conn,$_POST['firstName']);
           $lastName=mysqli_real_escape_string($conn,$_POST['lastName']);

           $check_username_query="SELECT * FROM client WHERE username='$username'";
           $check_email_query="SELECT * FROM client WHERE email='$email'";

           $username_result=mysqli_query($conn,$check_username_query) or die(mysqli_error($conn));
           $email_result=mysqli_query($conn,$check_email_query) or die(mysqli_error($conn));

           if(mysqli_connect_errno()){
             echo "failed to connect to mysql" .mysqli_connect_errno();
           } else if(mysqli_num_rows($username_result) > 0){
             $msg="username is already used";
             $msgClass="alert-danger";
           } else if(mysqli_num_rows($email_result) > 0){
             $msg="email is already used";
             $msgClass="alert-danger";
           } else{
             $encrypted_password = md5($password);
             $query = "INSERT INTO client(username,email,password,confirm_password,firstName,lastName,gender,phoneNumber,billingAddress,favoriteCategory,BirthDate) VALUES('$username','$email','$encrypted_password','$encrypted_password','$firstName','$lastName','$gender','$phoneNumber','$billingAddress','$favCategory','$birthDate')" ;

             if(mysqli_query($conn,$query)){

               session_start();

               $_SESSION['username']=$username;
               $_SESSION['email']=$email;
               $_SESSION['password']=$password;
               $_SESSION['gender']=$gender;
               $_SESSION['firstName']=$firstName;
               $_SESSION['lastName']=$lastName;

               $_SESSION['temp'] = 1;

               header('Location: login.php');

             } else {
               echo("Error description: " . $conn -> error);
               echo "bitch";
             }
           }
         }
       }
     } else {
       $msg='Please fill in all fields';
       $msgClass='alert-danger';
     }
   }
?>
<html>
<head>
  <title>EABC</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale-1">
  <script
      src="https://code.jquery.com/jquery-3.4.1.js"
      integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
      crossorigin="anonymous">
  </script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="signup_stylesheet.css">
  <style>
  @import url('https://fonts.googleapis.com/css?family=Source+Sans+Pro&display=swap');
  </style>
</head>
<body>
  <div id="particles-js"></div>
    <script type="text/javascript" src="particles.js"></script>
    <script type="text/javascript" src="app.js"></script>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>" id="sign_up_form" >
    <div class="container" >
      <div class="inner">
        <div class="title">
          <h3>Create your account</h3>
          </div>
          <div class="content">
            <div class="txt">
              <input type="text" value="<?php echo isset($_POST['username']) ? $username: '' ?>" name="username" id="txtuser" placeholder="Username">
              <span id="c1" class="glyphicon glyphicon-user"></span>
            </div>
            <div class="txt2">
              <input type="email" name="email" value="<?php echo isset($_POST['email']) ? $email:"" ?>" id="txtemail" placeholder="Email">
              <span id="c2" class="glyphicon glyphicon-envelope"></span>
            </div>
            <div class="txt2">
              <input type="password" name="password" id="txtpass" placeholder="password" value="<?php echo isset($_POST['password']) ? $password:'' ?>">
              <span id="c3" class="glyphicon glyphicon-lock"></span>
              <progress class="progress_bar" max="100" value="0" id="strength" data-label="strength" ></progress>
            </div>
            <div class="txt2">
              <input type="password" name="confirm_password" id="txtpass" value="<?php echo isset($_POST['confirm_password']) ? $confirm_password:'' ?>" placeholder="Confirm password">
              <span id="c4" class="glyphicon glyphicon-lock"></span>
            </div>
          </div>
          <div class="content2">
            <input type="text" name="firstName" value="<?php echo isset($_POST['firstName']) ? $firstName:'' ?>" id="txtFirstName" placeholder="First Name">
            <input type="text" name="lastName" value="<?php echo isset($_POST['lastName']) ? $lastName:'' ?>" id="txtLastName" placeholder="Last Name">
          </div>
          <div class="radios">
            <label for="">Gender:</label>
            <input type="radio" name="gender" value="male">
            <label for="">Male</label>
            <input type="radio" name="gender" value="female">
            <label for="">Female</label>
          </div>
          <div class="txt2">
            <input type="text" value="<?php echo isset($_POST['Phone number']) ? $phoneNumber: '' ?>" name="phone_number" id="Phone_num" placeholder="phone number">
            <input type="text" value="<?php echo isset($_POST['Billing address']) ? $billingAddress: '' ?>" name="Billing_address" id="billing_address" placeholder="Billing address">
            <input type="text" value="<?php echo isset($_POST['Favorite category']) ? $favCategory: '' ?>" name="favorite_category" id="fav_category" placeholder="Favorite category">
            <input type="text" value="<?php echo isset($_POST['Birth date']) ? $birthDate: '' ?>" name="birth_date" id="birth_date" placeholder="Birth date">
          </div>
          <div class="ckbox">
            <input type="checkbox" id="ckbox" name="ck1" value="">
            <span>I love Reading so Much</span>
          </div>
          <?php if($msg !=""):?>
             <div class="alert <?php echo $msgClass; ?>" role="alert"><?php echo $msg; ?></div>
           <?php endif; ?>
          <div class="btnsub">
            <input type="submit" name="submit" value="submit" id="submit_btn" onclick="return Validate();"/>
          </div>


      </div>
    </div>
  </form>

  <form   method="post" id="login_form" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
    <div class="container" >
      <div class="inner_login">
        <div class="title_login">
          <h3>Login to account</h3>
        </div>
        <div class="content">
          <div class="txt">
            <input type="text_login" value="" name="username_login"  placeholder="Username">
            <span id="c1" class="glyphicon glyphicon-user"></span>
          </div>
          <div class="txt1_login">
            <input type="password" name="password_login"  placeholder="password" value="">
            <span id="c3" class="glyphicon glyphicon-lock"></span>
          </div>
          <div class="btnsub_login">
            <input type="submit" name="login_submit" value="submit" id="Login_btn"/>
          </div>
          <?php if($msg !=""):?>
             <div class="alert <?php echo $msgClass; ?>" role="alert"><?php echo $msg; ?><input type='button' class="hide_btn" id="signup_btn" value='signup'/></div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </form>



  <script>
     $("document").ready(function(){
       $("#login_form").hide();
       $("#signup_btn").click(function(){
         $("#sign_up_form,#login_form").toggle();
       });
     });
  </script>

</body>

<script type="text/javascript">
     var pass= document.getElementById("txtpass")
     pass.addEventListener('keyup',function(){
       check_password(pass.value)
     })
     function check_password(password){
       var strengh_bar=document.getElementById("strength")
       var strength= 0
       if(password.match(/[a-zA-Z0-9][a-zA-Z0-9]+/)){
         strength +=1
       }
       if(password.match(/[~<>?]+/)){
         strength =+1

       }
       if(password.match(/[!@$%^&*()]+/)){
         strength +=1
       }
       if(password.length > 5){
         strength +=1
       }

       switch (strength) {
         case 0:
                 strengh_bar.value= 20;
                 break
        case 1:
                 strengh_bar.value= 40;
                 break
        case 2:
                strengh_bar.value= 60;
                break
        case 3:
                strengh_bar.value= 80;
                break
        case 4:
                strengh_bar.value= 100;
                break


       }
     }

</script>
<!--
<script>
function Validate() {
//	var email = document.getElementById('emailvar $email = $('form input[name="email');

var email = document.getElementById('txtemail').value; 	-
    alert(email);
  var emailReg = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);

   if(!emailReg.test(email))
           {
            alert("Not a valid email");
                          return false;
           }
  return true;
}
</script>
-->


</html>
