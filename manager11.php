<?php
  echo("hey");
  session_start();
  $connection = mysqli_connect('localhost','root','','eabc');
  $book_name=$_POST['book_name'];
  $book_description=$_POST['book_description'];
  $book_author=$_POST['book_author'];
  $book_price=$_POST['book_price'];
  $book_quantity=$_POST['book_quantity'];
  $publish_date=$_POST['publish_date'];

  $query="INSERT INTO books (book_description,author,publish_date,book_price,book_name,book_quantity) VALUES('$book_description','$book_author','$publish_date','$book_price','$book_name','$book_name')";
  $results=mysqli_query($connection,$query);


?>
