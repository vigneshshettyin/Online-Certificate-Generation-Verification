<?php require_once( 'config/db.php') ?>
<?php
    $fName=$_POST['fName'];
    $contactEmail=$_POST['contactEmail'];
    $contactPhone=$_POST['contactPhone'];
    $rating=$_POST['inlineRadioOptions'];
    $contactMessage=$_POST['contactMessage'];

    // $conn = mysqli_connect('localhost:3306','cgv','Design@sdl123','cgv');
    if($con->connect_error){
        die('Connection Failed : '.$con->connect_error);
    }else{
        $stmt = $con->prepare("insert into feedback(name, email_id, phone, rating, feedback)
            values(?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss",$fName, $contactEmail,$contactMessage, $rating, $contactPhone);
        $stmt->execute();
        echo "Your feedback has been sent. Thank you!";
        $stmt->close();
        $con->close();
    }

?>