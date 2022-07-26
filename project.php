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
    <section class="header">
        <nav>
            <img src="images/bently.png">
            <div class="nav-links" id="navLinks" style="display: flex; height: 41px; text-align: right;">
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
        <div class="text-box">
            <h1>World's Largest University</h1>
            <p>An institution of higher learning providing facilities for teaching and research and authorized to grant academic degrees.<br>You have to learn HTML, CSS, JavaScript to cover all the aspects of Web Development.</p>
            <a href="" class="btn white-btn">Visit Us to know More</a>
         </div>
    </section>

    <!-- --- Course --- -->

    <section class="course">
        <h1>Courses We Offer </h1>  
        <p>Learn at the comfort of your own home. </p>

        <div class="row1">   
            <div class="course-col">
                <h3>Intermediate</h3>
                <p>Intermediate Course will provide you a general overall experience of all the subjects that will help you to choose any stream subjects in degree.  </p> 
            </div>
            <div class="course-col">
                <h3>Degree</h3>   
                <p>The benefits of University Degree is all about opening up opportunities in life. It prepares you, both intellectually and socially, for your career and your adult life.</p>
            </div>
            <div class="course-col">
                <h3>Post Graduation</h3>   
                <p>By studying a postgraduate degree, you'll develop skills that will support you through daily life, such as time management, researching, presentation and writing skills.</p>
            </div>
        </div>
    </section>

    <!-- Campus -->
 
    <section class="campus">
        <h1>Our Global Campus</h1>
        <p>Countless opportunities to meet new people and develop lasting friendships.</p>

        <div class="row1">
            <div class="campus-col">
                <img src="images/campus1.jpg">           
                <div class="layer"> 
                    <h3>LONDON</h3>
                </div>
            </div>          
            <div class="campus-col">           
                <img src="images/campus3.jpeg">
                <div class="layer">
                    <h3>NEW YORK</h3>
                </div>
            </div>
            <div class="campus-col"> 
                <img src="images/campus2.jfif">           
                <div class="layer"> 
                    <h3>WASHINGTON</h3>          
                </div>
            </div>
        </div>
    </section>

    <!-- Facilities -->

    <section class="facilities">
        <h1>Our Facilities</h1>
        <p>Contributes to Intellect</p>

        <div class="row1">
            <div class="facilities-col">
                <img src="images/library.png">
                <h3>World Class Library</h3>
                <p>Libraries play a vital role in providing people with reliable content. They encourage and promote the process of learning and grasping knowledge. The book worms can get loads of books to read from and enhance their knowledge. Moreover, the variety is so wide-ranging that one mostly gets what they are looking for.</p>
            </div>
            <div class="facilities-col">
                <img src="images/basketball.png">
                <h3>Largest Sports Event</h3>
                <p>Playing sports helps reduce body fat or controls your body weight. Sports allow you will gain the satisfaction of developing your fitness and skills.Sports can help you fight depression and anxiety.Sports allows you to challenge yourself and set goals. Sports allow you to experience the highs and lows of both winning and losing! </p>
            </div>
            <div class="facilities-col">
                <img src="images/cafeteria.png">
                <h3>Cafeteria</h3>
                <p> A cafeteria will bring them all together, although likely at different times. You’ll find accountants having a cup of delicious coffee with people from the marketing department. Or a creative sharing a sandwich with friends.And maybe it is. However, there is always room for improvement and a cafeteria could do just that. </p>
            </div>
        </div>

    </section>

    <!-- Testimonial -->

    <section class="testimonials">
        <h1>What Our Student Says</h1>        
        <p>You get in life what you have the courage to ask for. </p>
            <div class="row1">
                <div class="testimonial-col">          
                    <img src="images/user1.jpg">      
                    <div>
                        <p>My course has been taught online and although it was been a bit of a struggle, the teaching has been good and I do appreciate all the hard work the lecturers has put in to try and deliver us the best that they can offer. Although I do wish that teachers respond to emails a bit quicker, I do understand how busy they are.</p>
                        <h3>Christine Berkley</h3>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                </div>
                <div class="testimonial-col">          
                    <img src="images/user2.jpg">      
                    <div>
                        <p>I would say that my time at the University this year was short lived but thoroughly enjoyable to say the least. Most impressively, the staff all appear to be on the same page working with an aligned goal to provide the students with as good an education as possible, taking every opportunity to direct us in the direction of extra material to learn from.</p>
                        <h3>David Byer</h3>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
    </section>

    <!-- Call to action -->

    <section class="cta">
        <h1>Enroll For Our Various Online Courses<br>Anywhre From The World</h1>
        <a href="contact.html" class="btn white-btn">CONTACT US</a>
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
                                <button type="submit"><span><i class="fa fa-envelope" arial-hidden="true"></i></span></button>
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