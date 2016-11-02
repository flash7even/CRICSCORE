<?php
  include("header.php");
?>
<div class = "container">
    <div class="first_innings_bat">
        <h2 class="Result_header">Test Ranking</h2>
        <table id="batsman_score_table">
              <tr>
              <th>Team Name</th>
              <th>Rank</th>
              <th>Match Played</th>
              <th>Win</th>
              <th>Lost</th>
              <th>Draw</th>
              <th>Points</th>
            </tr>
              <?php
                  require('connectdb.php');
                  $sql = "SELECT * FROM country ORDER BY test_rank";
                  $result = mysqli_query($cnctdb, $sql);
                  while($row = mysqli_fetch_row($result)){

                  ?>
                      <tr>
                        <td><?php echo $row[0] ?></td>
                        <td><?php echo $row[2] ?></td>
                        <td><?php echo $row[5] ?></td>
                        <td><?php echo $row[6] ?></td>
                        <td><?php echo $row[7] ?></td>
                        <td><?php echo $row[8] ?></td>
                        <td><?php echo $row[15] ?></td>
                      </tr>

              <?php }

              ?>
        </table>
    </div>
    </br>
    </br>
    <div class="first_innings_bat">
        <h2 class="Result_header">ODI Ranking</h2>
        <table id="batsman_score_table">
              <tr>
              <th>Team Name</th>
              <th>Rank</th>
              <th>Match Played</th>
              <th>Win</th>
              <th>Lost</th>
              <th>Points</th>
            </tr>
              <?php
                  require('connectdb.php');
                  $sql = "SELECT * FROM country ORDER BY odi_rank";
                  $result = mysqli_query($cnctdb, $sql);
                  while($row = mysqli_fetch_row($result)){

                  ?>
                      <tr>
                        <td><?php echo $row[0] ?></td>
                        <td><?php echo $row[3] ?></td>
                        <td><?php echo $row[8] ?></td>
                        <td><?php echo $row[9] ?></td>
                        <td><?php echo $row[10] ?></td>
                        <td><?php echo $row[16] ?></td>
                      </tr>

              <?php }

              ?>
        </table>
    </div>


    </br>
    </br>
    <div class="first_innings_bat">
        <h2 class="Result_header">T20 Ranking</h2>
        <table id="batsman_score_table">
              <tr>
              <th>Team Name</th>
              <th>Rank</th>
              <th>Match Played</th>
              <th>Win</th>
              <th>Lost</th>
              <th>Points</th>
            </tr>
              <?php
                  require('connectdb.php');
                  $sql = "SELECT * FROM country ORDER BY t20_rank";
                  $result = mysqli_query($cnctdb, $sql);
                  while($row = mysqli_fetch_row($result)){

                  ?>
                      <tr>
                        <td><?php echo $row[0] ?></td>
                        <td><?php echo $row[4] ?></td>
                        <td><?php echo $row[11] ?></td>
                        <td><?php echo $row[12] ?></td>
                        <td><?php echo $row[13] ?></td>
                        <td><?php echo $row[17] ?></td>
                      </tr>

              <?php }

              ?>
        </table>
    </div>
</div>

    <?php
  include("footer.php");
?>