<?php
include_once 'connection/connection.php';

$limit_per_page = 3;
// get the page number from lodatable().
$page = "";
if(isset($_POST['page_no'])){
  $page = $_POST['page_no'];
}else{
    $page =1;
}

$offset  = ($page-1)*$limit_per_page;


$sql = "select * from student LIMIT $offset,$limit_per_page";
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


$sql_total = "select * from student";
$records = mysqli_query($conn,$sql_total) or die("Sql Query failed.");
$total_records = mysqli_num_rows($records);
$total_pages = ceil($total_records/$limit_per_page);

$output .= '<div id="pagination">';
for($i=1;$i<=$total_pages;$i++){ 
    if($i == $page){
     $class_name = "active";
    }else{
        $class_name = "";
    }
    $output .= "<a href='' class='{$class_name}' id='{$i}'> {$i} </a>";    
}

$output .='</div>';

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
