<?php
include_once 'connection/connection.php';
$sql = "select * from student";
$result = mysqli_query($conn,$sql) or die("Sql Query failed.");
$output = "";
if(mysqli_num_rows($result) > 0){
 $output = '<table class="table table-responsive" border="1">
            <tr>
             <th>Id</th>
             <th>Name</th>  
             <th>Mobile No</th>
             <th>Created At</th>
             <th colspan="2">Action</th>
            </tr>';

            while($row = mysqli_fetch_assoc($result)){
                $output .= "<tr>
                              <td>{$row["id"]}</td>
                              <td>{$row["name"]}</td>
                              <td>{$row["mobileno"]}</td>
                              <td>{$row["CreatedAt"]}</td>
                              <td><button class='update-btn btn btn-success' data-uid='{$row["id"]}' data-bs-toggle='modal' data-bs-target='#exampleModal'>Update</button></td>
                              <td><button class='delete-btn btn btn-danger' data-did='{$row["id"]}'>Delete </button></td>
                            </tr>";
            }
$output .= "</table>";
mysqli_close($conn);
echo $output;
}else{
    $output = '<table class="table table-responsive" border="1">
    <tr>
     <th>Id</th>
     <th>Name</th>  
     <th>Mobile No</th>
     <th>Created At</th>
    </tr>
    
    <tr class="text-center">
    <td colspan="4"> No Data Found </td>
    </tr>
    </table>';
    echo $output;
}
?>
