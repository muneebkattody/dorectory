<?php

header('Access-Control-Allow-Origin: *');
// error_reporting(0);
$servername = "localhost";
$username = "******";
$password = "**********";
$dbname = "**********";
// Create connection
$new = new mysqli($servername, $username, $password,$dbname);

// Check connection
 if ($new->connect_error) {
     die("Connection failed: " . $conn->connect_error);
 }

            $sql = "SELECT * FROM input";
            //  Sort results based on GeoLocation #1
            // https://gist.github.com/statickidz/8a2f0ce3bca9badbf34970b958ef8479
            //
            // $sql = "SELECT * FROM input"
            //       ."ORDER BY ((lat-$user_lat)*(lat-$user_lat)) + "
            //       ."((lng - $user_lng)*(lng - $user_lng)) ASC";

            $result = $new->query($sql);

            $str = "{";
            $length = $result->num_rows;
            $count=0;
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                   $str.='"'.$row["id"].'":'.'{"name":"'.$row["name"].'","phone":"'.$row["phone"].'","dept":"'.$row["department"].'","hosp":"'.$row["hospital"].'","place":"'.$row["place"].'"}';
                   $count++;
                    if($count!=$length){
                        $str.=",";
                    }
                }
            }
                $str.="}";
                echo $str;
            ?>
