<?php
session_start();
    include('dbconn.php');

    if(!isset($_SESSION['user'])){
    header('location:login.html');
    }
?>

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
        <h1>Contact Us</h1>
    </section>


    <!-- Contact us content -->

    <section class="location">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d11787.92759325946!2d-71.2217903!3d42.3855321!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x861ff9c80e2690aa!2sBentley%20University!5e0!3m2!1sen!2sin!4v1646132441970!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>    
    </section>

    <section class="contact-us">
        <div class="row1" style="margin-bottom: 40px;">
            <div class="contact-col">
                <div>
                    <i class="fa fa-home"></i>
                    <span>
                        <h5>175 Forest St, MA 02452</h5>
                        <p>Waltam, United States</p>
                    </span>
                </div>
                <div>
                    <i class="fa fa-phone"></i>
                    <span>
                        <h5> +1 781-891-2000</h5>
                        <p>Monday to Saturday, 10AM to 6PM</p>
                    </span>
                </div>
                <div>
                    <i class="fa fa-envelope-o"></i>
                    <span>
                        <h5>info@bentlyuniversity.edu</h5>
                        <p>Email us your query</p>
                    </span>
                </div>
            </div>

            <div class="contact-col">
                <form action="addcontact.php" method="POST">
                    <input type="text" placeholder="Enter your name" name="name" required>
                    <input type="email" placeholder="Enter email address" name="email" required>
                    <input type="text" placeholder="Enter your subject" name="subject" required>
                    <textarea rows="8" placeholder="Message" name="message" required></textarea>
                    <button type="submit" class="btn red-btn" name="send">Send Message</button>
                </form>
            </div>
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