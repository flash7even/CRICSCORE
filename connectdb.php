
<?php
$host = "localhost";
  $username = "root";
  $password = "helloworld";
  $cnctdb = mysqli_connect($host,$username,$password);

  if(!$cnctdb){
    die("Could not connect to Database" . mysqli_error());
  }

  $existDatabase = mysqli_select_db($cnctdb,"cricscoredb");
?>