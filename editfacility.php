<?php
session_start();
    include('dbconn.php');

    if(!isset($_SESSION['user'])){
    header('location:adminlogin.php');
    }
    else {
        if(isset($_POST['add'])){

            $image = $_POST['image'];
            $facilityname = $_POST['facilityname'];
            $facilitydetail = $_POST['facilitydetail'];

            $sql = "INSERT INTO facility(image,facilityname,facilitydetail) VALUES ('$image','$facilityname','$facilitydetail')";
            
            if(mysqli_query($conn,$sql)){
                header('location:addfacility.php');
            }
            else{
                echo "Something went wrong... Please insert again.".mysqli_connect_error($conn);
            }
            mysqli_close($conn);
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin Panel</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
            crossorigin="anonymous">
</head>
<body>
        <h2 align="center"> Admin Dashboard </h2>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="admin.php">View All Student</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="addcourse.php">Add Course</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="addfacility.php">Add Facilities</a>
                    </li>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="allcontact.php">Contact us</a>
                </ul>
            </div>

                <?php
                    $adminid=$_SESSION['user'];
                    $result=mysqli_query($conn,"SELECT username from tbladmin where ID='$adminid'");
                    $row=mysqli_fetch_array($result);
                    $name=$row['username']; ?>

            <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#"><h5><?php echo $name; ?></h5></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>

        
        <div class="container col-md-5">
            <div class="card" style="margin: 60px">
                <div class="card-body" >
                    
                    <form method="POST" action="aftereditfacility.php?facilityname=<?php echo $_GET['facilityname']; ?>">
                    
                    <?php
                        $fname=$_GET['facilityname'];
                        $result=mysqli_query($conn,"SELECT * from facility where facilityname='$fname'");
                        $row=mysqli_fetch_array($result);
                        $facilityname=$row['facilityname'];
                        $facilitydetail=$row['facilitydetail'];
                    ?>

                        <fieldset>
                            <legend><h2>Update Facility Details</h2></legend>

                            <fieldset class="form-group">
                                <label>Facility Image: </label> &ensp;<input type="file" name="image" required>
                            </fieldset>
                            
                            <fieldset class="form-group">
                                <label>Facility Name</label> <input type="text" class="form-control" name="facilityname" value="<?php echo $facilityname; ?>" required>
                            </fieldset>
                            
                            <fieldset class="form-group">
                                <label>Facility Detail</label> <textarea class="form-control" name="facilitydetail" rows="3" required><?php echo $facilitydetail; ?></textarea>
                            </fieldset>
                        
                        <button style="width:20%; font-size: 18px;" name="edit" type="submit" class="btn btn-success">Edit</button>
                        
                    </form>
                </div>
            </div>
        </div>
</body>
</html>
  
