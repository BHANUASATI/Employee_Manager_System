<?php 

$id = $_GET["id"];

require_once "../connection.php";

$sql = "UPDATE emp_leave SET status = 'Canceled' WHERE id = '$id' ";
$result = mysqli_query($conn , $sql);
if($result){
    header("Location: manage_employee_leave.php?cancel-successfuly");
}

?>