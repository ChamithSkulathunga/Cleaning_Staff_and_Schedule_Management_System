<?php

$user_id = filter_input(INPUT_POST, 'user_id');
$type = filter_input(INPUT_POST, 'type');
$full_name = filter_input(INPUT_POST, 'full_name');
$address = filter_input(INPUT_POST, 'address');
$email = filter_input(INPUT_POST, 'email');
$mobile_number = filter_input(INPUT_POST, 'mobile_number');
$company_id_no = filter_input(INPUT_POST, 'company_id_no');
$company_name = filter_input(INPUT_POST, 'company_name');
$salary_complete_last_month = filter_input(INPUT_POST, 'salary_complete_last_month');
$item = filter_input(INPUT_POST, 'item');
$working_place = filter_input(INPUT_POST, 'working_place');
$description = filter_input(INPUT_POST, 'description');
$password = filter_input(INPUT_POST, 'password');


	if(!empty($user_id)) {
	if(!empty($type)) {
	if(!empty($full_name)) {
	if(!empty($address)) {
	if(!empty($email)) {
	if(!empty($mobile_number)) {
	if(!empty($company_id_no)) {
	if(!empty($company_name)) {
	if(!empty($salary_complete_last_month)) {
		
	if(!empty($item)) {
		
	if(!empty($working_place)) {
	if(!empty($description)) {
		if(!empty($password)) {
		
		$host = "localhost";
		$dbusername = "root";
		$dbpassword = "";
		$dbname = "site1";
		
		
		$oconn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
		
		
		if(mysqli_connect_error()) {
			die('Connect Error ('.mysqli_connect_errno().')'.mysqli_connect_errno());
			
		}
		else{
			$sql = "INSERT INTO user (user_id,type,full_name,address,email,mobile_number,company_id_no,company_name,salary_complete_last_month,item,working_place,description,password) values ('$user_id','$type','$full_name','$address','$email','$mobile_number','$company_id_no','$company_name','$salary_complete_last_month','$item','$working_place','$description','$password')";
			if ($oconn->query($sql)) {
				echo "New Record is Inserted Sucessfully";
				header("Location: Admin-DASHBOARD.php");
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
}
else{
	echo " 6";
		die();
	
}
}
else{
	echo "7 ";
		die();
	
}
}
else{
	echo "8 ";
		die();
	
}
}
else{
	echo "9 ";
		die();
	
}
}
else{
	echo "10 ";
		die();
	
}
}
else{
	echo "11 ";
		die();
	
}
}
else{
	echo "12 ";
		die();
	
}
}
else{
	echo "12 ";
		die();
	
}
?>
