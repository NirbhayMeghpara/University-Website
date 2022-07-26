<?php
session_start();
    include('dbconn.php');

    if(!isset($_SESSION['user'])){
    header('location:login.html');
    }
?>

<!DOCTYPE html>
<html>
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap Cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <!-- Main Css -->
    <link rel="stylesheet" href="styles.css">
    
    <title>University Website</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
    

</head>
<body>
<section class="sub-header">
        <nav>
            <img src="images/bently.png">
            <div class="nav-links" id="navLinks">
                <i class="fa fa-times" onclick="hideMenu()"></i>

                <?php
                    $sid=$_SESSION['user'];
                    $result=mysqli_query($conn,"SELECT username from student where sid='$sid'");
                    $row=mysqli_fetch_array($result);
                    $name=$row['username']; ?>    

                <ul>
                    <li><a href="project.php">HOME</a></li>
                    <li><a href="course.php">COURSE</a></li>
                    <li><a href="blog.php">BLOG</a></li>
                    <li><a href="about.php">ABOUT</a></li>
                    <li><a href="contact.php">CONTACT</a></li>
                </ul>
                <h6><?php echo $name; ?></h6>
                <div class="login">
                    <button onclick="location.href='userlogout.php'" class="myButton">Logout</button>
                </div>
            </div>
            
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
        <h1>Our Courses</h1>
    </section>


    <!-- Course content -->
    <section class="course">
        <h1>Courses We Offer </h1>  
        <p>Learn at the comfort of your own home. </p>

        <?php
            $result=mysqli_query($conn,"SELECT * from course"); 
        ?>
            <div class="row1" style=" margin-top: 5%; row-gap: 30px; column-gap: 40px; grid-template-columns: auto auto auto;             display: grid;" > 

        <?php while($row=mysqli_fetch_assoc($result)){    
                $name=$row['coursename'];
                $detail=$row['coursedetail'];
                ?>
                    <div class="course-col">
                        <h3><?php echo $name;?></h3>
                        <p><?php echo $detail;?></p> 
                    </div>
                <?php } ?> 
            </div>
    </section>

    <!-- Facilities -->
    
    <section class="facilities">
        <h1>Our Facilities</h1>
        <p>Contributes to Intellect</p>

        <?php
            $result=mysqli_query($conn,"SELECT * from facility");
        ?>
            <div class="row1" style=" margin-top: 5%; row-gap: 30px; column-gap: 40px; grid-template-columns: auto auto auto;             display: grid;" > 

        <?php while($row=mysqli_fetch_assoc($result)){
                $image=$row['image'];
                $name=$row['facilityname'];
                $detail=$row['facilitydetail'];
                ?>   
                    <div class="facilities-col">
                        <img src="images/<?php echo $image;?>" height="340px">
                        <h3><?php echo $name;?></h3>
                        <p><?php echo $detail;?></p>
                    </div>
            <?php } ?>
        </div>
    </section>

    <!-- Footer -->


    <footer class="footer">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer-about">
                        <div class="footer-logo">
                            <a href="#"><img src="images/bently.png" style="width: 160px;" alt=""></a>
                        </div>
                        <p>Every EXPERT was once a BEGINNER....&ensp;&nbsp;-&nbsp;So start and this is the beginning of anything you want...</p>
                        <a href="#"><img src="img/payment.png" alt=""></a>
                    </div>
                </div>

                <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
                    <div class="footer-widget">
                        <h6>Courses</h6>
                        <ul>
                            <li><a href="#">Business Analytics</a></li>
                            <li><a href="#">Computer Science</a></li>
                            <li><a href="#">Marketing</a></li>
                            <li><a href="#">Finance</a></li>

                        </ul>
                    </div>
                </div>

                <div class="col-lg-2  col-md-3 col-sm-6">
                    <div class="footer-widget">
                        <h6>Links</h6>
                        <ul>
                            <li><a href="project.php">Campus</a></li>
                            <li><a href="blog.php">Blog</a></li>
                            <li><a href="about.php">About Us</a></li>
                            <li><a href="contact.php">Contact Us</a></li>

                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 offset-lg-1 col-md-6 col-sm-6">
                    <div class="footer-widget">
                        <h6>NewsLetter</h6>
                        <div class="footer-newslatter">
                            <p>Be the first to enroll and know about new course, events & academic ideas!</p>
                            <form action="">
                                <input type="text" placeholder="Your Email" required>
                                <button type="submit"><span><i class="fa fa-envelope"
                                            arial-hidden="true"></i></span></button>
                            </form>
                        </div>

                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="footer-copyright-text">
                        <p>Copyright &copy; 2022 All rights reserved &ensp; | &ensp; Made with <i class="fa fa-heart-o" arial-hidden="true"></i>
                             by <a href="#">Nirbhay Meghpara</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
            
    <!-- JavaScript -->

    <script>
        
        function showMenu() {
            var navLinks = document.getElementById("navLinks");
            navLinks.style.right = "0";
        }
        function hideMenu() {
            var navLinks = document.getElementById("navLinks");
            navLinks.style.right = "-200px";
        }

        document.getElementById("myButton").onclick = function () {
            location.href = "www.google.com"
        }

    </script>
</body>
</html>