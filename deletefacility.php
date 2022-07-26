<?php
    if(!isset($_GET['facilityname'])){
        header("location:addcourse.php");
        exit();
    }

    include('dbconn.php');

    $sql = "DELETE FROM facility WHERE facilityname = '". $_GET['facilityname']."'";
    if(mysqli_query($conn,$sql)){
        echo "Facility is deleted successfully.";
    }else{
        echo "Error in deleting";
	}
    header('location:addfacility.php');
    mysqli_close($conn);
?>
