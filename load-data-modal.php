<?php
include_once 'connection/connection.php';
$update_id = $_POST['Id'];
$sql = "select * from student where id = $update_id";
$result = mysqli_query($conn, $sql)  or die("Sql Query failed.");
$output = "";
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $output .= "
  <form action=''>
  <div class='form-group mt-5 mb-4'>
      <label  class='mb-2'>Enter Name</label>
      <input type='hidden' id='hidden-id' class='form-control' value='{$row["id"]}'>
      <input type='text' id='uname' placeholder='Enter Name' class='form-control' value='{$row["name"]}'>
  </div>
  <div class='form-group mb-4'>
      <label for=' class='mb-2'>Enter Mobile Number</label>
      <input type='text'  id='umobile' placeholder='Enter Mobile Number' class='form-control'  value='{$row["mobileno"]}'>
  </div>

  <div class='form-group mb-4 text-center'>
      <button type='submit' id='update-data' class='btn btn-primary'>Update</button>
  </div>
</form>
  ";
    }
    echo $output;
} else {
    echo "Record Not Found";
}
