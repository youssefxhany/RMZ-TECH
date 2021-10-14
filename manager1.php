
<!doctype html>
<?php

$connect = mysqli_connect('localhost','root','','eabc');


if(isset($_POST['view_sales'])){

  $query = "SELECT SUM(order_price) as sales_sum FROM orders";
  $results = mysqli_query($connect,$query);
  $result_list = mysqli_fetch_assoc($results);
  $sum = $result_list['sales_sum'];

  function function_alert2($msg) {
     echo "<script>alert('$msg');</script>";
  }

  function_alert2("Sales of " .$sum ." Where made" );

}

?>


<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">



  </head>
  <body>





<nav class="navbar navbar-expand-lg navbar-light bg-light">

  <a class="navbar-brand" href="#">EABC</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item">
        <a class="nav-link" href="about_us.html">About Us</a>
      </li>

      <li class="nav-item">
        <a class="nav-link " href="contact2.html">Contact</a>
      </li>
    </ul>

  </div>
</nav>




<!--<div id = "particles-js"> </div>
<script type="text/javascript" src="particles.js"></script>
<script type="text/javascript" src="app.js"></script>-->
<div class="bg-text1">
	<p2>EABC</p2><br>



</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<div class="forms">

</div>
<div class="forms">

<form class="forms" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <h3>Add book</h3>
<label for="book_name">Book name:</label><br>
<input type="text" id="book_name" name="book_name"><br>

<label for="book_description">Book description:</label><br>
<input type="text" id="book_description" name="book_description"><br>

<label for="book_author">Book author:</label><br>
<input type="text" id="book_author" name="book_author"><br>

<label for="book_price">Book Price:</label><br>
<input type="number" id="book_price" name="book_price"><br>

<label for="book_quantity">Book quantity:</label><br>
<input type="number" id="book_quantity" name="book_quantity"><br>

<label for="publish_date">Publish date:</label><br>
<input type="text" id="publish_date" name="publish_date"><br>
<input type="submit" value="Add" name="Add_book_submit"><br>
</form>

<form class="forms" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <h3>Modify book</h3>
  <label for="book_name">Book name:</label><br>
  <input type="text" id="book_name" name="book_name"><br>

  <label for="book_description">Book description:</label><br>
  <input type="text" id="book_description" name="book_description"><br>

  <label for="book_author">Book quantity:</label><br>
  <input type="text" id="book_author" name="book_quantity"><br>

  <label for="book_price">Book Price:</label><br>
  <input type="number" id="book_price" name="book_price"><br>
  <input type="submit" value="Modify" name="Modify_book"><br>
  <br><br><br><br><br>
</form>
<form class="forms" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <h3>Delete book</h3>
<label for="book_name">Book name:</label><br>
<input type="text" id="book_name" name="book_name"><br>
<input type="submit" value="Delete" name="delete_book"><br>
<br><br><br><br><br><br><br><br>
</form>
<form class="forms" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <h3>Delete client</h3>
  <label for="client_username">client username:</label><br>
  <input type="text" id="client_name" name="client_username"><br>


  <input type="submit" value="Delete" name="delete_client"><br>
  <br><br><br><br><br><br><br><br>
</form>

<form class="forms" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<h3>View Sales</h3>
<!--<label for="book_name">Book name:</label><br>
<input type="text" id="book_name" name="book_name"><br>-->
<input type="submit" value="Sales" name="view_sales"><br>
<br><br><br><br><br><br><br><br>
</form>

<form class="forms" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<h3>Search book by name</h3>
<label for="book_name">Book name:</label><br>
<input type="text" id="book_name" name="book_name_search">
<input type="submit" value="Search" name="search_book"><br>
<br><br><br><br><br><br><br><br>
</form>

<form class="forms" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<h3>Search author</h3>
<label for="book_name">Author name:</label><br>
<input type="text" id="book_name" name="author_name_search">
<input type="submit" value="Search" name="search_author"><br>
<br><br><br><br><br><br><br><br>
</form>

<form class="forms" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<h3>Search client</h3>
<label for="client_name">Client name:</label><br>
<input type="text" id="book_name" name="client_name_search">
<input type="submit" value="Search" name="search_client"><br>
<br><br><br><br><br><br><br><br>
</form>

<!--<div id="myDIV">
  <p>my love</p>
</div>-->

</div>

</div>
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


