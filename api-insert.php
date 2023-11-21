<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Origin,Access-Control-Allow-Methods,Authorization,X-Requested-With');
include "config.php";
$data=json_decode(file_get_contents('php://input'),true);


 $sname=$data['sname'];
 $sage=$data['sage'];
 $scity=$data['scity'];

 $sql="INSERT INTO students(name,age,city) VALUES('{$sname}','{$sage}','{$scity}')";

 
$result=mysqli_query($conn,$sql);
 if($result)
 {
    $output=json_encode(['message'=>'Student Record Inserted','status'=>true]);
    http_response_code(200);
    echo $output;
 }
 else
 {
    $output=json_encode(['message'=>'Cannot Insert Record','status'=>false]);
    http_response_code(409);

    echo $output;
 }


?>
