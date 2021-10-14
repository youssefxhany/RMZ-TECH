<!doctype html>
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


  function function_alert($msg) {
     echo "<script>alert('$msg');</script>";
  }

  $connection = mysqli_connect('localhost','root','','eabc');
  if(isset($_POST['search_book_submit'])) {
    $searched_book = $_POST['search_book'];
    $query = " SELECT * FROM books WHERE book_name = '$searched_book' ";
    $result = mysqli_query($connection,$query);
    if(mysqli_num_rows($result) == 0){
      function_alert("Unfortunately the book you searching for is not available in our store");
    }else{
      $result_list = mysqli_fetch_assoc($result);


      $_SESSION['book_description'] = $result_list['book_description'];
      $_SESSION['author'] = $result_list['author'];
      $_SESSION['publish_date'] = $result_list['publish_date'];
      $_SESSION['Book_price'] = $result_list['Book_price'];
      $_SESSION['book_name'] = $result_list['book_name'];
      $_SESSION['book_quantity'] = $result_list['book_quantity'];
      $_SESSION['book_photo'] = $result_list['book_photo'];

      header('Location: view_book.php');
    }
  }

  if(isset($_POST['search_author_submit'])){
     $author_name_search = $_POST['search_author'];
     $query = "SELECT * FROM books WHERE author = '$author_name_search'";
     $result = mysqli_query($connection,$query);

     if(mysqli_num_rows($result)){
       $query = "SELECT COUNT(author) as author_count FROM books WHERE author = '$author_name_search'";
       $result = mysqli_query($connection,$query);
       $result_list = mysqli_fetch_assoc($result);
       $message = "author name: " .$author_name_search. "  number of books in store: " .$result_list['author_count'];
       function_alert($message);
     }else{
       function_alert("author books not avialable in store");
     }
  }

?>

