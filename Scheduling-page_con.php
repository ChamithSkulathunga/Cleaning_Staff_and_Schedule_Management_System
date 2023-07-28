<?php

$employee_id = filter_input(INPUT_POST, 'employee_id');
$working_place = filter_input(INPUT_POST, 'working_place');
$date = filter_input(INPUT_POST, 'date');
$time_from = filter_input(INPUT_POST, 'time_from');
$time_to = filter_input(INPUT_POST, 'time_to');


	if(!empty($employee_id)) {
	if(!empty($working_place)) {
	if(!empty($date)) {
	if(!empty($time_from)) {
	if(!empty($time_to)) {
	
		
		$host = "localhost";
		$dbusername = "root";
		$dbpassword = "";
		$dbname = "site1";
		
		
		$oconn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
		
		
		if(mysqli_connect_error()) {
			die('Connect Error ('.mysqli_connect_errno().')'.mysqli_connect_errno());
			
		}
		else{
			$sql = "INSERT INTO schedule (employee_id,working_place,date,time_from,time_to) values ('$employee_id','$working_place','$date','$time_from','$time_to')";
			if ($oconn->query($sql)) {
				echo "New Record is Inserted Sucessfully";
				header("Location: Technician-DASHBOARD.php");
				die;
			}
			else{
				echo "Error: ". $sql . "<br>". $oconn->error;
				
			}
			$oconn->close(); 
			
		}
	}
	else{
		echo "1 ";
		die();
	}
	
}
else{
	echo "2 ";
		die();
	
}
}
else{
	echo "3 ";
		die();
	
}
}
else{
	echo "4 ";
		die();
	
}
}
else{
	echo "5 ";
		die();
	
}
?>
