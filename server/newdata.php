<?php
    header('Access-Control-Allow-Origin: *');
// error_reporting(0);
$servername = "localhost";
$username = "";
$password = "";
$dbname = "";
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


             $query = "INSERT INTO input(name,department,hospital,place) values('".$name."','".$dept."','".$hosp."','".$place."')";
             if($new->query($query))    {
                 echo "Data Uploaded Successfully!";    
              }

             
    ?>