<html>
<head>

		<title>EABC</title>



 <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700i" rel="stylesheet">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<style>
      body{
        background-color: gray ;
      }
        h1 { margin:150px auto 30px auto; text-align:center; color:#fff;}
        h2 { margin-bottom:-30px; margin-top: 0px; text-align:center; font-weight: bold;

  color: #aeadaf;
  -webkit-text-fill-color: #564A39; /* Will override color (regardless of order) */
  -webkit-text-stroke-width: 1px;
  -webkit-text-stroke-color: black;}
            .hi-slide { position: relative; width: 754px; height: 292px; margin: 20px auto 0; }

.hi-slide .hi-next,
.hi-slide .hi-prev
            { position: absolute;
              top: 50%;
              width: 40px;
              height: 40px;
              margin-top: -15px;
                border-radius: 50px;


              line-height: 40px;
              text-align: center;
              cursor: pointer;
              background-color: #fff;
              color: black;
              transition: all 0.6s;
              font-size: 20px;
                font-weight: bold;
            }
           .hi-slide .hi-next:hover,
            .hi-slide .hi-prev:hover
            {
            opacity: 1;
            background-color: #FF5722;
            }

           .hi-slide .hi-prev { left: -60px; }

    .hi-slide .hi-prev::before { content: '<'; }
    .hi-slide .hi-next { right: -60px; }
    .hi-slide .hi-next::before { content: '>'; }

            .hi-slide > ul
                    {
                        list-style: none;
                        position: relative;
                        width: 500px;
                        height: 200px;
                        margin: 0;
                        padding: 0;
            }


        .hi-slide > ul > li {
            overflow: hidden;
            position: absolute;
            z-index: 0;
            left: 377px;
            top: 146px;
            width: 0;
            height: 0;
            margin: 0;
            padding: 0;
            border: 3px solid #fff;
            background-color: #333;
            cursor: pointer; }

        .hi-slide > ul > li > img { width: 100%; height: 100%; background-position: center;}




        *{

          margin: 0;
          padding:0;
          box-sizing: border-box;

        }

        .container{

          width: 60%;
          margin: 50px auto;
          margin-left:280px;
        }

        .book{

          width: 48%;
          float: left;
          margin: 5px;
          padding: 10px;

        }

        .icon{

          width: 15%;
          float: left;
          margin-right:  100px;

        }

        button{

          background: #FF5722;
          border-radius: 7px;
          padding: 6px 6px;
          color: #fff;

          cursor: pointer;
        }

        .category{
           margin-bottom:-30px; margin-top: 0px; text-align:left; font-weight: bold;

           color: #aeadaf;
           -webkit-text-fill-color: black; /* Will override color (regardless of order) */
           -webkit-text-stroke-width: 1px;
           -webkit-text-stroke-color: black;
           font-size: 40px;
           margin-left: 310px;
        }

        .container .author{
           margin-bottom:-30px; margin-top: 0px; text-align:left; font-weight: bold;

           color: #aeadaf;
           -webkit-text-fill-color: black; /* Will override color (regardless of order) */
           -webkit-text-stroke-width: 1px;
           -webkit-text-stroke-color: black;
           font-size: 40px;
           margin-left: 10px;
           margin-bottom: 10px;
        }

        footer{
        	background-color: #AEADAF;
        }

		</style>




	</head>
	<body>


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
		        <a class="nav-link " href="profile.php">Profile</a>
		      </li>
          <li class="nav-item" >
		        <form method="post" class="nav-link ">
              <label>Search Book</label>
              <input type="text" name="search_book">
              <input type="submit" name="search_book_submit">
            </form>
		      </li>
          <li class="nav-item" >
		        <form method="post" class="nav-link ">
              <label>Search Author</label>
              <input type="text" name="search_author">
              <input type="submit" name="search_author_submit">
            </form>
		      </li>
		    </ul>
				<form class="form-inline my-2 my-lg-0">
		    <ul class="navbar-nav mr-auto">
		      <li class="nav-item">
		        <a class="nav-link " href="landingpage.html">Log Out</a>
		      </li>
		    </ul>
		    </form>
		  </div>
		</nav>

<img src="Screenshot (35).png"/>

 <br><br>
    <h2>Welcome <?php echo $username ?> to our book store</h2>
    <br><br>
		<div class="Recommended hi-slide">
      <h2>Recommended for you</h2>
		  <div class="hi-prev "></div>
			<div class="hi-next "></div>
			<ul>
				<li>
				<img src="51up+zegGBL._SL500_.jpg" alt="Img 1" /></li>
				<li><img src="123.jpg" alt="Img 2"  /></a></li>
				<li><a href="book.html"><img src="download (5).jpg" alt="Img 3" width="100%" height="100%" /></a></li>
				<li><img src="download (6).jpg" alt="Img 4" /></li>
				<li><img src="download (7).jpg" alt="Img 5" /></li>
				<li><img src="download (8).jpg" alt="Img 6" /></li>
				<li><img src="download (9).jpg" alt="Img 7" /></li>
                <li><img src="123.jpg" alt="Img 7" /></li>
			</ul>
		</div>

		<div class="Trending hi-slide">
      <h2>Trending Now</h2>
      <div class="hi-prev "></div>
      <div class="hi-next "></div>
      <ul>
        <li>
        <img src="6E3E2015621F24DDC2A94F614AF468CD195766E3.jpg" alt="Img 1" /></li>
        <li><img src="41dd3tjpdUL._SL200_.jpg" alt="Img 2" /></li>
        <li><img src="51SkeNklAZL._SL200_.jpg" alt="Img 3" /></li>
        <li><img src="91LkYuZFZRL.jpg" alt="Img 4" /></li>
        <li><img src="602d56ac8eccf0474c50859b33f406e221c5ba6d.jpg" alt="Img 5" /></li>
        <li><img src="14446ac64705eb26004d8bb7285a6a4094ff8a1c.jpg" alt="Img 6" /></li>
        <li><img src="DA4BE956BE20E6507E26FF1DEF2B4AC9CB572D88.jpg" alt="Img 7" /></li>
                <li><img src="93802FDFEC69076C063A84BAE494FDC74C2C47FF.jpg" alt="Img 7" /></li>
      </ul>
    </div>

    <div class="Historical hi-slide">
      <h2>Historical Books</h2>
      <div class="hi-prev "></div>
      <div class="hi-next "></div>
      <ul>
        <li>
        <img src="519HKX9M69L._SL200_.jpg" alt="Img 1" /></li>
        <li><img src="51qcAhimiVL._SL200_.jpg" alt="Img 2" /></li>
        <li><img src="51TMOKNiZCL._SL200_.jpg" alt="Img 3" /></li>
        <li><img src="51XFKp6q0-L._SL200_.jpg" alt="Img 4" /></li>
        <li><img src="51ZQqp9g80L._SL200_.jpg" alt="Img 5" /></li>
        <li><img src="61YCasIvf9L._SL200_.jpg" alt="Img 6" /></li>
        <li><img src="51yGqjPjXXL._SL200_.jpg" alt="Img 7" /></li>
                <li><img src="602d56ac8eccf0474c50859b33f406e221c5ba6d.jpg" alt="Img 7" /></li>
      </ul>
    </div>

    <div class="Thriller hi-slide">
      <h2>Thriller Books</h2>
      <div class="hi-prev "></div>
      <div class="hi-next "></div>
      <ul>
        <li>
        <img src="1.jpg" alt="Img 1" /></li>
        <li><img src="2.jpg" alt="Img 2" /></li>
        <li><img src="3.jpg" alt="Img 3" /></li>
        <li><img src="4.jpg" alt="Img 4" /></li>
        <li><img src="5.jpg" alt="Img 5" /></li>
        <li><img src="6.jpg" alt="Img 6" /></li>
        <li><img src="7.jpg" alt="Img 7" /></li>
                <li><img src="8.jpg" alt="Img 7" /></li>
      </ul>
    </div>

    <div class="Action hi-slide">
      <h2>Action Books</h2>
      <div class="hi-prev "></div>
      <div class="hi-next "></div>
      <ul>
        <li>
        <img src="11.jpg" alt="Img 1" /></li>
        <li><img src="22.jpg" alt="Img 2" /></li>
        <li><img src="33.jpg" alt="Img 3" /></li>
        <li><img src="44.jpg" alt="Img 4" /></li>
        <li><img src="55.jpg" alt="Img 5" /></li>
        <li><img src="66.jpg" alt="Img 6" /></li>
        <li><img src="77.jpg" alt="Img 7" /></li>
                <li><img src="88.jpg" alt="Img 7" /></li>
      </ul>
    </div>

    <div class="Drama hi-slide">
      <h2>Drama Books</h2>
      <div class="hi-prev "></div>
      <div class="hi-next "></div>
      <ul>
        <li>
         <img src="111.jpg" alt="Img 1" /></li>
        <li><img src="222.jpg" alt="Img 2" /></li>
        <li><img src="333.jpg" alt="Img 3" /></li>
        <li><img src="444.jpg" alt="Img 4" /></li>
        <li><img src="555.jpg" alt="Img 5" /></li>
        <li><img src="666.jpg" alt="Img 6" /></li>
        <li><img src="777.jpg" alt="Img 7" /></li>
                <li><img src="888.jpg" alt="Img 7" /></li>
      </ul>
    </div>

<div class="category">
<p>SHOP BY CATEGORY</p>
</div>
<div class="container">

    <div class="book">

      <div class="icon">
        <img src="rsz_download_9.jpg" alt=""/>
      </div>

      <div class="content">
        <h3>HISTORY</h3>
        <p>About the book</p>
        <p>Details about this book</p>
        <span>More text about it</span>
        <button>Buy it</button>
      </div>

    </div>


    <div class="book">

      <div class="icon">
        <img src="rsz_251oqzbybuql_sl500_.jpg" alt=""/>
      </div>

      <div class="content">
        <h3>TEEN </h3>
        <p>About the book</p>
        <p>Details about this book</p>
        <span>More text about it</span>
        <button>Buy it</button>
      </div>

    </div>


    <div class="book">

      <div class="icon">
        <img src="rsz_cc32f38ef813db061dc122562f359e831e0b380d.jpg" alt=""/>
      </div>

      <div class="content">
        <h3>SPIRITUALITY</h3>
        <p>About the book</p>
        <p>Details about this book</p>
        <span>More text about it</span>
        <button>Buy it</button>
      </div>

    </div>


    <div class="book">

      <div class="icon">
        <img src="rsz_3cdc3a13b32070ee1080e54adb68ce8d.jpg" alt=""/>
      </div>

      <div class="content">
        <h3>CHILDREN'S </h3>
        <p>About the book</p>
        <p>Details about this book</p>
        <span>More text about it</span>
        <button>Buy it</button>
      </div>

    </div>

    <div class="book">

      <div class="icon">
        <img src="rsz_51-017ozwzl_sl500_.jpg" alt=""/>
      </div>

      <div class="content">
        <h3>ROMANCE</h3>
        <p>About the book</p>
        <p>Details about this book</p>
        <span>More text about it</span>
        <button>Buy it</button>
      </div>

    </div>

    <div class="book">

      <div class="icon">
        <img src="rsz_151tmqln70ll_sl500_.jpg" alt=""/>
      </div>

      <div class="content">
        <h3>SCIENCE </h3>
        <p>About the book</p>
        <p>Details about this book</p>
        <span>More text about it</span>
        <button>Buy it</button>
      </div>

    </div>

</div>




<div class="container">

    <div class="author">
    <p>SHOP BY Author</p>
    </div>

    <div class="book">

      <div class="icon">
        <img src="rsz_unnamed_1.jpg" alt=""/>
      </div>

      <div class="content">
        <h3>Morad</h3>
        <p>About the author</p>
        <p>Details about this author</p>
        <span>More text about it</span>
        <button>get his signature</button>
      </div>

    </div>

    <div class="book">

      <div class="icon">
        <img src="rsz_download_10.jpg" alt=""/>
      </div>

      <div class="content">
        <h3>Taha Hussein</h3>
        <p>About the author</p>
        <p>Details about this author</p>
        <span>More text about it</span>
        <button>get his signature</button>
      </div>

    </div>

</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
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


	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
		<script type="text/javascript" src="js/jquery.hislide.js" ></script>
		<script>
			$('.Recommended').hiSlide();
		</script>
    <script>
      $('.Trending').hiSlide();
    </script>
    <script>
      $('.Historical').hiSlide();
    </script>
    <script>
      $('.Thriller').hiSlide();
    </script>
    <script>
      $('.Action').hiSlide();
    </script>
    <script>
      $('.Drama').hiSlide();
    </script>
	</body>

</html>
