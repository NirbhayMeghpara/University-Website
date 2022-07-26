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
        <h1>Our Certificates & Online Programs for 2022</h1>
    </section>


    <!-- blog page content -->
    
    <section class="blog-content">
        <div class="row1">
            <div class="blog-left">
                <img src="images/certificate.jpg" alt="">
                <h2>Our Certificates & Online Programs for 2022</h2>
                <p>Bentley's newest graduate certificates can be attended online, take less than a year to complete, and let you build important expertise in Business Analytics, Computer Science, Big DATA analysis, Innovative management, and more. And all of the certificates get you started on the road to a graduate degree by providing credits that can be applied to a related program.  </p><br>
                <p>Certificate students who complete their program are eligible to waive many requirements for admission to our MBA or Master of Science (MS) programs.Certificate students who complete their program are eligible to waive many requirements for admission to our MBA or Master of Science (MS) programs. </p><br>
                <p>By immersing yourself in a cohort-based learning experience where you’ll participate in live, expert instruction, you’ll be able to build your network and gain insights and advice from other working professionals.Upon successful completion of your certificate program, you’ll earn a university-issued certificate from a leading university that you can add to your resume and LinkedIn profile. </p>

                <div class="comment-box">
                    <h3>Leave a Comment</h3>

                    <form class="comment-form">
                        <input type="text" placeholder="Enter Name" required>
                        <input type="email" placeholder="Enter Email" required>
                        <textarea rows="5" placeholder="Your comment" required></textarea>
                        <button type="submit" class="btn red-btn">POST COMMENT</button>
                    </form>

                </div>
            </div>
            <div class="blog-right">
                <h3>Post Categories</h3>
                <div class="pointer">
                    <span>Business Analytics</span>
                    <span>21</span>
                </div>
                <div>
                    <span>Computer Science</span>
                    <span>32</span>
                </div>
                <div>
                    <span>Data Science</span>
                    <span>28</span>
                </div>
                <div>
                    <span>Machine Learning</span>
                    <span>12</span>
                </div>
                <div>
                    <span>Big DATA Analysis</span>
                    <span>8</span>
                </div>
                <div>
                    <span>Journalism</span>
                    <span>15</span>
                </div>        
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