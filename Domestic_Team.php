<?php
  include("header.php");
?>

<?php
  require('connectdb.php');
?>

<?php
	$tournament_name = "IPL";
    if(isset($_GET["tournament_name"])){
        $tournament_name = $_GET["tournament_name"];
    }
?>

<div class="container">
		<div class="Team_Left" style="width:1300px;">
			<h2 style="text-align:center;"><?php echo $tournament_name; ?> Recent Updates & Results</h2>
            <div class=" showresult" style="width:600px;float:left;">
              <?php
                  $stt = "RUNNING";
                  $sql = "SELECT * FROM match_history WHERE match_type = '$tournament_name' AND match_status = '$stt' ORDER BY match_id DESC";
                  $result = mysqli_query($cnctdb, $sql);
                  $total_match = mysqli_num_rows($result);
                  if($total_match != 0){

                  ?>
                        <div class="result_list" style="text-align:center;">
                            <h3 class="Result_header">Running Match in <?php echo $tournament_name; ?></h3>
                            <br>

                        <?php
                          while($row1 = mysqli_fetch_row($result)){
                            $msg1 = $row1[1]." ".$row1[9]."/".$row1[11]."(".$row1[13].")";
                            $msg2 = $row1[2]." ".$row1[10]."/".$row1[12]."(".$row1[14].")";
                            $msg3 = " at ".$row1[6]." - ".$row1[5]." at ".$row1[20];
                          ?>

                              <div style="text-align:center;float:center;width:550px;">
                                <a href="Scorecard.php?id=<?php echo $row1[0]; ?>" class="list-group-item list-group-item-success"> <?php echo $row1[1]." vs ".$row1[2]; ?> </a>
                                <h4><?php echo $msg1; ?></h4>
                                <h4><?php echo $msg2; ?></h4>
                                <h5><?php echo $msg3; ?></h5>
                                <a href="Scorecard.php?id=<?php echo $row1[0]; ?>">SCORECARD</a>
                              </div>
                              <br>

                        <?php
                          }
                          ?>

                        </div>

                    <?php
                        }
                     ?>
          </div>

          <div class="list-group" style="width:560px;">
              <h3 style="text-align:center;"><?php echo $tournament_name; ?> Recent News</h3>
                  <?php
                    $sql = "SELECT * FROM articles ORDER BY Writer_ID DESC LIMIT 1";
                    $result = mysqli_query($cnctdb, $sql);
                    $row1 = mysqli_fetch_row($result);
                    $last_id = 30;
                    $last_id = $row1[2];
                    $cnt = 1;
                    while (true){
                          if($cnt == 5 || $last_id == 0) break;
                          $news = "IPL";
                          $sql = "SELECT * FROM articles WHERE Writer_ID = $last_id";
                          $result5 = mysqli_query($cnctdb, $sql);
                          $total = mysqli_num_rows($result5);
                          if($result5 && $total!=0){
                            $row1 = mysqli_fetch_row($result5);
                            

                  ?>
                          <a href="Editorial_Home.php?id=<?php echo "".$row1[2]; ?>&Email=<?php echo $Email ?>" class="list-group-item" style="height:95px;width:550px;float:left;"> <h3><?php $res = "".$row1[0]."\n"; echo $res; ?> </h3> <b><?php $res = "".$row1[1]."\n - "; echo $res; ?> </b> <?php $res = "".$row1[5]."\n"; echo $res; ?> </a>
                  <?php
                            $cnt++;
                          }
                          $last_id--;
                  }
                  ?>
          </div>
		</div>

    <div class="container first_innings_bat">
        <h2 class="Result_header">Points Table:</h2>
        <table id="batsman_score_table">
          <tr>
            <th> Team</th>
            <th> Position</th>
            <th> Match</th>
            <th> Win</th>
            <th> Lost</th>
            <th> Tie</th>
            <th> Points</th>
          </tr>
          <?php 

                $sql = "SELECT * FROM tournament_team WHERE tournament_name = '$tournament_name'  ORDER BY position";
                $result = mysqli_query($cnctdb, $sql);
                while($row = mysqli_fetch_row($result)){

          ?>
                    <tr>
                      <td><?php echo $row[0] ?></td>
                      <td><?php echo $row[8] ?></td>
                      <td><?php echo $row[3] ?></td>
                      <td><?php echo $row[4] ?></td>
                      <td><?php echo $row[5] ?></td>
                      <td><?php echo $row[6] ?></td>
                      <td><?php echo $row[7] ?></td>
                    </tr>

          <?php
                }
          ?>
        </table>
    </div>

    <br><br>

    <div class="Team_Left" style="width:1300px;">
      <h2 class="Result_header"><?php echo $tournament_name; ?> Results & Fixtures</h2>
            <div class=" showresult" style="width:600px;float:left;">
              <?php
                  $stt = "RUNNING";
                  $sql = "SELECT * FROM match_history WHERE match_type = '$tournament_name' AND match_status = '$stt' ORDER BY match_id DESC";
                  $result = mysqli_query($cnctdb, $sql);
                  $total_match = mysqli_num_rows($result);
                  if($total_match != 0){

                  ?>
                        <div class="result_list" style="text-align:center;">
                            <h2 class="Result_header">Recents Results in <?php echo $tournament_name; ?> 2015</h2>
                            <br>

                        <?php
                          while($row1 = mysqli_fetch_row($result)){
                            $msg1 = $row1[1]." ".$row1[9]."/".$row1[11]."(".$row1[13].")";
                            $msg2 = $row1[2]." ".$row1[10]."/".$row1[12]."(".$row1[14].")";
                            $msg3 = " at ".$row1[6]." - ".$row1[5]." at ".$row1[20];
                          ?>

                              <div style="text-align:center;float:center;width:550px;">
                                <a href="Scorecard.php?id=<?php echo $row1[0]; ?>" class="list-group-item list-group-item-success"> <?php echo $row1[1]." vs ".$row1[2]; ?> </a>
                                <h4><?php echo $msg1; ?></h4>
                                <h4><?php echo $msg2; ?></h4>
                                <h5><?php echo $msg3; ?></h5>
                                <a href="Scorecard.php?id=<?php echo $row1[0]; ?>">SCORECARD</a>
                              </div>
                              <br>

                        <?php
                          }
                          ?>

                        </div>

                    <?php
                        }
                     ?>
          </div>
          

          <div class="result_list Team_Left" style="width:560px;float:left;">
                <h2 class="Result_header">IPL 2015 Team List</h2>
                <div class="result_list" style="width:550px;">
                <?php
                  $sql = "SELECT * FROM tournament_team WHERE tournament_name = '$tournament_name'";
                  $result = mysqli_query($cnctdb, $sql);
                  $cnt = 0;
                  while($row1 = mysqli_fetch_row($result)){
                    $cnt++;
                    if($cnt%2 == 0){
              ?>
                  <a href="#" class="list-group-item list-group-item-success"> <?php echo $row1[0]; ?> </a>
                  <?php 
                    }else{

                   ?>
                   <a href="#" class="list-group-item list-group-item-info"> <?php echo $row1[0]; ?> </a>
                  <?php
                    }
                  }
              ?>
                </div>
          </div>

    </div>

</div>

<?php
  include("footer.php");
?>
