<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

include "config.php";

$sql="Select * from students";

$result=mysqli_query($conn,$sql) or die("Query Failed !");

if(mysqli_num_rows($result) > 0)
{

    $data=mysqli_fetch_all($result,MYSQLI_ASSOC);

    $output=json_encode(['status'=>'200','data'=>$data]);

    echo $output;
}

else
{
    $output=json_encode(['message'=>'No Record Found','status'=>'404']);
    echo $output;

}




?>