<?php
  //session_start();
  require('connectdb.php');
  $Email = "";
?>

<?php
  include("header.php");
?>

                  

  <?php
  require('connectdb.php');
  $id = 0;

  $sql = "SELECT * FROM articles ORDER BY Writer_ID DESC LIMIT 1";
  $result1 = mysqli_query($cnctdb, $sql);
  $row = mysqli_fetch_row($result1);
  $last_id = $row[2];
  if(isset($_GET["id"])){
    $id=$_GET["id"];
    $sql = "SELECT * FROM articles WHERE Writer_ID = '$id'";
    $result1 = mysqli_query($cnctdb, $sql);
    $row = mysqli_fetch_row($result1);
    $cur_viewers = $row[6]+1;
    $sql  = "UPDATE articles SET Viewers='$cur_viewers'
                              WHERE Writer_ID = '$id'";
    $rs = mysqli_query($cnctdb, $sql);
  }else{
    $id = $last_id;
  }
  ?>

                  <?php
                  $user_name = "";
                  if(isset($_POST["submit1"])){
                          if(isset($_GET["id"])){
                            $id=$_GET["id"];
                          }
                          if(isset($_GET["Email"])){
                            $Email =  $_GET["Email"];
                          }
                          $sql = "SELECT * FROM blog_registration WHERE email = '$Email'";
                          $result = mysqli_query($cnctdb, $sql);
                          $row1 = mysqli_fetch_row($result);
                          $user_name = $row1[0];
                          $user_id = $row1[3];
                          $comment = $_POST["comment"];
                          $comment =mysql_real_escape_string( $comment);
                          $comment_date = "".date("Y/m/d")." ".date("h:i:sa");

                          echo $user_name." ".$user_id." ".$id." ".$comment." ".$comment_date;

                          $sql =  "INSERT INTO comments_article(user_name,user_id,article_id,comment,comment_date) VALUES('$user_name',
                                  '$user_id','$id','$comment','$comment_date')";
                          $result1 = mysqli_query($cnctdb, $sql);
                          if(!$result1){
                            print_r($cnctdb->error);
                          }else{
                            header("Location: Editorial_Home.php?Email=".$Email."&id=".$id);
                          }
                    }

                    ?>

<div>

  <div class="editorial_home_test">
  <?php
        if(isset($_SESSION['email'])){
          $Email = $_SESSION['email'];
    ?>
      <div class="editorial_top_test block center">
          <a style="color:#000033;" href="logout.php" class="btn btn-info" role="button">Log Out <?php echo $Email ?> </a>
          <a style="color:#000033;" href="Write_post.php" class="btn btn-info" role="button">Write New Post</a>
      </div>
      <?php }else{ ?>

      <div class="editorial_top_test block center">
          <a style="color:#000033;width:130px;" href="logintest.php" class="btn btn-info" role="button">Log In</a>
          <a style="color:#000033;width:130px;" href="Register_Here.php" class="btn btn-info" role="button">Register</a>
      </div>
        <?php } ?>
    <div class="editorial_left_test">
          <h2>Editorial List</h2>
          <div class="container">
                <div class="list-group" style="width:440px;">
                  <?php
                    $cnt = 1;
                    while (true){
                          if($cnt == 15 || $last_id == 0) break;
                          $sql = "SELECT * FROM articles WHERE Writer_ID = $last_id";
                          $result5 = mysqli_query($cnctdb, $sql);
                          $total = mysqli_num_rows($result5);
                          if($result5 && $total!=0){
                            $row1 = mysqli_fetch_row($result5);
                            

                  ?>
                      <a href="Editorial_Home.php?id=<?php echo "".$row1[2]; ?>&Email=<?php echo $Email ?>" class="list-group-item" style="height:160px;width:430px;float:left;"> <h3><?php $res = "".$row1[0]."\n"; echo $res; ?> </h3> <b><?php $res = "".$row1[1]."\n - "; echo $res; ?> </b> <?php $res = "".$row1[5]."\n"; echo $res; ?> </a>
                    <?php
                          $cnt++;
                        }
                        $last_id--;
                    }
                    ?>
                </div>
          </div>
    </div>
    <div class="editorial_right_test">
          <div class="editorial_writing_test">
            <div class= "writing_header_test">
              <h1><?php $res = "".$row[0]."\n"; echo $res; ?> </h1>
              <h3><?php $res = "".$row[1]." - ".$row[5]; echo $res; ?> </h3>
            </div>

            <div class= "writing_document_test">
              <pre>
                <?php $res = "".$row[4]."\n"; echo $res; ?>
              </pre>
            </div>
          </div>

            <div class="editorial_comment_test">
              <h2>Comments</h2>
              <?php
                  require('connectdb.php');
                  //echo "Current ID: ".$id;
                  $sql = "SELECT * FROM comments_article WHERE article_id = $id";
                  $result7 = mysqli_query($cnctdb, $sql);
                  $cnt = 0;
                  while($row2 = mysqli_fetch_row($result7)){
                    if(!$row2) continue;
                    //$cnt = $cnt + 1;
                    ?>
                        <div class="single_comment">
                            <h5><?php $res = "".$row2[0]." - ".$row2[5]; echo $res; ?> </h5>
                            <pre>
                                <?php $res = "".$row2[3]."\n"; echo $res; ?>
                          </pre>
                        </div>

                    <?php }
                    echo "\n\n\n";

                     if(isset($_SESSION['email'])){
                          $Email = $_SESSION['email'];
                    ?>

                    <div class="container">
                      <div class="row">
                        <div class="col-lg-4">
                           <form role="form" method="POST" action="Editorial_Home.php?id=<?php echo $id; ?>&Email=<?php echo $Email; ?>">
                          <div class="form-group" style="width:800px;float:left;text-align:left;">
                            <label for="comment">Comment:</label>
                            <input type="text" class="form-control" name="comment" id="comment" placeholder="Enter Your Comment">
                          </div>
                          <button type="submit" class="btn btn-default" name="submit1" id="submit1" value="submit1" style="float:left;text-align:center;">Enter</button>
                        </form>
                        </div>
                      </div>
                    </div>

                    <?php }

                    ?>
            </div>
    </div>

  </div>

  
</div>

<?php
  include("footer.php");
  ?>