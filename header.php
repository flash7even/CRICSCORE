<?php
  session_start();
  require('connectdb.php');
  $Email = "";
?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
    <title>Cricket Live Scores,Results and More!</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="canvasjs.min.js"> </script>
    <link rel="stylesheet" type="text/css" href="style_cricket.css">
  </head>
  <body bgcolor="#E6FFFF">

  <nav class="navbar navbar">
    <div class="container-fluid" style="background-color:black;font-size: 22px;font-style: oblique;font-family:calibri;">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
        </button>
        <a class="navbar-brand" href="cricket_live_score.php">CRICSCORE</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav" style="">

          <li style="background-color:#B2E0FF;color:red;"><a href="Live_Scorecard.php">Live Score Page</a></li>

          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Domestic <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="Domestic_Team.php?tournament_name=IPL">BPL</a></li>
              <li><a href="Domestic_Team.php?tournament_name=IPL">IPL</a></li>
              <li><a href="Domestic_Team.php?tournament_name=IPL">County</a></li>
              <li><a href="Domestic_Team.php?tournament_name=IPL">Caribbean T20</a></li>
              <li><a href="Domestic_Team.php?tournament_name=IPL">Big Bash T20</a></li>
            </ul>
          </li>

          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Countries <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="Team_Info.php?team_id=1">Bangladesh</a></li>
              <li><a href="Team_Info.php?team_id=2">Australia</a></li>
              <li><a href="Team_Info.php?team_id=3">Newzealand</a></li>
              <li><a href="Team_Info.php?team_id=5">South Africa</a></li>
              <li><a href="Team_Info.php?team_id=4">England</a></li>
              <li><a href="Team_Info.php?team_id=8">Srilanka</a></li>
              <li><a href="Team_Info.php?team_id=6">India</a></li>
              <li><a href="Team_Info.php?team_id=7">Pakistan</a></li>
              <li><a href="Team_Info.php?team_id=9">Westindies</a></li>
            </ul>
          </li>

          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Ranking <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="Ranking.php">Test</a></li>
              <li><a href="Ranking.php">ODI</a></li>
              <li><a href="Ranking.php">Twenty 20</a></li>
            </ul>
          </li>

          <li><a href="Fixture.php">Fixtures</a></li>

          <li><a href="Result.php">Results</a></li>

          

          <li><a href="Editorial_Home.php">BLOG</a></li>

          <li><a href="About_us.php">About Us</a></li>
          
          <li><a href="#poll">Poll</a></li>
          <?php
              if(isset($_SESSION['email'])){
                $Email = $_SESSION['email'];
                $sql = "SELECT * FROM admin WHERE Email = '$Email'";
                $result = mysqli_query($cnctdb, $sql);
                $total = mysqli_num_rows($result);
                if($result && $total!=0){
          ?>
              <li style="background-color:"><a href="Update_Scorecard.php">Update Scorecard</a></li>

            <?php
                  }
                }
             ?>

        </ul>
      </div>

      </nav>