<?php

  session_start();
  $connection = mysqli_connect('localhost','root','','eabc');

  if(isset($_POST['Add_book_submit'])){
  $book_name= $_POST['book_name'];
  $book_description= $_POST['book_description'];
  $book_author= $_POST['book_author'];
  $book_price= $_POST['book_price'];
  $book_quantity= $_POST['book_quantity'];
  $publish_date= $_POST['publish_date'];

  $query="INSERT INTO books (book_description,author,publish_date,book_price,book_name,book_quantity) VALUES('$book_description','$book_author','$publish_date','$book_price','$book_name','$book_quantity')";
  $results=mysqli_query($connection,$query);
  }

  function function_alert($msg) {
     echo "<script>alert('$msg');</script>";
  }

  if(isset($_POST['Modify_book'])){
    $book_name= $_POST['book_name'];
    $book_description= $_POST['book_description'];
    $book_quantity= $_POST['book_quantity'];
    $book_price= $_POST['book_price'];

    $query = "SELECT * FROM books WHERE book_name='$book_name'";
    $results = mysqli_query($connection,$query);

    if(mysqli_num_rows($results) > 0){

    if(!empty($book_description)){
      $query = "UPDATE books SET book_description='$book_description' WHERE book_name='$book_name'";
      $results = mysqli_query($connection,$query);
    }

    if(!empty($book_quantity)){
      $query = "UPDATE books SET book_quantity='$book_quantity' WHERE book_name='$book_name'";
      $results = mysqli_query($connection,$query);
    }

    if(!empty($book_price)){
      $query = "UPDATE books SET book_price='$book_price' WHERE book_name='$book_name'";
      $results = mysqli_query($connection,$query);
    }

  } else {
    function_alert("This book in not available in our store");
  }

  }

  if(isset($_POST['delete_book'])){
    $book_name= $_POST['book_name'];
    $query = "SELECT * FROM books WHERE book_name='$book_name'";
    $results = mysqli_query($connection,$query);
    echo(mysqli_num_rows($results));
    if(mysqli_num_rows($results) > 0){
       $query = "DELETE FROM books WHERE book_name='$book_name'";
       $results = mysqli_query($connection,$query);
    } else {
       function_alert("This book in not available in our store");
    }
  }

  if(isset($_POST['delete_client'])){
     $username = $_POST['client_username'];
     $query = "SELECT * FROM client WHERE username='$username'";
     $results = mysqli_query($connection,$query);
     echo(mysqli_num_rows($results));
     if(mysqli_num_rows($results) > 0){
       $query = "DELETE FROM client WHERE username='$username'";
       $results = mysqli_query($connection,$query);
     }else {
       function_alert("client username  not available in our system");
     }
  }

  if(isset($_POST['search_book'])){
    $book_name = $_POST['book_name_search'];
    $query = "SELECT * FROM books WHERE book_name='$book_name'";
    $result = mysqli_query($connection,$query);
    if(mysqli_num_rows($result) > 0){
       $result_list = mysqli_fetch_assoc($result);
       $message = "book name: " .$result_list['book_name']. "   quantity: " .$result_list['book_quantity']. "    book price: " .$result_list['Book_price'] . "     book author: " .$result_list['author'];
       function_alert($message);
     }else {
       function_alert("Book not avialable in store");
     }
  }

  if(isset($_POST['search_author'])){
     $author_name_search = $_POST['author_name_search'];
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

  if(isset($_POST['search_client'])){
    $search_client_name = $_POST['client_name_search'];
    $query = "SELECT * FROM client WHERE username='$search_client_name'";
    $result = mysqli_query($connection,$query);

    if(mysqli_num_rows($result) > 0){
      $query = "SELECT COUNT(order_price) as count_order FROM orders WHERE client_username='$search_client_name'";
      $result = mysqli_query($connection,$query);
      $result_list = mysqli_fetch_assoc($result);
      $num_of_orders = $result_list['count_order'];

      $query = "SELECT SUM(order_price) as sum_order FROM orders WHERE client_username='$search_client_name'";
      $result = mysqli_query($connection,$query);
      $result_list = mysqli_fetch_assoc($result);
      $sum_of_orders = $result_list['sum_order'];

      $message = "client name: " .$search_client_name. "   number of orders: " .$num_of_orders. "   total prices of orders: " .$sum_of_orders;
      function_alert($message);
    }else {
      function_alert("client not member in store");
    }
  }
?>

<script>
function myFunction() {
  var x = document.getElementById("myDIV");
  if (window.getComputedStyle(x).visibility === "hidden") {
    x.style.visibility = "visible";
  }
}
</script>
