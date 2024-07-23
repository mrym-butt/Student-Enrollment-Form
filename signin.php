<?php
 include 'connection.php';

 if(isset($_POST['submit'])){
     echo "connectedArray ";
     print_r($_POST);
     echo "<br>";
     $username=$_POST['username'];
     $passwords=$_POST['passwords'];

     $sql="INSERT INTO `login` (username,passwords) values ('$username','$passwords')";
     $result=mysqli_query($conn,$sql);
     if($result){
         echo 'inserted';
     }else{
         die(mysqli_error($conn));
     }

     }

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./signin.css">
    <title>Document</title>
</head>
<body>
    <div class="box">
        <div class="left">
            <div class="content">
                <div class="inner-content">
                    <h1>Hello NEDIANS!</h1>
                    <h3>You are the best of bests!</h3>
                    <a href="www.facebook.com">Facebook</a>
                    <a href="www.instagram.com">Instagram</a>
                </div>

            </div>
        </div>
        <div class="right" >
            <h1>LOGIN</h1>
            <h4>Don't have an account?SignUp</h4>
            <form class="login-content" method="POST" action="signin.php" onsubmit="return addvalidation()">
                <div id="user-error" class="user">
                    <label for="username">Username:</label>
                    <input type="text"  name="username" placeholder="Write Username" id="userid" >
                </div>
                <div id="pass-error" class="pass">
                    <label for="password">Password:</label>
                    <input type="password" name="passwords" placeholder="Enter Password" id="passwordid" >
                </div>
                <button name="submit" type="submit">LogIn</button>
            </form>
        </div>
    </div>
    <script>
        function addvalidation(){
            let flag=true;
            let name=document.getElementById("userid");
            let pass=document.getElementById('passwordid');
            
            document.getElementById("user-error").innerHTML="";
            document.getElementById("pass-error").innerHTML="";

            if(name.value.trim()===""){
                document.getElementById("user-error").innerHTML="Username cannot be empty";
                flag=false;
            }else if(name.value.length<3){
                document.getElementById("user-error").innerHTML="Username should be atleast 3 characters";
                flag=false;
            }

            if(pass.value.trim()===""){
                document.getElementById("pass-error").innerHTML="Password cannot be empty";
                flag=false;
            }else if(!(/^([a-zA-Z]{2})([-]{1})([0-9]{5})$/.test(pass.value))){
                document.getElementById("pass-error").innerHTML="Invalid password";
                flag=false;
            }
            return flag;
        }
    </script>
</body>
</html>