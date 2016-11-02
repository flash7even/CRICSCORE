<?php
  include("header.php");
  $TeamA = $TeamB = $BatA = $BatB = $BowlA = $BowlB = $Result = $Winner = $Umpire1 = $Umpire2 = $Referee = "";
  $mom = $match_date = $place = $toss = "";
  $id = 1;
  require('connectdb.php');
  if(isset($_GET["id"])){
      $id=$_GET["id"];
  }
  $sql = "SELECT * FROM match_history WHERE match_id = $id";
  $result = mysqli_query($cnctdb, $sql);
  $row1 = mysqli_fetch_row($result);
  //echo $row[1]." vs ".$row[2];

  $total_run_A = $total_wkt_A = $total_over_A  = $extra = 0;
  $total_run_A = $row1[10];
  $total_wkt_A = $row1[12];
  $total_over_A = $row1[14];
  $extra_A = $row1[16];
  $total_run_B = $row1[9];
  $total_wkt_B = $row1[11];
  $total_over_B = $row1[13];
  $extra_B = $row1[15];

  $Umpire1 = $row1[17];
  $Umpire2 = $row1[18];
  $Referee = $row1[19];
  $mom = $row1[4];
  $match_date = $row1[5];
  $place = $row1[6];
  $toss = $row1[7];

  $TeamA = $row1[1];
  $TeamB = $row1[2];
  if($TeamA == $row1[8]){
      $BatA = $TeamA;
      $BatB = $TeamB;
      $BowlA = $TeamB;
      $BowlB = $TeamA;
      $total_run_B = $row1[10];
      $total_wkt_B = $row1[12];
      $total_over_B = $row1[14];
      $extra_B = $row1[16];
      $total_run_A = $row1[9];
      $total_wkt_A = $row1[11];
      $total_over_A = $row1[13];
      $extra_A = $row1[15];
  }else{
      //echo "Did Not Match";
      $BatA = $TeamB;
      $BatB = $TeamA;
      $BowlA = $TeamA;
      $BowlB = $TeamB;
  }
  if(isset($row1[3])){
      $Winner=$row1[3];
  }

?>

<div class="container">

<div class="first_innings_head">
  <h2><?php echo $TeamA; ?> vs <?php echo $TeamB; ?></h2>
    <?php
          if(strlen($Winner)!=0){
     ?>
          <p>Australia won by 95 runs</p>
    <?php } ?>
    <h4> <?php echo $match_date; ?> - <?php echo $place; ?> </h4>
</div>

<div class="first_innings_bat">
    <h2 class="Result_header">First Innings Batting : <?php echo $BatA; ?></h2>
    <table id="batsman_score_table">
      <tr>
        <th>Batsman</th>
        <th>Wicket</th>
        <th>Run</th>
        <th>Ball</th>
        <th>4s</th>
        <th>6s</th>
        <th>S\R</th>
      </tr>
      <?php 
            $sql = "SELECT * FROM match_performance WHERE match_id = '$id' AND country = '$BatA' ORDER BY batting_position";
            $result = mysqli_query($cnctdb, $sql);
            $batsman = $wicket = "";
            $run_taken = $ball_faced = $sixes = $fours = 0;
            $sr = $run = $ball = 0.0;
            while($row = mysqli_fetch_row($result)){
                $wicket = "";
                if($row[5] == 0) continue;
                $batsman = $row[0];
                $run_taken = $row[2];
                $ball_faced = $row[3];
                $sixes = $row[8];
                $fours = $row[7];
                $run = number_format($run_taken, 2);
                $ball = number_format($ball_faced, 2);
                $sr = ($run / $ball) * 100;
                $sr = number_format($sr, 2);
                if(isset($row[13])){
                    $wicket = $wicket."b ".$row[13];
                    if(isset($row[14])){
                        $wicket = $wicket." c ".$row[14];
                    }
                }else{
                    $wicket = "not out";
                }

      ?>
          <tr>
            <td><?php echo $batsman ?></td>
            <td><?php echo $wicket ?></td>
            <td><?php echo $run_taken ?></td>
            <td><?php echo $ball_faced ?></td>
            <td><?php echo $fours ?></td>
            <td><?php echo $sixes ?></td>
            <td><?php echo $sr ?></td>
          </tr>

      <?php
                }
      ?>

    </table>

    <table id="batsman_score_table">
      <tr class="score_total">
        <td><b>Total</b></td>
        <td>(<?php echo $total_wkt_A ?> wickets; <?php echo $total_over_A ?> overs)</td>
        <td><?php echo $total_run_A ?></td>
      </tr>
    </table>
</div>



