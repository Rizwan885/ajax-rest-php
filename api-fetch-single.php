<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: true');


$data=json_decode(file_get_contents('php://input'),true);

$student_id=$data['sid'];

include "config.php";

$sql="Select * from students WHERE id={$student_id}";

$result=mysqli_query($conn,$sql) or die("Query Failed !");

if(mysqli_num_rows($result) > 0)
{

    $data=mysqli_fetch_assoc($result);

    http_response_code(200);

    $output=json_encode(['message'=>'Successs','status'=>'200','data'=>$data]);

    echo $output;
}

else
{
    http_response_code(404);
    $output=json_encode(['message'=>'No Record Found','status'=>'404']);
    echo $output;

}

?>