<?php
    header('Access-Control-Allow-Origin: *');
// error_reporting(0);
$servername = "localhost";
<<<<<<< HEAD:newdata.php
$username = "******";
$password = "**********";
$dbname = "**********";
=======
$username = "";
$password = "";
$dbname = "";
>>>>>>> b960d1c531901f9f1bc6d062e2fc7705a121b0a0:server/newdata.php
// Create connection
$new = new mysqli($servername, $username, $password,$dbname);

// Check connection
 if ($new->connect_error) {
     die("Connection failed: " . $conn->connect_error);
 }

    $name = $_POST['name'];
    $dept = $_POST['dept'];
    $place = $_POST['place'];
    $hosp = $_POST['hosp'];
    $phone = $_POST['phone'];


    $query = "INSERT INTO input(name,department,hospital,place,phone) values('".$name."','".$dept."','".$hosp."','".$place."','".$phone."')";
    if($new->query($query))    {
        echo "Data Uploaded Successfully!";    
    }

             
    ?>
