<?php
include('dbconn.php');
    if(!isset($_GET['facilityname'])){
        header("location:addfacility.php");
        exit();
    }
    else 
    {
    if(isset($_POST['edit']))
    {
        $facility=$_GET['facilityname'];
        $image = $_POST['image'];
        $facilityname = $_POST['facilityname'];
        $facilitydetail = $_POST['facilitydetail'];
    
    
        $sql = "UPDATE facility SET image='$image', facilityname='$facilityname', facilitydetail='$facilitydetail' WHERE facilityname='$facility'";

        if(mysqli_query($conn,$sql)){
            echo "Facility details is updated successfully.";
        }
        else{
            echo "Something went wrong... Please insert again.".mysqli_connect_error($conn);
        }
        header('location:addfacility.php');
        mysqli_close($conn);
    }
    }
?>
