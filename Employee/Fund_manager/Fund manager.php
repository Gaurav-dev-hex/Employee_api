<html>
<head>
<title>Employee_Demo</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
	<table>
		<tr>
		<th>
		<h3><b>Employee's Data</b></h3>   
</th>
			</tr>
		<tr>
			
			<td>
<div class="container-fluid" style="padding-left:3%;">

<form action="" method="POST">
<label>Enter Employee ID:</label><br />
<input type="number" name="id" placeholder="Enter Employee ID" required/>
<br /><br />
<button type="submit" name="submit">Submit</button>
</form>    
<?php
if (isset($_POST['id']) && $_POST['id']!="") {
	$empId = $_POST['id'];
	$url = "http://localhost:81/Employee/Fund_manager/api.php?id=".$empId;
	$client = curl_init($url);

	curl_setopt($client,CURLOPT_RETURNTRANSFER,true);

	$response = curl_exec($client);
	
	$result = json_decode($response);
	//echo 'debug15';
	echo "<table>";
	echo "<tr><td>Employee ID:</td><td>$result->id</td></tr>";
	echo "<tr><td>Name:</td><td>$result->name</td></tr>";
	echo "<tr><td>Age:</td><td>$result->age</td></tr>";
	echo "<tr><td>Salary:</td><td>$result->salary</td></tr>";
	echo "</table>";
}
$dataPoints = array( 
	array("label"=>"RAM", "y"=>18.91891891891892),
	array("label"=>"ROHIT", "y"=>40.54054054054054),
	array("label"=>"SHAM", "y"=>40.54054054054054),
	//array("label"=>"15478959", "y"=>27.27272727272727),
//	array("label"=>"Edge", "y"=>4.29),
	//array("label"=>"Others", "y"=>4.59)
)
    ?>
<br />
<strong>Sample Employee IDs for Demo:</strong><br />
1<br />
2<br />
3<br />
4
<br /><br />
</div>
</td>
<?php
$dataPoints = array( 
	array("label"=>"RAM", "y"=>18.91891891891892),
	array("label"=>"ROHIT", "y"=>40.54054054054054),
	array("label"=>"SHAM", "y"=>40.54054054054054),
	//array("label"=>"15478959", "y"=>27.27272727272727),
//	array("label"=>"Edge", "y"=>4.29),
	//array("label"=>"Others", "y"=>4.59)
)
?>
<td>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</td>
</table>
</body>
</html>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() {
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title: {
		text: "Salary"
	},
	subtitles: [{
		text: "Records"
	}],
	data: [{
		type: "pie",
		yValueFormatString: "#,##0.00\"%\"",
		indexLabel: "{label} ({y})",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
<body>

</body>
</html>             