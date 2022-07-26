<?php
    session_start();
    include('dbconn.php');

    $username_err = $password_err = "";
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
    if(empty($_POST['username'])) {
        $username_err = "Username is empty";
    }
    if(empty($_POST['password'])){
        $password_err = "Password is empty";
    }
}

    if(isset($_POST['login']))
    {
        $adminuser=$_POST['username'];
        $password=$_POST['password'];

        $query=mysqli_query($conn,"SELECT * from tbladmin where  UserName='$adminuser'");
        $result=mysqli_fetch_array($query);

        if(empty($username_err) && empty($password_err))
        {
        if($result["Password"] == $password){
            $_SESSION['user']=$result['ID'];
            header('location:admin.php');
        }
        else {
            $msg="Invalid Details, Please Try Again!";
        }
        }
    }
  ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Login Page</title>
 
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">

  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>Admin</b><br> Login Page</a>
  </div>
  <div class="login-box-body">
    <form method="POST">

    <?php 
        if(!empty($msg)){ 
            echo "<div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-info-circle'></i> Alert!</h4> $msg </div>";
        } 
    ?>

      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="username" placeholder="Username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

      <div class="row">
        
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" name="login" class="btn btn-success btn-block btn-flat" style="font-size:16px; font-weight:600;" >Login</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
        <br>

    <a href="">Forgot Password ?</a><br>

  </div>
  <!-- /.login-box-body -->
</div>

</body>
</html>
