<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Origin,Access-Control-Allow-Methods,Authorization,X-Requested-With');
include "config.php";


$data=json_decode(file_get_contents("php://input"),true);

$sid=$data['sid'];
$sname=$data['sname'];
$sage=$data['sage'];
$scity=$data['scity'];

$sql="UPDATE students SET name='{$sname}',age='{$sage}',city='$scity' WHERE id={$sid}";

if(mysqli_query($conn,$sql))
{

    $output=json_encode(["message"=>"Student Updated Successfully!","status"=>true]);
    http_response_code(200);
    echo $output;
}
else
{
    $output=json_encode(["message"=>"Cannot Update!!","status"=>false]);
    http_response_code(400);
    echo $output;
}



?>