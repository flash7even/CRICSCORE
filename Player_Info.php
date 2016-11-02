<?php
  include("header.php");
?>

<?php
  require('connectdb.php');
?>

<?php
	$player_id = 1;
    if(isset($_GET["player_id"])){
        $player_id = $_GET["player_id"];
    }

    $sql = "SELECT * FROM player WHERE player_id = '$player_id'";
    $result = mysqli_query($cnctdb, $sql);
    $row = mysqli_fetch_row($result);

?>
<div class="container">
  <div>
  		<div class="Team_Info_Left" style="padding:10px;border: 10px solid;border-color: #F8F8FC;">
  			<h3 style="text-align:left;">Player Name : <?php echo $row[0]; ?></h3>
        <h4 style="text-align:left;">Country : <?php echo $row[2]; ?></h4>
        <h5 style="text-align:left;">Age : <?php echo $row[12]; ?></h5>
        <h5 style="text-align:left;">Debut Year : <?php echo $row[13]; ?></h5>
        <h5 style="text-align:left;">MOM : <?php echo $row[14]; ?></h5>
  		</div>

      <div>
        
      </div>

  </div>

	<div class="first_innings_bat">
        <h2 class="Result_header">Batting Statistics</h2>
        <table id="batsman_score_table">
              <tr>
			      <th>Category</th>
			      <th>Match Played</th>
			      <th>Run Scored</th>
        	  </tr>
	          <tr>
	            <td>Test</td>
	            <td><?php echo $row[3] ?></td>
	            <td><?php echo $row[6] ?></td>
	          </tr>
	          <tr>
	            <td>ODI</td>
	            <td><?php echo $row[4] ?></td>
	            <td><?php echo $row[7] ?></td>
	          </tr>
	          <tr>
	            <td>T20</td>
	            <td><?php echo $row[5] ?></td>
	            <td><?php echo $row[8] ?></td>
	          </tr>
        </table>
    </div>

    <div class="first_innings_bat">
        <h2 class="Result_header">Bowling Statistics</h2>
        <table id="batsman_score_table">
              <tr>
            <th>Category</th>
            <th>Match Played</th>
            <th>Wicket</th>
            </tr>
            <tr>
              <td>Test</td>
              <td><?php echo $row[3] ?></td>
              <td><?php echo $row[9] ?></td>
            </tr>
            <tr>
              <td>ODI</td>
              <td><?php echo $row[4] ?></td>
              <td><?php echo $row[10] ?></td>
            </tr>
            <tr>
              <td>T20</td>
              <td><?php echo $row[5] ?></td>
              <td><?php echo $row[11] ?></td>
            </tr>
        </table>
    </div>
</div>

<?php
  include("footer.php");
?>
