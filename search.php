<?php       

header('Access-Control-Allow-Origin: *');
// error_reporting(0);
$servername = "localhost";
$username = "******";
$password = "**********";
$dbname = "**********";

$new = new mysqli($servername, $username, $password,$dbname);

if(!empty($_GET['dept'])){
    department_search();
} else if(!empty($_GET['key'])) {
    search_keyword();
}
// last_name LIKE '%{$name}%'");

function search_keyword()   {
    global $new;

    $key = $_GET['key'];
    $sql = "SELECT * FROM input WHERE name LIKE '%{$key}%' OR hospital LIKE '%{$key}%' OR place LIKE '%{$key}%'";
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
}

function department_search()    {
    global $new;

    $dept = $_GET['dept'];
    $sql = "SELECT * FROM input where department='".$dept."'";
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
}
?>