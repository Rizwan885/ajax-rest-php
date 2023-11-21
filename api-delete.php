<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Origin,Access-Control-Allow-Methods,Authorization,X-Requested-With');
include "config.php";


$data=json_decode(file_get_contents("php://input"),true);

$sid=$data['sid'];


$sql="DELETE FROM students WHERE id={$sid}";

if(mysqli_query($conn,$sql))
{

    $output=json_encode(["message"=>"Student Deleted Successfully!","status"=>true]);
    http_response_code(200);
    echo $output;
}
else
{
    $output=json_encode(["message"=>"Cannot Delete!!","status"=>false]);
    http_response_code(500);
    echo $output;
}



?>