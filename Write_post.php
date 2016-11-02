<?php
  include("header.php");
?>


<div class="container" style=
  "padding:5px;
  border: 5px solid;
  background-color:#E6EBF0;
  text-align:center;
  border-color: #F8F8FC;">
  <h2 style="color:#00005C;">Write Your New Post Here!</h2>
</div>
</br>
<div class="container">
  <form role="form" method="GET" action="Write_post.php">
    <div class="form-group">
      <label for="comment">Headline:</label>
      <input type="text" class="form-control" name="Headline" id="Headline" placeholder="Enter Headline">
    </div>
    <div class="form-group">
      <label for="comment">Topic:</label>
      <input type="text" class="form-control" name="Topic" id="Topic" placeholder="Enter Topic Name">
    </div>
    <div class="form-group">
      <label for="email">Your Email:</label>
      <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email">
    </div>
    <div class="form-group">
      <label for="comment">Your Post:</label>
      <textarea class="form-control" name="query" id="query" placeholder="Write Your Post" rows="25"></textarea>
    </div>
    <button type="submit" class="btn btn-default" name="post1" style="text-align:center;">POST</button>
  </form>
</div>

                  <?php
                    require('connectdb.php');
                    if(isset($_GET["post1"])){
                          $Email = $_GET["email"];
                          $Section = $_GET["Topic"];
                          $Title = $_GET["Headline"];
                          $Writing =mysql_real_escape_string( $_GET["query"]);

                          $sql = "SELECT * FROM blog_registration WHERE email='$Email'";
                          $result = mysqli_query($cnctdb, $sql);
                          $row1 = mysqli_fetch_row($result);
                          $Writer = $row1[0];
                          $published_date = "".date("Y/m/d");

                          $sql =  "INSERT INTO articles (Title,Writer,Section,Writing,published_date) VALUES('$Title','$Writer','$Section',
                            '$Writing','$published_date')";
                          $result1 = mysqli_query($cnctdb, $sql);
                          //header("Location: Editorial_Home.php?Email=".$Email);
                          if(!$result1){
                           print_r($cnctdb->error);
                          }else{
                            
                          }
                    }
                  ?>

<?php
  include("footer.php");
?>
