<?php
  include("header.php");
?>

<div class="container">

<div class="container" style=
  "padding:5px;
  border: 5px solid;
  width:700px;
  background-color:#FFFFFF;
  text-align:center;
  background-color:#EBF5FF;
  border-color: #D4F1FF;">
  <h2 style="color:#00005C;">Currently Running Match Live Scorecard</h2>
</div>
  <div class="container">

    <?php
      require('connectdb.php');
      $stt = "RUNNING";
      $found = 0;
      $sql = "SELECT * FROM match_history WHERE match_status = '$stt' ORDER BY match_id DESC";
      $result = mysqli_query($cnctdb, $sql);
      $total_match = mysqli_num_rows($result);
      if($total_match == 0){

      ?>
          <div>
            <h3>Sorry,No Match Is Running Currently!</h3>
          </div>

      <?php

      }else{

          ?>
                <div class="result_list">

                <?php
                  while($row1 = mysqli_fetch_row($result)){
                    $msg1 = $row1[1]." ".$row1[9]."/".$row1[11]."(".$row1[13].")";
                    $msg2 = $row1[2]." ".$row1[10]."/".$row1[12]."(".$row1[14].")";
                    $msg3 = " at ".$row1[6]." - ".$row1[5]." at ".$row1[20];
                  ?>

                      <div style="float:center;text-align:center;">
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

      <div class="container" style=
        "padding:5px;
        border: 5px solid;
        background-color:#FFFFFF;
        width:700px;
        text-align:center;
        background-color:#EBF5FF;
        border-color: #D4F1FF;">
        <h2 style="color:#00005C;">Results and Scorecard of Previous Match</h2>
      </div>

    <div class="container">
      <?php
      $stt = "END";
      $found = 0;
      $sql = "SELECT * FROM match_history WHERE match_status = '$stt' ORDER BY match_id DESC";
      $result = mysqli_query($cnctdb, $sql);
      $total_match = mysqli_num_rows($result);
      if($total_match != 0){

      ?>
                <div class="result_list">

                <?php
                  while($row1 = mysqli_fetch_row($result)){
                    $msg1 = $row1[1]." ".$row1[9]."/".$row1[11]."(".$row1[13].")";
                    $msg2 = $row1[2]." ".$row1[10]."/".$row1[12]."(".$row1[14].")";
                    $msg3 = " at ".$row1[6]." - ".$row1[5]." at ".$row1[20];
                  ?>

                      <div style="float:center;text-align:center;">
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



      <div class="container" style=
        "padding:5px;
        border: 5px solid;
        background-color:#FFFFFF;
        text-align:center;
        width:700px;
        background-color:#EBF5FF;
        border-color: #D4F1FF;">
        <h2 style="color:#00005C;">Available Fixtures of Next Matches</h2>
      </div>

    <div class="container">
      <?php
      $stt = "FIXTURED";
      $found = 0;
      $sql = "SELECT * FROM match_history WHERE match_status = '$stt' ORDER BY match_id DESC";
      $result = mysqli_query($cnctdb, $sql);
      $total_match = mysqli_num_rows($result);
      if($total_match != 0){

      ?>
                <div class="result_list">

                <?php
                  while($row1 = mysqli_fetch_row($result)){
                    $msg3 = " at ".$row1[6]." - ".$row1[5]." at ".$row1[20];
                  ?>

                      <div style="float:center;text-align:center;">
                        <a href="Scorecard.php?id=<?php echo $row1[0]; ?>" class="list-group-item list-group-item-success"> <?php echo $row1[1]." vs ".$row1[2]; ?> </a>
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
</div>


<?php
  include("footer.php");
?>