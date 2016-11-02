<?php
  include("header.php");
?>

<?php
	
	function create_file(){
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

		echo "File Created Successfully!Press ok to confirm.";
	}
	echo "";
?>

<div id="chartContainer" style="height: 600px; width: 80%;">
	
	<script type="text/javascript">

		jQuery.get('database_info.txt', function(data) {
		    var res = data.split(",");
		
		    var chart = new CanvasJS.Chart("chartContainer",
		    {
		      title:{
		        text: res[0],   
		      },
		      axisY: {
		        title: "  "
		      },
		      legend: {
		     	verticalAlign: "bottom",
		        horizontalAlign: "center"
		      },
		      theme: "theme3",
		      data: [
		 
		      {       
		        type: "column", 
		        showInLegend: true,
		        legendMarkerColor: "grey",
		        legendText: "@cricscore.com",
		        dataPoints: [     
		        {y: parseInt(res[5])+1,  label: res[1]},
		        {y: parseInt(res[6])+1,  label: res[2]},
		        {y: parseInt(res[7])+1,  label: res[3]},
		        {y: parseInt(res[8])+1,  label: res[4]},    
		        ]
		      },  
		      ]
		    });
	    chart.render();
	    });

  </script>

 </div>

 <?php
  include("footer.php");
?>