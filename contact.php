<?php require_once( 'config/db.php') ?>
<?php
    $fName=$_POST['fName'];
    $contactEmail=$_POST['contactEmail'];
    $contactPhone=$_POST['contactPhone'];
    $contactMessage=$_POST['contactMessage'];

    // $conn = mysqli_connect('localhost:3306','cgv','Design@sdl123','cgv');
    if($con->connect_error){
        die('Connection Failed : '.$con->connect_error);
    }else{
        $stmt = $con->prepare("insert into contact(name, email_id, phone, response)
            values(?, ?, ?, ?)");
        $stmt->bind_param("ssss",$fName, $contactEmail, $contactMessage, $contactPhone);
        $stmt->execute();
        echo "Your message has been sent. Thank you!";
        $stmt->close();
        $con->close();
    }

?>