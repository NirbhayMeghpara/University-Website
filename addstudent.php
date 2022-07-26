<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8" />
    <title>Sign Up</title>
    <link rel="stylesheet" href="style_signup.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css"/>
    <meta charset="UTF-8" />
    <title>Sign up form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700,300"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"/>
</head>
<body>

<?php
    require_once('dbconn.php');

    if (empty($_POST)) {
        header("location:signup.php");
        exit();
    }
    $username_err = $email_err = $mobile_err = $password_err = $passwordRepeat_err = "";
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
    if(empty($_POST['username'])) {
        $username_err = "Username is empty";
    }
    else if(!preg_match("/^[a-z A-Z \.]*$/",$_POST['username'])){
        $username_err = "Please enter character only.";
    }
    if(empty($_POST['email'])){
        $email_err = "Email is empty.";
    }
    else if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
        $email_err = "Please enter a valid email address.";
    }
    if(empty($_POST['mobile'])){
        $mobile_err = "Mobile number is empty";
    }
    else if(!preg_match("/^[0-9]{10}$/",$_POST['mobile'])){
        $mobile_err = "Please enter valid 10 digit mobile number.";
    }
    if(empty($_POST['password'])){
    $password_err = "Password is empty";
    }
    else if((strlen($_POST['password']) < 2) || (strlen($_POST['password']) > 10)){
        $pass_err = " Enter password of length between 2 to 10";
    }
    if(empty($_POST['passwordRepeat'])){
        $passwordRepeat_err = "Confirm password is empty";
    }
    else if($_POST['password'] != $_POST['passwordRepeat']){
        $passwordRepeat_err = "Password and confirm password is not matched";
    }
    }

    if( empty($username_err) && empty($email_err) && empty($mobile_err) && empty($password_err) && empty($passwordRepeat_err) ) {

      if(isset($_POST['signup'])) {
          
          $username = $_POST['username'];
          $email = $_POST['email'];
          $mobile = $_POST['mobile'];
          $password = $_POST['password'];
      
          $sql = "INSERT INTO student(username,email,mobile,password) VALUES ('$username','$email','$mobile','$password')";

          if(mysqli_query($conn,$sql)) {
              echo "You are registered successfully.";                  
          }
          else {
              echo "Something went wrong... Please insert again.".mysqli_connect_error($conn);
          } 
          header('location:login.html');  
          mysqli_close($conn);
      }
    }
?>

<div class="bg-img">
      <div class="content">
        <div class="signup__container" style="width: 56rem; height: 40rem;" >
          <div class="container__child signup__thumbnail">
            <div class="thumbnail__logo">
              <img src="images/bently.png" style="width: 120px; height: 40px" />
            </div>
            <div class="thumbnail__content text-center">
              <h1 class="heading--primary">Welcome to Bently University.</h1>
              <h2 class="heading--secondary">Are you ready to join the elite?</h2>
            </div>
            <div class="thumbnail__links">
              <ul class="list-inline m-b-0 text-center">
                <li><a href=""><i class="fa fa-globe"></i></a></li>
                <li><a href=""><fa class="fa fa-behance"></fa></a></li>
                <li><a href=""><i class="fa fa-github"></i></a></li>
                <li><a href=""><i class="fa fa-twitter"></i></a></li>
              </ul>
            </div>
            <div class="signup__overlay"></div>
          </div>
          <div class="container__child signup__form">

            <form id="myForm" method="POST" >

              <div class="form-group" style="margin-bottom: 9px;">
                <label for="username" style="margin-bottom: 5px;">Username</label>
                <input class="form-control" type="text" name="username" id="username" placeholder="david.byer"/>
                <span id="user"><?php echo $username_err; ?></span>
              </div>
              <div class="form-group" style="margin-bottom: 9px;">
                <label for="email" style="margin-bottom: 5px;">Email</label>
                <input class="form-control"type="email" name="email" id="email" placeholder="david.byer@bentlyuniversity.com"/>
                <span id="eml"><?php echo $email_err; ?></span>
              </div>
              <div class="form-group" style="margin-bottom: 9px;">
                <label for="mobile" style="margin-bottom: 5px;">Mobile No.</label>
                <input class="form-control" type="text" name="mobile" id="mobile" placeholder="+91 781-891-2000" />
                <span id="mno"><?php echo $mobile_err; ?></span>
              </div>
              <div class="form-group" style="margin-bottom: 9px;">
                <label for="password" style="margin-bottom: 5px;">Password</label>
                <input class="form-control" type="password" name="password" id="password" placeholder="********"/>
                <span id="pwd"><?php echo $password_err; ?></span>
              </div>
              <div class="form-group" style="margin-bottom: 9px;">
                <label for="passwordRepeat" style="margin-bottom: 5px;">Confirm Password</label>
                <input class="form-control" type="password" name="passwordRepeat" id="passwordRepeat" placeholder="********" />
                <span id="cpwd"><?php echo $passwordRepeat_err; ?></span>
              </div>
              <div class="m-t-lg">
                <ul class="list-inline">
                  <li><input class="btn btn--form" type="submit" value="Register" name="signup"/></li>
                  <li><a class="signup__link" href="login.html">I already registered !!</a></li>
                </ul>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </body>
</html>