<?php require_once( 'config/db.php') ?>
<?php
    $user_ip = getenv('REMOTE_ADDR');
    $geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
    $country = $geo["geoplugin_countryName"];
    $city = $geo["geoplugin_city"];
    $contactEmail=$_POST['contactEmailN'];

    // $conn = mysqli_connect('localhost:3306','cgv','Design@sdl123','cgv');
    if($con->connect_error){
        die('Connection Failed : '.$con->connect_error);
    }else{
        $stmt = $con->prepare("insert into newsletter(contactemail, country, city, ip)
            values(?, ?, ?, ?)");
        $stmt->bind_param("ssss",$contactEmail, $country, $city, $user_ip);
        $stmt->execute();
        echo "Your successfully subscribed. Thank you!";
        $stmt->close();
        $con->close();
    }

?>