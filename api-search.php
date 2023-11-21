<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: true');


// $data=json_decode(file_get_contents('php://input'),true);

// $student_id=$data['sid'];

include "config.php";

$search_value=isset($_GET['search'])?$_GET['search']:die();



$sql="Select * from students WHERE name like '%{$search_value}%'";

$result=mysqli_query($conn,$sql) or die("Query Failed !");

if(mysqli_num_rows($result) > 0)
{

    $data=mysqli_fetch_all($result,MYSQLI_ASSOC);

    http_response_code(200);

    $output=json_encode(['status'=>true,'data'=>$data]);

    echo $output;
}

else
{
    // http_response_code(404);
    $output=json_encode(['message'=>'No Record Found','status'=>false]);
    echo $output;

}

?>