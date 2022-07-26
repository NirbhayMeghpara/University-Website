<?php
if(!isset($_GET['id'])){
    header("location:addcourse.php");
    exit();
}

include('dbconn.php');

$sql = "DELETE FROM contact WHERE id='".$_GET['id']."'";
if(mysqli_query($conn,$sql)){
    echo "Facility is deleted successfully.";
}else{
    echo "Error in deleting";
}
header('location:allcontact.php');
mysqli_close($conn);
?>