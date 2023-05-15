<?php
include_once 'connection/connection.php';

$student_id = $_POST["stud_id"];
$student_name = $_POST["stud_name"];
$student_mobile = $_POST["stud_mobile"];

$sql = "UPDATE student SET name='$student_name',mobileno='$student_mobile' WHERE id = $student_id";
$result = mysqli_query($conn,$sql);
if($result){
    echo 1;
}else{
    echo 0;
}

