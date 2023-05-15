<?php
include_once 'connection/connection.php';
$sId = $_POST['studentId'];
$sql = "delete from student where id = $sId";
$result = mysqli_query($conn,$sql);
if($result){
  echo 1;
}else{
  echo 0;  
}
?>