<?php
include('dbconn.php');
    if(!isset($_GET['coursename'])){
        header("location:addcourse.php");
        exit();
    }
    else 
    {
    if(isset($_POST['edit']))
    {
        $course=$_GET['coursename'];
        $coursename = $_POST['coursename'];
        $coursedetail = $_POST['coursedetail'];
    
    
        $sql = "UPDATE course SET coursename='$coursename', coursedetail='$coursedetail' WHERE coursename='$course'";

        if(mysqli_query($conn,$sql)){
            echo "Course is updated successfully.";
        }
        else{
            echo "Something went wrong... Please insert again.".mysqli_connect_error($conn);
        }
        header('location:addcourse.php');
        mysqli_close($conn);
    }
    }
?>
