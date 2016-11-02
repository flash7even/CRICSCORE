<?php
  include("header.php");
  require('connectdb.php');
    $poll_id = 1;
    if(isset($_GET["poll_id"])){
      $poll_id = $_GET["poll_id"];
    }
    $sql = "SELECT * FROM poll WHERE poll_id = '$poll_id'";
    $result = mysqli_query($cnctdb, $sql);
    $row = mysqli_fetch_row($result);

    $a = fopen("database_info.txt", "w");
    fwrite($a, $row[0].",");
    fwrite($a, $row[2].",");
    fwrite($a, $row[3].",");
    fwrite($a, $row[4].",");
    fwrite($a, $row[5].",");
    fwrite($a, $row[6].",");
    fwrite($a, $row[7].",");
    fwrite($a, $row[8].",");
    fwrite($a, $row[9]);
    fclose($a);
    if(isset($_GET["poll_id"])){
      header("Location: poll_result.php?");
    }
    
?>
      <div>
        <div class = "homepic">

          <div class = "homepic_left">
              <div  style="text-align:center"  class="homepic_item">
                      <div id="myCarousel" class="carousel slide" data-ride="carousel">
                          <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                            <li data-target="#myCarousel" data-slide-to="3"></li>
                          </ol>

                          <div class="carousel-inner" role="listbox">

                            <div class="item active">
                              <img class="img-responsive center-block" src="img/mix1.jpg" alt="Baghdad Premium" style="width:850px;height:590px">
                              <div class="carousel-caption">
                                  <h3><span style="color:#FFFFFF">SA lost,but still played their best they could</span></h3>
                              </div>
                            </div>

                            <div class="item">
                              <img class="img-responsive center-block" src="img/mix2.jpg" alt="TR Travel" style="width:850px;height:590px">
                              <div class="carousel-caption">
                                  <h3><span style="color:#FFFFFF">Bangladesh,the new rising team of the world</span></h3>
                              </div>
                            </div>
                          
                            <div class="item">
                              <img class="img-responsive center-block" src="img/mix3.jpg" alt="Shohag Premium" style="width:850px;height:590px">
                              <div class="carousel-caption">
                                  <h3><span style="color:#FFFFFF">Melbourne ready for Australia Newzealand final</span></h3>
                              </div>
                            </div>

                            <div class="item">
                              <img class="img-responsive center-block" src="img/mix4.jpg" alt="Soudia Scania" style="width:850px;height:590px">
                              <div class="carousel-caption">
                                  <h3><span style="color:#FFFFFF">Micheal clarking following Ricky Ponting</span></h3>
                              </div>
                            </div>
                        
                          </div>

                          <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                          </a>
                          <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                          </a>
                      </div>
              </div>
          </div>

          <div class="homepic_score">

              <div class="live_score">
                  <h3>Live Scores and Recent Results</h3>

                  <div class="fixture_list">
                      <?php
                      require('connectdb.php');
                      $stt = "RUNNING";
                      $found = 0;
                      $sql = "SELECT * FROM match_history WHERE match_status = '$stt' ORDER BY match_id DESC";
                      $result = mysqli_query($cnctdb, $sql);
                      $total_match = mysqli_num_rows($result);
                      if($total_match == 0){

                      ?>
                        <div class="single_list_fixture">
                          <h3>No Match Is Running Currently!</h3>
                        </div>

                      <?php
                      }else{
                            $cnt1 = 0;
                            while($cnt1<2){
                            $cnt1++;
                            $row1 = mysqli_fetch_row($result);
                            $msg1 = $row1[1]." ".$row1[9]."/".$row1[11]."(".$row1[13].")";
                            $msg2 = $row1[2]." ".$row1[10]."/".$row1[12]."(".$row1[14].")";
                            $msg3 = " at ".$row1[6]." - ".$row1[5]." at ".$row1[20];
                          ?>
                              <div class="single_list_fixture" style="background-color:#E0E0FF;">
                                <a href="Scorecard.php?id=<?php echo $row1[0]; ?>" class="list-group-item-success">
                                  <h4 class="list-group-item-heading"><?php echo $msg1." - ".$msg2; ?></h4>
                                  <h6><a href="Scorecard.php?id=<?php echo $row1[0]; ?>">SCORECARD</a></h6>
                                </a>
                              </div>

                            <?php 
                                }
                              ?>
                      <?php
                       }
                      ?>
                      
                      <?php
                      require('connectdb.php');
                      $stt = "END";
                      $found = 0;
                      $sql = "SELECT * FROM match_history WHERE match_status = '$stt' ORDER BY match_id DESC";
                      $result = mysqli_query($cnctdb, $sql);
                      $total_match = mysqli_num_rows($result);
                      $cnt1 = 0;
                      while($cnt1<2){
                          $cnt1++;
                          $row1 = mysqli_fetch_row($result);
                          $msg1 = $row1[1]." ".$row1[9]."/".$row1[11]."(".$row1[13].")";
                          $msg2 = $row1[2]." ".$row1[10]."/".$row1[12]."(".$row1[14].")";
                          $msg4 = " at ".$row1[6]." - ".$row1[5]." at ".$row1[20];
                          $msg3 = $row1[3]." won by ".$row1[22];
                      ?>
                              <div class="single_list_fixture">
                                <a href="Scorecard.php?id=<?php echo $row1[0]; ?>" class="list-group-item-success">
                                  <h4 class="list-group-item-heading"><?php echo $msg1." - ".$msg2; ?></h4>
                                  <h5 class="list-group-item-heading"><?php echo $msg3 ?></h5>
                                  <h6 class="list-group-item-heading"><?php echo $msg4 ?></h6>
                                </a>
                              </div>
                      <?php 
                          }
                      ?>
                  </div>
              </div>

            <div class="live_fixture">
                  <h3>Fixtures</h3>
                  <div class="fixture_list">
                      <?php
                      require('connectdb.php');
                      $stt = "FIXTURED";
                      $found = 0;
                      $sql = "SELECT * FROM match_history WHERE match_status = '$stt' ORDER BY match_id DESC";
                      $result = mysqli_query($cnctdb, $sql);
                      $total_match = mysqli_num_rows($result);
                      $cnt1 = 0;
                      while($cnt1<4){
                          $cnt1++;
                          $row1 = mysqli_fetch_row($result);
                          $msg1 = $row1[1]." vs ".$row1[2];
                          $msg2 = " at ".$row1[6]." - ".$row1[5]." will start at ".$row1[20];
                      ?>
                              <div class="single_list_fixture">
                                <a href="Fixture.php?" class="list-group-item-success">
                                  <h4 class="list-group-item-heading"><?php echo $msg1; ?></h4>
                                  <h5 class="list-group-item-heading"><?php echo $msg2; ?></h5>
                                </a>
                              </div>
                      <?php 
                          }
                      ?>
                  </div>
              </div>

          </div>

        </div>

          <?php
                require('connectdb.php');
                
                $sql = "SELECT * FROM articles ORDER BY Writer_ID DESC LIMIT 1";
                $result1 = mysqli_query($cnctdb, $sql);
                $row = mysqli_fetch_row($result1);
                $last_id = $row[2];
                 
          ?>

        <div class="focus">
          <div class="news">
            <h3>News Section</h3>
            <div class="">
                <div class="list-group" style="width:430px;">
                <?php
                      $cnt = 1;
                      $cur_id  = $last_id;
                      while (true){
                            $cricscore = "cricscore";
                            if($cnt == 6 || $cur_id == 0) break;
                            $sql = "SELECT * FROM articles WHERE Writer_ID = '$cur_id' AND Writer = '$cricscore'";
                            $result5 = mysqli_query($cnctdb, $sql);
                            $total = mysqli_num_rows($result5);
                            if($result5 && $total!=0){
                              $row1 = mysqli_fetch_row($result5);
                              if($row1[1]!=$cricscore) continue;
                              

                ?>
                    <a href="Editorial_Home.php?id=<?php echo "".$row1[2]; ?>" target="blank" class="list-group-item" style="background-color:#E3E3F4;height:180px;width:420px;float:left;"> <h3><?php $res = "".$row1[0]."\n"; echo $res; ?> </h3> <b><?php $res = "".$row1[1]."\n - "; echo $res; ?> </b> <?php $res = "".$row1[5]."\n"; echo $res; ?> </a>
                  <?php
                        $cnt++;
                      }
                      $cur_id--;
                  }
                  ?>
                </div>
              </div>
          </div>
          <div class="editorials">
              <h3>Editorials</h3>
              <div class="">
                <div class="list-group" style="width:440px;">

                    <?php
                      $cnt = 1;
                      $cur_id  = $last_id;
                      $cricscore = "cricscore";
                      while (true){
                            if($cnt == 6 || $cur_id == 0) break;
                            $sql = "SELECT * FROM articles WHERE Writer_ID = $cur_id";
                            $result5 = mysqli_query($cnctdb, $sql);
                            $total = mysqli_num_rows($result5);
                            if($result5 && $total!=0){
                              $row1 = mysqli_fetch_row($result5);
                              if($row1[1] == $cricscore) continue;
                              

                    ?>
                    <a href="Editorial_Home.php?id=<?php echo "".$row1[2]; ?>" target="blank" class="list-group-item" style="background-color:#E3E3F4;height:180px;width:430px;float:left;"> <h3><?php $res = "".$row1[0]."\n"; echo $res; ?> </h3> <b><?php $res = "".$row1[1]."\n - "; echo $res; ?> </b> <?php $res = "".$row1[5]."\n"; echo $res; ?> </a>
                    <?php
                        $cnt++;
                      }
                      $cur_id--;
                    }
                    ?>
                </div>
              </div>
          </div>
          <div class="mostly_viewed">
            <h3>Mostly Viewed News</h3>
            <div class="">
                <div class="list-group" style="width:400px;">
                    <?php
                      $cnt = 1;
                      $sql = "SELECT * FROM articles ORDER BY Viewers DESC LIMIT 5";
                      $result5 = mysqli_query($cnctdb, $sql);
                      while ($row1 = mysqli_fetch_row($result5)){
                            if($cnt == 6) break;
                    ?>
                    <a href="Editorial_Home.php?id=<?php echo "".$row1[2]; ?>" target="blank" class="list-group-item" style="background-color:#E3E3F4;height:180px;width:390px;float:left;"> <h3><?php $res = "".$row1[0]."\n"; echo $res; ?> </h3> <b><?php $res = "".$row1[1]."\n - "; echo $res; ?> </b> <?php $res = "".$row1[5]."\n"; echo $res; ?> </a>
                    <?php
                        $cnt++;
                      }
                    ?>
                    
                </div>
            </div>
          </div>
        </div>

        <div class="entertainment">
          <div class="photo">

            <div style="border:5px;padding:5px;">
                <h2 style="color:#00005C;">Around The World</h2>
            </div>
            
              <div  style="text-align:center;width=650px; height=420px;"  class="photo1">
                      

                      <div>
                              <iframe width="630px" height="420px" src="https://www.youtube.com/embed/igOHLunpMcM" frameborder="0" allowfullscreen></iframe>
                      </div>
              </div>

              <div  style="text-align:center"  class="photo1">
                      <div id="myCarousel" class="carousel slide" data-ride="carousel">
                          <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                            <li data-target="#myCarousel" data-slide-to="3"></li>
                          </ol>

                          <div class="carousel-inner" role="listbox">

                            <div class="item active">
                              <img class="img-responsive center-block" src="img/sa1.jpg" alt="Baghdad Premium" style="width:635px;height:390px">
                              <div class="carousel-caption">
                              </div>
                            </div>

                            <div class="item">
                              <img class="img-responsive center-block" src="img/sa2.jpg" alt="TR Travel" style="width:635px;height:390px">
                              <div class="carousel-caption">
                              </div>
                            </div>
                          
                            <div class="item">
                              <img class="img-responsive center-block" src="img/sa3.jpg" alt="Shohag Premium" style="width:635px;height:390px">
                              <div class="carousel-caption">
                              </div>
                            </div>

                            <div class="item">
                              <img class="img-responsive center-block" src="img/sa4.jpg" alt="Soudia Scania" style="width:635px;height:390px">
                              <div class="carousel-caption">
                              </div>
                            </div>
                        
                          </div>

                          <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                          </a>
                          <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                          </a>
                      </div>
              </div>

              <div  style="text-align:center"  class="photo1">
                      <div id="myCarousel" class="carousel slide" data-ride="carousel">
                          <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                            <li data-target="#myCarousel" data-slide-to="3"></li>
                          </ol>

                          <div class="carousel-inner" role="listbox">

                            <div class="item active">
                              <img class="img-responsive center-block" src="img/nzl1.jpg" alt="Baghdad Premium" style="width:635px;height:390px">
                              <div class="carousel-caption">
                              </div>
                            </div>

                            <div class="item">
                              <img class="img-responsive center-block" src="img/nzl2.jpg" alt="TR Travel" style="width:635px;height:390px">
                              <div class="carousel-caption">
                              </div>
                            </div>
                          
                            <div class="item">
                              <img class="img-responsive center-block" src="img/nzl3.jpg" alt="Shohag Premium" style="width:635px;height:390px">
                              <div class="carousel-caption">
                              </div>
                            </div>

                            <div class="item">
                              <img class="img-responsive center-block" src="img/nzl4.jpg" alt="Soudia Scania" style="width:635px;height:390px">
                              <div class="carousel-caption">
                              </div>
                            </div>
                        
                          </div>

                          <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                          </a>
                          <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                          </a>
                      </div>
              </div>
              
          </div>

          <div class="social">
            
            <div class="poll">
                <h2 style="color:#000014;"><a name = "poll">POLL</a></h2>
                
                <?php
                      require('connectdb.php');
                      $sql = "SELECT * FROM poll ORDER BY poll_id DESC LIMIT 1";
                      $result = mysqli_query($cnctdb, $sql);
                      $row1 = mysqli_fetch_row($result);
                      $last_poll_id = $row1[1];
                      $cnt1 = $last_poll_id;
                      $poll_title = $row1[0];
                      ?>
                          <h3 style="color:#00005C;"><?php echo $poll_title; ?></h3>
                          <form role="form"  method="POST" action="cricket_live_score.php?poll_id=<?php echo $cnt1; ?>">
                              <div class="radio">
                                <label><input type="radio" name="option" value="<?php echo $row1[2]; ?>"><?php echo $row1[2]; ?></label>
                              </div>
                              <div class="radio">
                                <label><input type="radio" name="option" value="<?php echo $row1[3]; ?>"><?php echo $row1[3]; ?></label>
                              </div>
                              <div class="radio">
                                <label><input type="radio" name="option" value="<?php echo $row1[4]; ?>"><?php echo $row1[4]; ?></label>
                              </div>
                              <div class="radio">
                                <label><input type="radio" name="option" value="<?php echo $row1[5]; ?>"><?php echo $row1[5]; ?></label>
                              </div>
                              <button type="submit" name="submit_answer1" class="btn btn-default" style="text-align:center;">Submit Your Answer</button>
                              <button type="submit" name="see_result1" class="btn btn-default" style="text-align:center;">See Result</button>
                          </form>

              <?php 
                  if(isset($_POST["submit_answer1"])){
                    require('connectdb.php');
                    $poll_id=$_GET["poll_id"];
                    $submitted_ans = $_POST["option"];
                    //echo " You have clicked ".$submitted_ans." for poll: ".$poll_id." ";
                    $scoreA = $row1[6];
                    $scoreB = $row1[7];
                    $scoreC = $row1[8];
                    $scoreD = $row1[9];
                    if($row1[2] == $submitted_ans) $scoreA++;
                    if($row1[3] == $submitted_ans) $scoreB++;
                    if($row1[4] == $submitted_ans) $scoreC++;
                    if($row1[5] == $submitted_ans) $scoreD++;


                    $sql  = "UPDATE poll SET scoreA='$scoreA' , scoreB='$scoreB' , scoreC='$scoreC' , scoreD='$scoreD'
                              WHERE poll_id = '$poll_id'";
                    $result = mysqli_query($cnctdb, $sql);
                  }
                ?>
                          </br>

                  <?php
                      $cnt1 = $cnt1 - 1;
                      $sql = "SELECT * FROM poll WHERE poll_id = '$cnt1'";
                      $result = mysqli_query($cnctdb, $sql);
                      $row1 = mysqli_fetch_row($result);
                      $poll_title = $row1[0];
                      ?>
                          <h3 style="color:#00005C;"><?php echo $poll_title; ?></h3>
                          <form role="form"  method="POST" action="cricket_live_score.php?poll_id=<?php echo $cnt1; ?>">
                              <div class="radio">
                                <label><input type="radio" name="option" value="<?php echo $row1[2]; ?>"><?php echo $row1[2]; ?></label>
                              </div>
                              <div class="radio">
                                <label><input type="radio" name="option" value="<?php echo $row1[3]; ?>"><?php echo $row1[3]; ?></label>
                              </div>
                              <div class="radio">
                                <label><input type="radio" name="option" value="<?php echo $row1[4]; ?>"><?php echo $row1[4]; ?></label>
                              </div>
                              <div class="radio">
                                <label><input type="radio" name="option" value="<?php echo $row1[5]; ?>"><?php echo $row1[5]; ?></label>
                              </div>
                              <button type="submit" name="submit_answer2" class="btn btn-default" style="text-align:center;">Submit Your Answer</button>
                              <button type="submit" name="see_result2" class="btn btn-default" style="text-align:center;">See Result</button>
                          </form>

              <?php 
                  if(isset($_POST["submit_answer2"])){
                    require('connectdb.php');
                    $poll_id=$_GET["poll_id"];
                    $submitted_ans = $_POST["option"];
                    //echo " You have clicked ".$submitted_ans." for poll: ".$poll_id." ";
                    $scoreA = $row1[6];
                    $scoreB = $row1[7];
                    $scoreC = $row1[8];
                    $scoreD = $row1[9];
                    if($row1[2] == $submitted_ans) $scoreA++;
                    if($row1[3] == $submitted_ans) $scoreB++;
                    if($row1[4] == $submitted_ans) $scoreC++;
                    if($row1[5] == $submitted_ans) $scoreD++;

                    $sql  = "UPDATE poll SET scoreA='$scoreA' , scoreB='$scoreB' , scoreC='$scoreC' , scoreD='$scoreD'
                              WHERE poll_id = '$poll_id'";
                    $result = mysqli_query($cnctdb, $sql);
                  }
                ?>

                       

            </div>
            <br><br><br><br><br><br>
            <div class="facebook" >
              <h3 class="first_innings_bat" style="background-color:#EBEBF8;">Updates from Facebook</h3>
              <div style="overflow-y: scroll;height:240px;">
              <ul>
                  <li style="font-size:18px;">Glenn Maxwell : <a style="color:#3D007A;" href="https://www.facebook.com/GlennMaxwellCricket?fref=ts">A massive thanks to the SCG trust for...</a></li>
                  <li style="font-size:18px;">Shane Watson : <a style="color:#3D007A;" href="https://www.facebook.com/shanewatsoncricket?fref=ts">Final training session done and semi-final...</a></li>
                  <li style="font-size:18px;">Sachin Tendulkar : <a style="color:#3D007A;" href="https://www.facebook.com/SachinTendulkar?fref=ts">Well played in the World Cup Team India...</a></li>
                  <li style="font-size:18px;">ChrisGayle : <a style="color:#3D007A;" href="https://www.facebook.com/GAYLE333?fref=ts">One day to lift the cup!Whom you are supporting...</a></li>
                  <li style="font-size:18px;">Mushfiqur Rahim : <a style="color:#3D007A;" href="https://www.facebook.com/MushfiqurOfficial?fref=ts">Returned to Bogra after a long time...</a></li>
                  <li style="font-size:18px;">Shane Watson : <a style="color:#3D007A;" href="https://www.facebook.com/shanewatsoncricket?fref=ts">Final training session done and semi-final...</a></li>
                  <li style="font-size:18px;">Sachin Tendulkar : <a style="color:#3D007A;" href="https://www.facebook.com/SachinTendulkar?fref=ts">Well played in the World Cup Team India...</a></li>
                  <li style="font-size:18px;">ChrisGayle : <a style="color:#3D007A;" href="https://www.facebook.com/GAYLE333?fref=ts">One day to lift the cup!Whom you are supporting...</a></li>
                  <li style="font-size:18px;">Mushfiqur Rahim : <a style="color:#3D007A;" href="https://www.facebook.com/MushfiqurOfficial?fref=ts">Returned to Bogra after a long time...</a></li>
                  <li style="font-size:18px;">Sachin Tendulkar : <a style="color:#3D007A;" href="https://www.facebook.com/SachinTendulkar?fref=ts">Well played in the World Cup Team India...</a></li>
                  <li style="font-size:18px;">ChrisGayle : <a style="color:#3D007A;" href="https://www.facebook.com/GAYLE333?fref=ts">One day to lift the cup!Whom you are supporting...</a></li>
                  <li style="font-size:18px;">Mushfiqur Rahim : <a style="color:#3D007A;" href="https://www.facebook.com/MushfiqurOfficial?fref=ts">Returned to Bogra after a long time...</a></li>
                  <li style="font-size:18px;">ChrisGayle : <a style="color:#3D007A;" href="https://www.facebook.com/GAYLE333?fref=ts">One day to lift the cup!Whom you are supporting...</a></li>
                  <li style="font-size:18px;">Mushfiqur Rahim : <a style="color:#3D007A;" href="https://www.facebook.com/MushfiqurOfficial?fref=ts">Returned to Bogra after a long time...</a></li>
                  <li style="font-size:18px;">Sachin Tendulkar : <a style="color:#3D007A;" href="https://www.facebook.com/SachinTendulkar?fref=ts">Well played in the World Cup Team India...</a></li>
                  <li style="font-size:18px;">ChrisGayle : <a style="color:#3D007A;" href="https://www.facebook.com/GAYLE333?fref=ts">One day to lift the cup!Whom you are supporting...</a></li>
                  <li style="font-size:18px;">Mushfiqur Rahim : <a style="color:#3D007A;" href="https://www.facebook.com/MushfiqurOfficial?fref=ts">Returned to Bogra after a long time...</a></li>
              </ul>
              </div>
              
            </div>
            <div class="twitter">
              <h3 class="first_innings_bat" style="background-color:#EBEBF8;">Twitter Tweets</h3>
              <div style="overflow-y: scroll;height:240px;">
              <ul>
                  <li style="font-size:18px;">Saqlain Mustal : <a style="color:#3D007A;" href="https://twitter.com/Saqlain_Mushtaq/status/581844037361115136">Wishing @zaynmalik all the best for the...</a></li>
                  <li style="font-size:18px;">K O'Brein : <a style="color:#3D007A;" href="https://twitter.com/TheMasters/status/581857952971255808">9 days until the Masters #cominginapril...</a></li>
                  <li style="font-size:18px;">Jonty Rohdes : <a style="color:#3D007A;" href="https://twitter.com/JontyRhodes8/status/581833940924661760">Who will provide the fireworks tomorrow...</a></li>
                  <li style="font-size:18px;">Stuart Broad : <a style="color:#3D007A;" href="https://twitter.com/StuartBroad8/status/581073238173884416">And welcome back Ottis Gibson. My new ball...</a></li>
                  <li style="font-size:18px;">Andrew Flintoff : <a style="color:#3D007A;" href="https://twitter.com/flintoff11/status/581824857295466497">Just dropped off a load of gear including...</a></li>
                  <li style="font-size:18px;">Jonty Rohdes : <a style="color:#3D007A;" href="https://twitter.com/JontyRhodes8/status/581833940924661760">Who will provide the fireworks tomorrow...</a></li>
                  <li style="font-size:18px;">Stuart Broad : <a style="color:#3D007A;" href="https://twitter.com/StuartBroad8/status/581073238173884416">And welcome back Ottis Gibson. My new ball...</a></li>
                  <li style="font-size:18px;">Andrew Flintoff : <a style="color:#3D007A;" href="https://twitter.com/flintoff11/status/581824857295466497">Just dropped off a load of gear including...</a></li>
                  <li style="font-size:18px;">Jonty Rohdes : <a style="color:#3D007A;" href="https://twitter.com/JontyRhodes8/status/581833940924661760">Who will provide the fireworks tomorrow...</a></li>
                  <li style="font-size:18px;">Stuart Broad : <a style="color:#3D007A;" href="https://twitter.com/StuartBroad8/status/581073238173884416">And welcome back Ottis Gibson. My new ball...</a></li>
                  <li style="font-size:18px;">Andrew Flintoff : <a style="color:#3D007A;" href="https://twitter.com/flintoff11/status/581824857295466497">Just dropped off a load of gear including...</a></li>
              </ul>
            </div>
            </div>
            
          </div>

        </div>

      </div>
    </div>


    <?php
  include("footer.php");
  ?>