<div class="first_innings_bowl">
    <h2 class="Result_header">First Innings Bowling : <?php echo $BowlA; ?></h2>
    <table id="batsman_score_table">
      <tr>
        <th>Bowler</th>
        <th>Over</th>
        <th>Maiden</th>
        <th>Run</th>
        <th>Wicket</th>
        <th>Econ</th>
      </tr>

      <?php 
            $sql = "SELECT * FROM match_performance WHERE match_id = '$id' AND country = '$BowlA' ORDER BY bowling_position";
            $result = mysqli_query($cnctdb, $sql);
            $bowler ="";
            $over = $maiden = $run_given = $wkt = 0;
            $econ = $run = $ovr = 0.0;
            while($row = mysqli_fetch_row($result)){
                $wicket = "";
                if($row[6] == 0) continue;
                $bowler = $row[0];
                $over = $row[9];
                $maiden = $row[10];
                $run_given = $row[11];
                $wkt = $row[12];
                $run = number_format($run_given, 2);
                $ovr = number_format($over, 2);
                $econ = ($run / $ovr);
                $econ = number_format($econ, 2);

      ?>

      <tr>
        <td><?php echo $bowler ?></td>
        <td><?php echo $over ?></td>
        <td><?php echo $maiden ?></td>
        <td><?php echo $run_given ?></td>
        <td><?php echo $wkt ?></td>
        <td><?php echo $econ ?></td>
      </tr>

      <?php
            }
      ?>
    </table>
</div>

<div class="second_innings_bat">
    <h2 class="Result_header">Second Innings Batting : <?php echo $BatB; ?></h2>
    <table id="batsman_score_table">
      <tr>
        <th>Batsman</th>
        <th>Wicket</th>
        <th>Run</th>
        <th>Ball</th>
        <th>4s</th>
        <th>6s</th>
        <th>S\R</th>
      </tr>

      <?php 
            $sql = "SELECT * FROM match_performance WHERE match_id = '$id' AND country = '$BatB' ORDER BY batting_position";
            $result = mysqli_query($cnctdb, $sql);
            $batsman = $wicket = "";
            $run_taken = $ball_faced = $sixes = $fours = 0;
            $sr = $run = $ball = 0.0;
            while($row = mysqli_fetch_row($result)){
                $wicket = "";
                if($row[5] == 0) continue;
                $batsman = $row[0];
                $run_taken = $row[2];
                $ball_faced = $row[3];
                $sixes = $row[8];
                $fours = $row[7];
                $run = number_format($run_taken, 2);
                $ball = number_format($ball_faced, 2);
                $sr = ($run / $ball) * 100;
                $sr = number_format($sr, 2);
                if(isset($row[13]) && strlen($row[13])>1){
                    $wicket = $wicket."b ".$row[13];
                    if(isset($row[14])){
                        $wicket = $wicket." c ".$row[14];
                    }
                }else{
                    $wicket = "not out";
                }
                if(strlen($wicket)<5) $wicket = "not out";

      ?>
          <tr>
            <td><?php echo $batsman ?></td>
            <td><?php echo $wicket ?></td>
            <td><?php echo $run_taken ?></td>
            <td><?php echo $ball_faced ?></td>
            <td><?php echo $fours ?></td>
            <td><?php echo $sixes ?></td>
            <td><?php echo $sr ?></td>
          </tr>

      <?php
                }
      ?>

    </table>
    <table id="batsman_score_table">
      <tr class="score_total">
        <td><b>Total</b></td>
        <td>(<?php echo $total_wkt_B ?> wickets; <?php echo $total_over_B ?> overs)</td>
        <td><?php echo $total_run_B ?></td>
      </tr>
    </table>
</div>

<div class="second_innings_bowl">
    <h2 class="Result_header">Second Innings Bowling : <?php echo $BowlB; ?></h2>
    <table id="batsman_score_table">
      <tr>
        <th>Bowler</th>
        <th>Over</th>
        <th>Maiden</th>
        <th>Run</th>
        <th>Wicket</th>
        <th>Econ</th>
      </tr>

      <?php 
            $sql = "SELECT * FROM match_performance WHERE match_id = '$id' AND country = '$BowlB' ORDER BY bowling_position";
            $result = mysqli_query($cnctdb, $sql);
            $bowler ="";
            $over = $maiden = $run_given = $wkt = 0;
            $econ = $run = $ovr = 0.0;
            while($row = mysqli_fetch_row($result)){
                $wicket = "";
                if($row[6] == 0) continue;
                $bowler = $row[0];
                $over = $row[9];
                $maiden = $row[10];
                $run_given = $row[11];
                $wkt = $row[12];
                $run = number_format($run_given, 2);
                $ovr = number_format($over, 2);
                $econ = ($run / $ovr);
                $econ = number_format($econ, 2);

      ?>

      <tr>
        <td><?php echo $bowler ?></td>
        <td><?php echo $over ?></td>
        <td><?php echo $maiden ?></td>
        <td><?php echo $run_given ?></td>
        <td><?php echo $wkt ?></td>
        <td><?php echo $econ ?></td>
      </tr>

      <?php
                }
      ?>

    </table>
</div>

<div class="first_innings_head">
  <h4><b>Toss</b> - <?php echo $toss; ?></h4>
  <p><b>Player of the match</b> - <?php echo $mom; ?></p>
  <p><b>Umpires </b> - <?php echo $Umpire1; ?> and <?php echo $Umpire2; ?></p>

</div>
</div>

<?php
  include("footer.php");
  ?>