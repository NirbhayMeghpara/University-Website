<?php
session_start();
    include('dbconn.php');

    if(!isset($_SESSION['user'])){
    header('location:adminlogin.php');
    }
    else 
    {
    if(isset($_POST['add']))
    {
    
        $coursename = $_POST['coursename'];
        $coursedetail = $_POST['coursedetail'];
    
    
        $sql = "INSERT INTO course(coursename,coursedetail) VALUES ('$coursename','$coursedetail')";

        if(mysqli_query($conn,$sql)){
            echo "Course is added successfully.";
        }
        else{
            echo "Something went wrong... Please insert again.".mysqli_connect_error($conn);
        }
        header('location:addcourse.php');
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
                        <a class="nav-link active" href="addcourse.php">Add Course</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="addfacility.php">Add Facilities</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="allcontact.php">Contact us</a>
                    </li>
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
                    
                    <form method="POST">
                        
                        <fieldset>
                            <legend><h2>Add Course Details</h2></legend>
                        
                        <fieldset class="form-group">
                            <label>Course Name</label> <input type="text" class="form-control" name="coursename" required>
                        </fieldset>

                        <fieldset class="form-group">
                            <label>Course Detail</label> <textarea class="form-control" name="coursedetail" rows="3" required></textarea>
                        </fieldset>
                            
                        <br>    
                        <button style="width:20%; font-size: 18px;" name="add" type="submit" class="btn btn-success">Add</button>
                        
                    </form>
                </div>
            </div>
        </div>

        <center>
        <table class='table table-bordered' style="width : 60%;">
            <tr>
                <th style="width : 16%;" >Course Name</th>
                <th>Course Detail</th>
                <th colspan="2">Actions</th>
            </tr>

            <?php
            $sql = "SELECT * FROM course";
            $result = mysqli_query($conn,$sql);

            while($row=mysqli_fetch_assoc($result)){
            ?>
            <tr>
                <td><?php echo $row['coursename']; ?></td>
                <td><?php echo $row['coursedetail']; ?></td>
                <td><a href="editcourse.php?coursename=<?php echo $row['coursename'];?>">Edit</a></td>
                <td><a href="deletecourse.php?coursename=<?php echo $row['coursename'];?>">Delete</aedit
            </tr>
            </tr>
            <?php } ?>
</body>
</html>
  
