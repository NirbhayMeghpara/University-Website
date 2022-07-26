<?php
    session_start();
    include('dbconn.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if(isset($_POST['login']))
        {
            $username=$_POST['username'];
            $password=$_POST['password'];
    
            $query=mysqli_query($conn,"SELECT * from student where  username='$username'");
            $result=mysqli_fetch_array($query);
    
            if($result["password"] == $password){
                $_SESSION['user']=$result['sid'];
                header('location:project.php');
            }
            else {
                header('location:login.html');
            }
        }
    }    
?>