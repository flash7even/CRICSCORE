<?php
  include("header.php");
?>


	<div class="container first_innings_bat">
        <h2 class="Result_header">Recent Match History:</h2>
        <table id="batsman_score_table">
          <tr>
            <th> Team A</th>
            <th> Team B</th>
            <th> Match Status</th>
            <th> Match ID</th>
          </tr>
          <?php 
          		require('connectdb.php');
          		$sql = "SELECT * FROM match_history ORDER BY match_id DESC LIMIT 1";
                $result = mysqli_query($cnctdb, $sql);
                $row1 = mysqli_fetch_row($result);
                $last_id = 10;
                $cnt = 1;
                $last_id = $row1[0];

                while(true){
                	if($cnt == 10 || $last_id == 0) break;
                	$sql = "SELECT * FROM match_history WHERE match_id = '$last_id'";
                	$result = mysqli_query($cnctdb, $sql);
                    $total = mysqli_num_rows($result);
                	if($result && $total!=0){
                        $row = mysqli_fetch_row($result);

          ?>
	                    <tr>
	                      <td><?php echo $row[1] ?></td>
	                      <td><?php echo $row[2] ?></td>
	                      <td><?php echo $row[21] ?></td>
	                      <td><?php echo $row[0] ?></td>
	                    </tr>

          <?php
          			$cnt++;
          			}
          			$last_id--;
                }
          ?>
        </table>
    </div>
    <br><br>



