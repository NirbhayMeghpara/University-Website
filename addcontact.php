<?php 
include('dbconn.php');
if(isset($_POST['send'])){

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$sql = "INSERT INTO contact(name,email,subject,message) VALUES ('$name','$email','$subject','$message')";

if(mysqli_query($conn,$sql)){
    header('location:contact.php');
}
else{
    echo "Something went wrong... Please insert again.".mysqli_connect_error($conn);
}
mysqli_close($conn);
}
?>