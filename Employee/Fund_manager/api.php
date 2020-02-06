<?php
header("Content-Type:application/json");

if (isset($_GET['id']) && $_GET['id']!="") {

	
	include('db.php');
	$empId = $_GET['id'];
	
	$sql = "SELECT * FROM employee.emp WHERE id=$empId";
	
	$result = $conn->query($sql);
	

	if(mysqli_num_rows($result)>0){
		
	while($row = mysqli_fetch_array($result))
	{
	$id= $row['id'];
	$name = $row['name'];
	$age = $row['age'];
	$salary = $row['salary'];
	response($id,$name,$age,$salary);
	}
	mysqli_close($con);
	
	}else {
		response(NULL,NULL,NULL,"No Record Found");
		//echo "No Record Found";
		}
}else{
	response(NULL, NULL, NULL,"Invalid Request");
	}

function response($id,$name,$age,$salary){
	$response['id'] = $id;
	$response['name'] = $name;
	$response['age'] = $age;
	$response['salary'] = $salary;
	
	$json_response = json_encode($response);
	echo $json_response;
}
?>