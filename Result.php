<?php
  include("header.php");
?>

<div class="container showresult">
          <?php
          $team_id = 0;
          if(isset($_GET["team_id"])){
              $team_id=$_GET["team_id"];
              require('connectdb.php');
              $stt = "END";
              $All = "All";
              $found = 0;
              $sql = "";
              if($team_id == $All) $sql = "SELECT * FROM match_history WHERE match_status = '$stt' ORDER BY match_id DESC";
              else $sql = "SELECT * FROM match_history WHERE match_status = '$stt' AND (teamA = '$team_id' OR teamB = '$team_id')  ORDER BY match_id DESC";
              $result = mysqli_query($cnctdb, $sql);
              $total_match = mysqli_num_rows($result);
              if($total_match != 0){

              ?>
                    <div class="result_list" style="text-align:center;">
                        <h3 class="Result_header">Recent Results of <?php echo $team_id; ?> Team</h3>
                        <br>

                    <?php
                      while($row1 = mysqli_fetch_row($result)){
                        $msg1 = $row1[1]." ".$row1[9]."/".$row1[11]."(".$row1[13].")";
                        $msg2 = $row1[2]." ".$row1[10]."/".$row1[12]."(".$row1[14].")";
                        $msg3 = " at ".$row1[6]." - ".$row1[5]." at ".$row1[20];
                      ?>

                          <div style="text-align:center;float:center;">
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

         <?php
            //header("Location: #showresult");
          }
        ?>

    </div>

<div class="container result_international">
  <h2 class="Result_header">International Results</h2>
  <div class="All_result">
    <a href="Result.php?team_id=All" class="list-group-item list-group-item-warning">All Results</a>
  </div>

  <div class="international_result_list">
    <div class="result_list">
      <a href="Result.php?team_id=Bangladesh" class="list-group-item list-group-item-success">Bangladesh</a>
      <a href="Result.php?team_id=Australia" class="list-group-item list-group-item-info">Australia</a>
      <a href="Result.php?team_id=South Africa" class="list-group-item list-group-item-success">South Africa</a>
      <a href="Result.php?team_id=New Zealand" class="list-group-item list-group-item-info">New Zealand</a>
      <a href="Result.php?team_id=England" class="list-group-item list-group-item-success">England</a>
      <a href="Result.php?team_id=India" class="list-group-item list-group-item-info">India</a>
      <a href="Result.php?team_id=Srilanka" class="list-group-item list-group-item-success">Srilanka</a>
      <a href="Result.php?team_id=Pakistan" class="list-group-item list-group-item-info">Pakistan</a>
      <a href="Result.php?team_id=West Indies" class="list-group-item list-group-item-success">West Indies</a>
      <a href="Result.php?team_id=Zimbabwe" class="list-group-item list-group-item-info">Zimbabwe</a>
    </div>
  </div>

</div>

    <?php

    ?>

      

<?php
  include("footer.php");
?>