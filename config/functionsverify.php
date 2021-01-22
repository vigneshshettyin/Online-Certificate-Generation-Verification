<?php

    //Clean String Values
    function clean($string) {
        return htmlentities($string);
    }

    //Validate if present and return the table
    function validate() {
        if(isset($_POST['validate'])) {
        $certificate_number = clean($_POST['cert_no']);

        $sql = "SELECT * FROM customers WHERE certificate_number='".$certificate_number."'";
        $query = Query($sql);
        confirm($query);
        $result = fetch_data($query);

        if(count_rows($query) == 1) {
            echo '
            <div class="table-title">
    <center><h3>Certificate number is valid</h3></center>
    </div>
    <table class="table-fill">
    <thead>
    </thead>
    <tbody class="table-hover">
    <tr>
    <td class="text-left">Name</td>
    <td class="text-left">'.$result['f_name'] . ' ' . $result['l_name'].'</td>
    </tr>
    <tr>
    <td class="text-left">Training name</td>
    <td class="text-left">'.$result['training_name'].'</td>
    </tr>
    <tr>
    <td class="text-left">Organization name</td>
    <td class="text-left">'.$result['college_name'].'</td>
    </tr>
    <tr>
    <td class="text-left">Date of certification</td>
    <td class="text-left">'.$result['created_at'].'</td>
    </tr>
    </tbody>
    </table>

            
            ';
        } else {
            echo '<div class="table-title-red">
            <center><h3>Certificate number is invalid</h3></center>
            </div>';
        }

    }
}

?>