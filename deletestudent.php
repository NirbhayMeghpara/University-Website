<?php
    if(!isset($_GET['sid']) || !ctype_digit($_GET['sid'])){
        header("location:admin.php");
        exit();
    }

    include('dbconn.php');

    $sql = "DELETE FROM student WHERE sid = '". $_GET['sid']."'";
    if(mysqli_query($conn,$sql)){
        echo "Student is deleted successfully.";
    }else{
        echo "Error in deleting";
	}
    header('location:admin.php');
    mysqli_close($conn);
?>