<?php
  $place_id = "Match_ID";
  $match_id = "";
	if(isset($_POST["match_id"])){
	 $place_id = $_POST["match_id"]."";
	 $match_id = $_POST["match_id"]."";
	}
	else if(isset($_GET["match_id"])){
		$place_id = $_GET["match_id"]."";
		$match_id = $_GET["match_id"]."";
	}
	$place_id = $match_id;
  ?>
	<h2 class="Result_header">Select The Match ID You Want To Update</h2>
	</br>
	<div class="container">

	  <div class="span6 offset6" style="height:80px;width:300px;font-size:20px;">
      		<li><a style="color:#000033;" href="Update_Scorecard.php?player_list=5"><b>INSERT PLAYER LIST</b></a></li>
      </div>

      			<?php
		            if(isset($_GET["player_list"])){
		                require('connectdb.php');
        		?>

		       	<div class="container">
		       		<br>
		       		<br>
		       		<form role="form" method="POST" action="Update_Scorecard.php">
				    <div class="form-group">
				    	<label for="pwd">Player Name:</label>
				        <input type="text" name="player_name" id="player_name" class="form-control"  placeholder="Player Name">
				    </div>
				    <div class="form-group">
				    	<label for="pwd">Match ID:</label>
				        <input type="text" name="match_id" id="match_id" class="form-control"  placeholder="Match ID">
				    </div>
				    <div class="form-group">
				    	<label for="pwd">Run Scored:</label>
				        <input type="text" name="run_taken" id="run_taken" class="form-control"  placeholder="Run Scored">
				    </div>
				    <div class="form-group">
				    	<label for="pwd">Ball Faced:</label>
				        <input type="text" name="ball_faced" id="ball_faced" class="form-control"  placeholder="Ball Faced">
				    </div>
				    <div class="form-group">
				    	<label for="pwd">Country:</label>
				        <input type="text" name="country" id="country" class="form-control"  placeholder="Country">
				    </div>
				    <div class="form-group">
				    	<label for="pwd">Batting Position:</label>
				        <input type="text" name="batting_position" id="batting_position" class="form-control"  placeholder="Batting Position">
				    </div>
				    <div class="form-group">
				    	<label for="pwd">Bowling Position:</label>
				        <input type="text" name="bowling_position" id="bowling_position" class="form-control"  placeholder="Bowling Position">
				    </div>
				    <div class="form-group">
				    	<label for="pwd">Fours:</label>
				        <input type="text" name="fours" id="fours" class="form-control"  placeholder="Fours">
				    </div>
				    <div class="form-group">
				    	<label for="pwd">Sixes:</label>
				        <input type="text" name="sixes" id="sixes" class="form-control"  placeholder="Sixes">
				    </div>
				    <div class="form-group">
				    	<label for="pwd">Wicket Taker:</label>
				        <input type="text" name="wicket_taker" id="wicket_taker" class="form-control"  placeholder="Wicket Taker">
				    </div>
				    <div class="form-group">
				    	<label for="pwd">Catch Taker:</label>
				        <input type="text" name="catch_taker" id="catch_taker" class="form-control"  placeholder="Catch Taker">
				    </div>
				    <div class="form-group">
				    	<label for="pwd">Over:</label>
				        <input type="text" name="over" id="over" class="form-control"  placeholder="Over">
				    </div>
				    <div class="form-group">
				    	<label for="pwd">Maiden:</label>
				        <input type="text" name="maiden" id="maiden" class="form-control"  placeholder="Maiden">
				    </div>
				    <div class="form-group">
				    	<label for="pwd">Run Given:</label>
				        <input type="text" name="run_given" id="run_given" class="form-control"  placeholder="Run Given">
				    </div>
				    <div class="form-group">
				    	<label for="pwd">Wicket Taken:</label>
				        <input type="text" name="wicket" id="wicket" class="form-control"  placeholder="Wicket Taken">
				    </div>
				    <button type="submit" name="update1"  value="update1" class="btn btn-default" style="text-align:center;">Insert</button>
		       </div>
		       <br>
		       <br>
		       <br>

       <?php
		   }

       ?>

       <?php
            if(isset($_POST["update1"])){
                require('connectdb.php');
                
                $run_takenu=$ball_facedu=$foursu=$sixesu=$overu=$maidenu=$wicketu=$run_givenu=$wicket_takeru=$catch_takeru="";
                $match_id = $_POST["match_id"];
                $player_nameu = $_POST["player_name"];
                $run_takenu = $_POST["run_taken"];
                $ball_facedu = $_POST["ball_faced"];
                $countryu = $_POST["country"];
                $batting_positionu = $_POST["batting_position"];
                $bowling_positionu = $_POST["bowling_position"];
                $foursu = $_POST["fours"];
                $sixesu = $_POST["sixes"];
                $overu = $_POST["over"];
                $maidenu = $_POST["maiden"];
                $wicketu = $_POST["wicket"];
                $run_givenu = $_POST["run_given"];
                $wicket_takeru = $_POST["wicket_taker"];
                $catch_takeru = $_POST["catch_taker"];
                $sql =  "INSERT INTO match_performance(player_name,match_id,run_taken,ball_faced,country,batting_position,
                		bowling_position,fours,sixes,over,maiden,wicket,run_given,catch_taker,wicket_taker)".
                       "VALUES('$player_nameu','$match_id','$run_takenu','$ball_facedu','$countryu','$batting_positionu',
                       	'$bowling_positionu','$foursu','$sixesu','$overu','$maidenu','$wicketu','$run_givenu',
                       	'$catch_takeru','$wicket_takeru')";

                $result2 = mysqli_query($cnctdb, $sql);
                if(!$result2){
                    print_r($cnctdb->error);
                }
            }

        ?>

	  <form role="form" method="POST" action="Update_Scorecard.php?match_id=<?php echo $match_id; ?>">
	    <div class="form-group">
	      <label for="comment">Match ID to update:</label>
	      <input type="text" class="form-control" name="Match_ID" id="match_id" placeholder="Match ID"<?php //echo $place_id; ?>>
	    </div>
	    <button type="submit" name="Enter" class="btn btn-default" style="text-align:center;">Enter</button>
	  </form>

		<?php
            if(isset($_POST["Enter"]) || isset($_GET["match_id"])){
                require('connectdb.php');
                if(isset($_POST["Enter"])) $match_id = $_POST["Match_ID"];
                else if(isset($_GET["match_id"])) $match_id = $_GET["match_id"];

                $sql = "SELECT * FROM match_history WHERE match_id = '$match_id'";
                $result =  mysqli_query($cnctdb, $sql);
                $row = mysqli_fetch_row($result);
                $TeamA = $row[1];
                $TeamB = $row[2];

        ?>
        </br>
        </br>
        <div class="span6 offset6" style="height:40px;width:120px;">
	        <li class="dropdown">
	            <a style="color:#000033;" class="dropdown-toggle" data-toggle="dropdown" href="#"> <?php echo $TeamA; ?> <span class="caret"></span></a>
	            <ul class="dropdown-menu">
	            <?php
		                $sql = "SELECT * FROM match_performance WHERE match_id = '$match_id' AND country = '$TeamA'";
		                $result = mysqli_query($cnctdb, $sql);
		                
		                while ($row1 = mysqli_fetch_row($result)) {

            	?>
	              <li><a href="Update_Scorecard.php?match_id=<?php echo $match_id;?>&player_name=<?php echo $row1[0]; ?>"><?php echo $row1[0];?></a></li>
              	<?php
		                	
		                }
		        ?>
	            </ul>
	        </li>
        </div>

        <div class="span6 offset6" style="height:40px;width:120px;">
	        <li class="dropdown">
	            <a style="color:#000033;" class="dropdown-toggle" data-toggle="dropdown" href="#"> <?php echo $TeamB; ?> <span class="caret"></span></a>
	            <ul class="dropdown-menu">
	            <?php
		                $sql = "SELECT * FROM match_performance WHERE match_id = '$match_id' AND country = '$TeamB'";
		                $result = mysqli_query($cnctdb, $sql);
		                
		                while ($row1 = mysqli_fetch_row($result)) {

            	?>
	              <li><a href="Update_Scorecard.php?match_id=<?php echo $match_id;?>&player_name=<?php echo $row1[0]; ?>"><?php echo $row1[0];?></a></li>
              	<?php
		                	
		                }
		        ?>
	            </ul>
	        </li>
        </div>

        <div class="span6 offset6" style="height:40px;width:200px;">
          		<li><a style="color:#000033;" href="Update_Scorecard.php?match_id=<?php echo $match_id;?>&result_id="5""><?php echo "Update Result Database";?></a></li>
        </div>

        <?php
        	}
        ?>
       </div>

       <?php
            if(isset($_GET["match_id"]) && !(isset($_GET["result_id"])) && isset($_GET["player_name"])){
                require('connectdb.php');
                $match_id = $_GET["match_id"];
                $player_name = $_GET["player_name"];

                //echo "".$match_id." and ".$player_name;

                $sql = "SELECT * FROM match_performance WHERE match_id = '$match_id' AND player_name = '$player_name'";
                $result = mysqli_query($cnctdb, $sql);
                $row5 = mysqli_fetch_row($result);

        ?>

		       <div class="container">
		       		<br>
		       		<br>
		       		<form role="form" method="POST" action="Update_Scorecard.php?match_id=<?php echo $match_id;?>&player_name=<?php echo $player_name; ?>">
				    <div class="form-group">
				    	<label for="pwd">Player Name:</label>
				        <input type="text" name="player_name" id="player_name" class="form-control"  placeholder="<?php echo $row5[0]; ?>">
				    </div>
				    <div class="form-group">
				    	<label for="pwd">Run Scored:</label>
				        <input type="text" name="run_taken" id="run_taken" class="form-control"  placeholder="<?php echo $row5[2]; ?>">
				    </div>
				    <div class="form-group">
				    	<label for="pwd">Ball Faced:</label>
				        <input type="text" name="ball_faced" id="ball_faced" class="form-control"  placeholder="<?php echo $row5[3]; ?>">
				    </div>
				    <div class="form-group">
				    	<label for="pwd">Fours:</label>
				        <input type="text" name="fours" id="fours" class="form-control"  placeholder="<?php echo $row5[7]; ?>">
				    </div>
				    <div class="form-group">
				    	<label for="pwd">Sizes:</label>
				        <input type="text" name="sixes" id="sixes" class="form-control"  placeholder="<?php echo $row5[8]; ?>">
				    </div>
				    <div class="form-group">
				    	<label for="pwd">Wicket Taker:</label>
				        <input type="text" name="wicket_taker" id="wicket_taker" class="form-control"  placeholder="<?php echo $row5[13]; ?>">
				    </div>
				    <div class="form-group">
				    	<label for="pwd">Catch Taker:</label>
				        <input type="text" name="catch_taker" id="catch_taker" class="form-control"  placeholder="<?php echo $row5[14]; ?>">
				    </div>
				    <div class="form-group">
				    	<label for="pwd">Over:</label>
				        <input type="text" name="over" id="over" class="form-control"  placeholder="<?php echo $row5[9]; ?>">
				    </div>
				    <div class="form-group">
				    	<label for="pwd">Maiden:</label>
				        <input type="text" name="maiden" id="maiden" class="form-control"  placeholder="<?php echo $row5[10]; ?>">
				    </div>
				    <div class="form-group">
				    	<label for="pwd">Run Given:</label>
				        <input type="text" name="run_given" id="run_given" class="form-control"  placeholder="<?php echo $row5[11]; ?>">
				    </div>
				    <div class="form-group">
				    	<label for="pwd">Wicket Taken:</label>
				        <input type="text" name="wicket" id="wicket" class="form-control"  placeholder="<?php echo $row5[12]; ?>">
				    </div>
				    <button type="submit" name="update"  value="registration" class="btn btn-default" style="text-align:center;">Update</button>
		       </div>

       <?php
		   }

       ?>

       <?php
            if(isset($_POST["update"])){
                require('connectdb.php');
                $match_id = $_GET["match_id"];
                $player_name = $_GET["player_name"];
                $run_takenu=$ball_facedu=$foursu=$sixesu=$overu=$maidenu=$wicketu=$run_givenu=$wicket_takeru=$catch_takeru="";
                $run_takenu = $_POST["run_taken"];
                $ball_facedu = $_POST["ball_faced"];
                $foursu = $_POST["fours"];
                $sixesu = $_POST["sixes"];
                $overu = $_POST["over"];
                $maidenu = $_POST["maiden"];
                $wicketu = $_POST["wicket"];
                $run_givenu = $_POST["run_given"];
                $wicket_takeru = $_POST["wicket_taker"];
                $catch_takeru = $_POST["catch_taker"];
                $sql = "SELECT * FROM match_performance WHERE match_id = '$match_id' AND player_name = '$player_name'";
                $result = mysqli_query($cnctdb, $sql);
                $row5 = mysqli_fetch_row($result);

                $prev_run = $cur_run = $row5[2];
                $prev_wicket = $cur_wicket = $row5[12];
                $cur_player_id = $row5[15];
                $match_category = $row5[16];

                if(strlen($run_takenu) == 0) $run_takenu = $row5[2];
                else{
                	$cur_run = $run_takenu;
                }
                if(strlen($ball_facedu) == 0) $ball_facedu = $row5[3];
                if(strlen($foursu) == 0) $foursu = $row5[7];
                if(strlen($sixesu) == 0) $sixesu = $row5[8];
                if(strlen($overu) == 0) $overu = $row5[9];
                if(strlen($maidenu) == 0) $maidenu = $row5[10];
                if(strlen($wicketu) == 0) $wicketu = $row5[12];
                else{
                	$cur_wicket = $wicketu;
                }
                if(strlen($run_givenu) == 0) $run_givenu = $row5[11];
                if(strlen($wicket_takeru) == 0) $wicket_takeru = $row5[13];
                if(strlen($catch_takeru) == 0) $catch_takeru = $row5[14];

                $sql  = "UPDATE match_performance SET run_taken='$run_takenu', ball_faced='$ball_facedu', fours='$foursu', 
                        sixes='$sixesu', over='$overu', maiden='$maidenu', wicket='$wicketu', 
                        run_given='$run_givenu', wicket_taker='$wicket_takeru', catch_taker='$catch_takeru'
                        WHERE match_id = '$match_id' AND player_name = '$player_name'";

                $result2 = mysqli_query($cnctdb, $sql);
                if(!$result2){
                    //echo "Data Insertion Failed!";
                    print_r($cnctdb->error);
                }else{
                	//echo "Data Inserted";
                }

                $inc_run = $cur_run-$prev_run;
                $inc_wicket = $cur_wicket-$prev_wicket;

                $sql = "SELECT * FROM player WHERE player_id = '$cur_player_id'";
                $result8 = mysqli_query($cnctdb, $sql);
                $row8 = mysqli_fetch_row($result8);

                if($match_category == "TEST"){
                	$cur_test_run = $row8[6] + $inc_run;
                	$cur_test_wicket = $row8[9] + $inc_wicket;
                	$sql  = "UPDATE player SET test_match_run='$cur_test_run' , test_match_wkt='$cur_test_wicket'
                	WHERE player_id = '$cur_player_id'";
                }else if($match_category == "ODI"){
                	$cur_odi_run = $row8[7] + $inc_run;
                	$cur_odi_wicket = $row8[10] + $inc_wicket;
                	$sql  = "UPDATE player SET odi_match_run='$cur_odi_run' , odi_match_wkt='$cur_odi_wicket'
                	WHERE player_id = '$cur_player_id'";
                }else{
                	$cur_t20_run = $row8[8] + $inc_run;
                	$cur_t20_wicket = $row8[11] + $inc_wicket;
                	$sql  = "UPDATE player SET t20_match_run='$cur_t20_run' , t20_match_wkt='$cur_t20_wicket'
                	WHERE player_id = '$cur_player_id'";
                }
                $result99 = mysqli_query($cnctdb, $sql);
                if($result99){
                	//echo "Epdated in Player database Successfully";
                }else{
                	//echo "Update failed due to an error";
                	print_r($cnctdb->error);
                }

            }

        ?>


        <?php
            if(isset($_GET["match_id"]) && (isset($_GET["result_id"]))){
                require('connectdb.php');
                $match_id = $_GET["match_id"];

                //echo "".$match_id." and ".$player_name;

                $sql = "SELECT * FROM match_history WHERE match_id = '$match_id'";
                $result = mysqli_query($cnctdb, $sql);
                $row5 = mysqli_fetch_row($result);

        ?>

		       <div class="container">
		       		<br>
		       		<br>
		       		<form role="form" method="POST" action="Update_Scorecard.php?match_id=<?php echo $match_id;?>">
				    <div class="form-group">
				    	<label for="pwd">Team A:</label>
				        <input type="text" name="teamA" id="teamA" class="form-control"  placeholder="<?php echo $row5[1]; ?>">
				    </div>
				    <div class="form-group">
				    	<label for="pwd">Team B:</label>
				        <input type="text" name="teamB" id="teamB" class="form-control"  placeholder="<?php echo $row5[2]; ?>">
				    </div>
				    <div class="form-group">
				    	<label for="pwd">Winner:</label>
				        <input type="text" name="winner" id="winner" class="form-control"  placeholder="<?php echo $row5[3]; ?>">
				    </div>
				    <div class="form-group">
				    	<label for="pwd">Man of The Match:</label>
				        <input type="text" name="mom" id="mom" class="form-control"  placeholder="<?php echo $row5[4]; ?>">
				    </div>
				    <div class="form-group">
				    	<label for="pwd">Match date:</label>
				        <input type="text" name="match_date" id="match_date" class="form-control"  placeholder="<?php echo $row5[5]; ?>">
				    </div>
				    <div class="form-group">
				    	<label for="pwd">Place:</label>
				        <input type="text" name="place" id="place" class="form-control"  placeholder="<?php echo $row5[6]; ?>">
				    </div>
				    <div class="form-group">
				    	<label for="pwd">Toss:</label>
				        <input type="text" name="toss" id="toss" class="form-control"  placeholder="<?php echo $row5[7]; ?>">
				    </div>
				    <div class="form-group">
				    	<label for="pwd">First Batting Team:</label>
				        <input type="text" name="first_bat" id="first_bat" class="form-control"  placeholder="<?php echo $row5[8]; ?>">
				    </div>
				    <div class="form-group">
				    	<label for="pwd">Run Scored By Team A:</label>
				        <input type="text" name="scoreA" id="scoreA" class="form-control"  placeholder="<?php echo $row5[9]; ?>">
				    </div>
				    <div class="form-group">
				    	<label for="pwd">Run Scored By Team B:</label>
				        <input type="text" name="scoreB" id="scoreB" class="form-control"  placeholder="<?php echo $row5[10]; ?>">
				    </div>
				    <div class="form-group">
				    	<label for="pwd">Wicket Lost By A:</label>
				        <input type="text" name="wicketA" id="wicketA" class="form-control"  placeholder="<?php echo $row5[11]; ?>">
				    </div>
				    <div class="form-group">
				    	<label for="pwd">Wicket Lost By B:</label>
				        <input type="text" name="wicketB" id="wicketB" class="form-control"  placeholder="<?php echo $row5[12]; ?>">
				    </div>
				    <div class="form-group">
				    	<label for="pwd">Over Played By Team A:</label>
				        <input type="text" name="overA" id="overA" class="form-control"  placeholder="<?php echo $row5[13]; ?>">
				    </div>
				    <div class="form-group">
				    	<label for="pwd">Over Played By Team B:</label>
				        <input type="text" name="overB" id="overB" class="form-control"  placeholder="<?php echo $row5[14]; ?>">
				    </div>
				    <div class="form-group">
				    	<label for="pwd">Extra Given By Team A:</label>
				        <input type="text" name="extraA" id="extraA" class="form-control"  placeholder="<?php echo $row5[15]; ?>">
				    </div>
				    <div class="form-group">
				    	<label for="pwd">Extra Given By Team B:</label>
				        <input type="text" name="extraB" id="extraB" class="form-control"  placeholder="<?php echo $row5[16]; ?>">
				    </div>
				    <div class="form-group">
				    	<label for="pwd">First Umpire:</label>
				        <input type="text" name="umpireA" id="umpireA" class="form-control"  placeholder="<?php echo $row5[17]; ?>">
				    </div>
				    <div class="form-group">
				    	<label for="pwd">Second Umpire:</label>
				        <input type="text" name="umpireB" id="umpireB" class="form-control"  placeholder="<?php echo $row5[18]; ?>">
				    </div>
				    <div class="form-group">
				    	<label for="pwd">Match Referee:</label>
				        <input type="text" name="referee" id="referee" class="form-control"  placeholder="<?php echo $row5[19]; ?>">
				    </div>
				    <div class="form-group">
				    	<label for="pwd">Match Time:</label>
				        <input type="text" name="match_time" id="match_time" class="form-control"  placeholder="<?php echo $row5[20]; ?>">
				    </div>
				    <div class="form-group">
				    	<label for="pwd">Final Match Status:</label>
				        <input type="text" name="match_status" id="match_status" class="form-control"  placeholder="<?php echo $row5[21]; ?>">
				    </div>
				    <button type="submit" name="update5"  value="registration" class="btn btn-default" style="text-align:center;">Update</button>
		       </div>

       <?php
		   }

       ?>

       <?php
            if(isset($_POST["update5"])){
                require('connectdb.php');
                $match_id = $_GET["match_id"];
                //$teamAu=$teamBu=$winneru=$placeu=$match_dateu=$umpireAu=$umpireBu=$refereeu=$match_timeu=$match_statusu="";
                //$momu=$scoreAu=$scoreBu=$wicketAu=$wicketBu=$overAu=$overBu=$extraAu=$extraBu=$first_batu=$tossu="";
                $teamAu = $_POST["teamA"];
                $teamBu = $_POST["teamB"];
                $winneru = $_POST["winner"];
                $placeu = $_POST["place"];
                $match_dateu = $_POST["match_date"];
                $momu = $_POST["mom"];
                $tossu = $_POST["toss"];
                $scoreAu = $_POST["scoreA"];
                $scoreBu = $_POST["scoreB"];
                $wicketAu = $_POST["wicketA"];
                $wicketBu = $_POST["wicketB"];
                $overAu = $_POST["overA"];
                $overBu = $_POST["overB"];
                $extraAu = $_POST["extraA"];
                $extraBu = $_POST["extraB"];
                $first_batu = $_POST["first_bat"];
                $umpireAu = $_POST["umpireA"];
                $umpireBu = $_POST["umpireB"];
                $refereeu = $_POST["referee"];
                $match_timeu = $_POST["match_time"];
                $match_statusu = $_POST["match_status"];

                $sql = "SELECT * FROM match_history WHERE match_id = '$match_id'";

                $result = mysqli_query($cnctdb, $sql);
                $row5 = mysqli_fetch_row($result);
                if(strlen($teamAu) == 0) $teamAu = $row5[1];
                if(strlen($teamBu) == 0) $teamBu = $row5[2];
                if(strlen($winneru) == 0) $winneru = $row5[3];
                if(strlen($momu) == 0) $momu = $row5[4];
                if(strlen($match_dateu) == 0) $match_dateu = $row5[5];
                if(strlen($placeu) == 0) $placeu = $row5[6];
                if(strlen($tossu) == 0) $tossu = $row5[7];
                if(strlen($first_batu) == 0) $first_batu = $row5[8];
                if(strlen($scoreAu) == 0) $scoreAu = $row5[9];
                if(strlen($scoreBu) == 0) $scoreBu = $row5[10];
                if(strlen($wicketAu) == 0) $wicketAu = $row5[11];
                if(strlen($wicketBu) == 0) $wicketBu = $row5[12];
                if(strlen($overAu) == 0) $overAu = $row5[13];
                if(strlen($overBu) == 0) $overBu = $row5[14];
                if(strlen($extraAu) == 0) $extraAu = $row5[15];
                if(strlen($extraBu) == 0) $extraBu = $row5[16];
                if(strlen($umpireAu) == 0) $umpireAu = $row5[17];
                if(strlen($umpireBu) == 0) $umpireBu = $row5[18];
                if(strlen($refereeu) == 0) $refereeu = $row5[19];
                if(strlen($match_timeu) == 0) $match_timeu = $row5[20];
                if(strlen($match_statusu) == 0) $match_statusu = $row5[21];

                $sql  = "UPDATE match_history SET teamA='$teamAu', teamB='$teamBu', winner='$winneru', 
                        mom='$momu', match_date='$match_dateu', place='$placeu', toss='$tossu', 
                        first_bat='$first_batu', scoreA='$scoreAu',scoreB='$scoreBu', wicketA='$wicketAu', 
                        wicketB='$wicketBu', overA='$overAu', overB='$overBu',extraA='$extraAu',extraB='$extraBu', 
                        umpireA='$umpireAu', umpireB='$umpireBu', referee='$refereeu', match_time='$match_timeu',
                        match_status='$match_statusu' WHERE match_id = '$match_id'";

                $result2 = mysqli_query($cnctdb, $sql);
                if(!$result2){
                    //echo "Data Insertion Failed!";
                    print_r($cnctdb->error);
                }

            }

        ?>


<?php
  include("footer.php");
?>