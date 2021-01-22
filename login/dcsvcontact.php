<?php
//include database configuration file
include 'config/config.php';

//get records from database
$query = $conn->query("SELECT * FROM contact ORDER BY id ASC");

if($query->num_rows > 0){
    $delimiter = ",";
    $filename = "contact_" . date('Y-m-d') . ".csv";
    
    //create a file pointer
    $f = fopen('php://memory', 'w');
    
    //set column headers
    $fields = array('ID ', 'NAME', 'EMAIL ID', 'PHONE', 'RESPONSE');
    fputcsv($f, $fields, $delimiter);
    
    //output each row of the data, format line as csv and write to file pointer
    while($row = $query->fetch_assoc()){
       // $status = ($row['status'] == '1')?'Active':'Inactive'; ( (, $status) pass in $lineData )
        $lineData = array($row['id'], $row['name'], $row['email_id'], $row['phone'], $row['response']);
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