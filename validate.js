function validate(){
    var username = document.getElementById("username").value;
    var email = document.getElementById("email").value;
    var mobile = document.getElementById("mobile").value;
    var password = document.getElementById("password").value;
    var passwordRepeat = document.getElementById("passwordRepeat").value;

    if(username==""){
    document.getElementById("user").innerHTML = "Please Enter Your Username";
    return false;
    }
    
    if(!isNaN(username)){
        document.getElementById("user").innerHTML = "Please enter the Characters also";
        return false;
        }

    if(email == ""){
        document.getElementById("eml").innerHTML = "Please Enter Your Email";
        return false;
        }
    var emailformat = /^[a-z A-Z 0-9 \_\.\-]+\@[a-z A-Z]{2,6}[.]{1}[a-z]{2,4}[.]{0,1}[a-z]{0,2}$/;
        if(emailformat.test(email)){
        document.getElementById("eml").innerHTML = "";
        }
        else{
            document.getElementById("eml").innerHTML = "Please enter the correct email format";
            return false;
        }
    if(mobile == ""){
        document.getElementById("mno").innerHTML = "Please Enter Your Mobile number";
        return false;
        }
        if(isNaN(mobile)){
            document.getElementById("mno").innerHTML = "Please Enter valid number only";
            return false;
            }
        if(mobile.length !== 10){
            document.getElementById("mno").innerHTML = "Please Enter your valid 10 digit number";
            return false;
            }

    if(password == ""){
        document.getElementById("pwd").innerHTML = "Please Enter Your Password";
        return false;
        }
        var password = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
        if(password.test(password)){
            document.getElementById('pwd').innerHTML = "";
        }
        else{
            document.getElementById('pwd').innerHTML = "Enter minimum 8 characters length and should contains at least 1 Alphabet and 1 Number";
        }
        if((password.length < 1) ||(password.length > 12)){
            document.getElementById("pwd").innerHTML = "Please Enter Your Password between 8 to 12 characters";
            return false;
            }
        if(passwordRepeat == ""){
            document.getElementById("cpwd").innerHTML = "Please Enter Your Confirm Password";
            return false;
            }
        if((passwordRepeat.length < 8) ||(passwordRepeat.length > 12)){
            document.getElementById("cpwd").innerHTML = "Please Enter Your Password between 8 to 12 characters";
            return false;
            }
        if(password !== passwordRepeat){
            document.getElementById("cpas").innerHTML = "Password is not matched with Confirm password.";
            return false;
            }
}

