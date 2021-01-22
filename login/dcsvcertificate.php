<?php
//include database configuration file
include 'config/config.php';

//get records from database
$query = $conn->query("SELECT * FROM customers ORDER BY id ASC");

if($query->num_rows > 0){
    $delimiter = ",";
    $filename = "certificate_" . date('Y-m-d') . ".csv";
    
    //create a file pointer
    $f = fopen('php://memory', 'w');
    
    //set column headers
    $fields = array('ID ', 'FIRST NAME', 'LAST NAME', 'GENDER', 'ADDRESS', 'CITY', 'STATE', 'PHONE', 'EMAIL', 'CERTIFICATE NUMBER', 'TRAINING NAME', 'MARKS', 'ORGANIZATION NAME', 'DATE OF BIRTH', 'CREATED AT');
    fputcsv($f, $fields, $delimiter);
    
    //output each row of the data, format line as csv and write to file pointer
    while($row = $query->fetch_assoc()){
       // $status = ($row['status'] == '1')?'Active':'Inactive'; ( (, $status) pass in $lineData )
        $lineData = array($row['id'], $row['f_name'], $row['l_name'], $row['gender'], $row['address'],$row['city'], $row['state'], $row['phone'], $row['email'], $row['certificate_number'], $row['training_name'], $row['marks'], $row['college_name'], $row['date_of_birth'], $row['created_at']);
        fputcsv($f, $lineData, $delimiter);
    }
    
    //move back to beginning of file
    fseek($f, 0);
    
    //set headers to download file rather than displayed
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');
    
    //output all remaining data on a file pointer
    fpassthru($f);
}
if($query->num_rows == 0){
    echo 'No Data Found!';
}
exit;

?>