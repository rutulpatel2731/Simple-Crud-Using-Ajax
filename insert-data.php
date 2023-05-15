<?php
include_once 'connection/connection.php';

$user_name = $_POST['name'];
$mobileNo = $_POST['mobile'];

$sql = "INSERT INTO `student`(`name`, `mobileno`, `CreatedAt`) VALUES 
('$user_name',$mobileNo,current_timestamp())";
$result = mysqli_query($conn,$sql);
if($result){
    echo 1;
}else{
    echo 0;
}
?>