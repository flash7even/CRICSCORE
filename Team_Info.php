<?php
  include("header.php");
?>

<?php
  require('connectdb.php');
?>

<?php
	$team_id = 1;
    if(isset($_GET["team_id"])){
        $team_id = $_GET["team_id"];
    }
    $sql = "SELECT * FROM articles ORDER BY Writer_ID DESC LIMIT 1";
    $result1 = mysqli_query($cnctdb, $sql);
    $row = mysqli_fetch_row($result1);
    $last_id = $row[2];

    $sql = "SELECT * FROM country WHERE team_id = '$team_id'";
    $result = mysqli_query($cnctdb, $sql);
    $row = mysqli_fetch_row($result);

?>

<div class="container">
		<div class="Team_Info_Left">
			<h3 style="text-align:center;"><?php echo $row[0]; ?> Team Recent News</h3>
            <div class="container">
                <div class="list-group" style="background-color:#FFFFFF;">
                    <?php
                      $cnt = 1;
                      $cur_id  = $last_id;

                      while (true){
                            if($cnt == 8 || $cur_id == 0) break;
                            $sql = "SELECT * FROM articles WHERE Writer_ID = $cur_id  AND Writing LIKE '%$row[0]%'";
                            $result5 = mysqli_query($cnctdb, $sql);
                            $total = mysqli_num_rows($result5);
                            if($result5 && $total!=0){
                              $row1 = mysqli_fetch_row($result5);
                              

                    ?>
                    <a href="Editorial_Home.php?id=<?php echo "".$row1[2]; ?>" target="blank" class="list-group-item" style="background-color:#E9FFFF;height:120px;width:560px;float:left;"> <h3><?php $res = "".$row1[0]."\n"; echo $res; ?> </h3> <b><?php $res = "".$row1[1]."\n - "; echo $res; ?> </b> <?php $res = "".$row1[5]."\n"; echo $res; ?> </a>
                    <?php
                        $cnt++;
                      }
                      $cur_id--;
                    }
                    ?>
                    
                </div>
            </div>
		</div>

		<div class="Team_Info_Right">
					<div id="myCarousel" class="carousel slide" data-ride="carousel" >
                          <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                            <li data-target="#myCarousel" data-slide-to="3"></li>
                            <li data-target="#myCarousel" data-slide-to="3"></li>
                          </ol>

                          <div class="carousel-inner" role="listbox" style="background-color:#D6F5FF;">

                            <div class="item active">
                              <img class="img-responsive center-block" src="img/<?php echo $team_id; ?>/one.jpg" alt="Bangladesh" style="width:800px;height:450px">
                            </div>

                            <div class="item">
                              <img class="img-responsive center-block" src="img/<?php echo $team_id; ?>/two.jpg" alt="Bangladesh" style="width:800px;height:450px">
                            </div>
                          
                            <div class="item">
                              <img class="img-responsive center-block" src="img/<?php echo $team_id; ?>/three.jpg" alt="Bangladesh" style="width:800px;height:450px">
                            </div>

                            <div class="item">
                              <img class="img-responsive center-block" src="img/<?php echo $team_id; ?>/four.jpg" alt="Bangladesh" style="width:800px;height:450px">
                            </div>

                            <div class="item">
                              <img class="img-responsive center-block" src="img/<?php echo $team_id; ?>/five.jpg" alt="Bangladesh" style="width:800px;height:450px">
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

	<div class="first_innings_bat">
        <h2 class="Result_header">Team Statistics</h2>
        <table id="batsman_score_table">
              <tr>
			      <th>Category</th>
			      <th>Match Played</th>
			      <th>Win</th>
			      <th>Lost</th>
			      <th>Draw</th>
			      <th>Rank</th>
			      <th>Points</th>
        	  </tr>
	          <tr>
	            <td>Test</td>
	            <td><?php echo $row[5] ?></td>
	            <td><?php echo $row[6] ?></td>
	            <td><?php echo $row[7] ?></td>
	            <td><?php echo $row[8] ?></td>
	            <td><?php echo $row[2] ?></td>
	            <td><?php echo $row[15] ?></td>
	          </tr>
	          <tr>
	            <td>ODI</td>
	            <td><?php echo $row[9] ?></td>
	            <td><?php echo $row[10] ?></td>
	            <td><?php echo $row[11] ?></td>
	            <td>0</td>
	            <td><?php echo $row[2] ?></td>
	            <td><?php echo $row[16] ?></td>
	          </tr>
	          <tr>
	            <td>T20</td>
	            <td><?php echo $row[12] ?></td>
	            <td><?php echo $row[13] ?></td>
	            <td><?php echo $row[14] ?></td>
	            <td>0</td>
	            <td><?php echo $row[3] ?></td>
	            <td><?php echo $row[16] ?></td>
	          </tr>
        </table>
    </div>

    <div class="player_list">
		    <h2 class="Result_header"><?php echo $row[0]; ?> Player List</h2>
		    <div class="result_list">
		    <?php
			    $sql = "SELECT * FROM player WHERE country_name = '$row[0]'";
			    $result = mysqli_query($cnctdb, $sql);
			    $cnt = 0;
			    while($row1 = mysqli_fetch_row($result)){
			    	$cnt++;
			    	if($cnt%2 == 0){
			?>
		      <a href="Player_Info.php?player_id=<?php echo $row1[1]; ?>" class="list-group-item list-group-item-success"> <?php echo $row1[0]; ?> </a>
		      <?php 
		      	}else{

		       ?>
		       <a href="Player_Info.php?player_id=<?php echo $row1[1]; ?>" class="list-group-item list-group-item-info"> <?php echo $row1[0]; ?> </a>
		      <?php
		  			}
			    }
			?>
		    </div>
	</div>

</div>

<?php
  include("footer.php");
?>
