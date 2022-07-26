<?php
    if(!isset($_GET['coursename'])){
        header("location:addcourse.php");
        exit();
    }

    include('dbconn.php');

    $sql = "DELETE FROM course WHERE coursename = '". $_GET['coursename']."'";
    if(mysqli_query($conn,$sql)){
        echo "Course is deleted successfully.";
    }else{
        echo "Error in deleting";
	}
    header('location:addcourse.php');
    mysqli_close($conn);
?>
