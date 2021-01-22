<?php 

    //Connect to the database
    $con = mysqli_connect('localhost:3306','cgv','Design@sdl123','cgv');

    //Function Clean String Values
    function escape($string) {
        global $con;
        return mysqli_real_escape_string($con,$string);
    }

    //Query Function
    function Query($query) {
        global $con;
        return mysqli_query($con,$query);
    }

    //Confirmation function
    function confirm($result) {
        global $con;
        if(!$result) {
            die('Query Failed'.mysqli_error($con));
        }
    }

    //Fetch Data from Database
    function fetch_data($result) {
        return mysqli_fetch_array($result);
    }

    //Count number of row in table
    function count_rows($result) {
        return mysqli_num_rows($result);
    }
    
?>