<?php
	include_once 'config.php';
	if(isset($_POST['submit'])){
		if($_FILES['csv_data']['name']){
			
			$arrFileName = explode('.',$_FILES['csv_data']['name']);
			if($arrFileName[1] == 'csv'){
				$handle = fopen($_FILES['csv_data']['tmp_name'], "r");
				while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
					$firstName = mysqli_real_escape_string($conn,$data[0]);
					$lastName = mysqli_real_escape_string($conn,$data[1]);
					$gender = mysqli_real_escape_string($conn,$data[2]);
					$certificateNumber = mysqli_real_escape_string($conn,$data[3]);
					$trainingName = mysqli_real_escape_string($conn,$data[4]);
					$trainingmarks = mysqli_real_escape_string($conn,$data[5]);
					$organizationName = mysqli_real_escape_string($conn,$data[6]);
					$date = date("Y/m/d");
					$import="INSERT into customers(f_name,l_name,gender,certificate_number,training_name,marks,college_name,created_at) values('$firstName','$lastName','$gender','$certificateNumber','$trainingName','$trainingmarks','$organizationName','$date')";
					mysqli_query($conn,$import);
				}
				fclose($handle);
				print "Import done";
			}
		}
	}
?>
<html>
	<head>
		<title> CSV </title>
	<head>
	<body>
		<form method='POST' enctype='multipart/form-data'>
			Upload CSV: <input type='file' name='csv_data' /> <input type='submit' name='submit' value='Upload CSV' />
		</form>
	</body>
</html>