<?php 

    // database connection
    require_once "../connection.php";
    $id = $_GET["id"];

    $sql = "DELETE FROM emp_leave WHERE id = '$id' ";
    $result= mysqli_query($conn , $sql);
    if($result){
        header("Location: leave_status.php?delete-success-id=" .$id);
    }
?>