<?php
session_start();
    include('dbconn.php');

    if(!isset($_SESSION['user'])){
    header('location:adminlogin.php');
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
                        <a class="nav-link" href="addfacility.php">Add Facilities</a>
                    </li>
                    <li class="nav-item active">
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

        <center>
            <br><br>
            <table class='table table-bordered' style="width : 70%;">
            <tr>
                <th>ID.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Actions</th>
            </tr>

            <?php
            $sql = "SELECT * FROM contact";
            $result = mysqli_query($conn,$sql);

            while($row=mysqli_fetch_assoc($result)){
            ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['subject']; ?></td>
                <td><?php echo $row['message']; ?></td>
                <td><a href="deletecontact.php?id=<?php echo $row['id'];?>">Delete</a></td>
            </tr>
            <?php } ?>
                
        </center>
</body>
</html>