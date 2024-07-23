<?php
    $conn=new mysqli('localhost','root','','enrollment');
    if($conn){
        echo "connected";
    }else{
        die(mysqli_error($conn));
    }

    if(isset($_POST['submit'])){
        $username=$_POST['username'];
        $rollNumber=$_POST['rollNumber'];
        $gender=$_POST['gender'];

        $sql="insert into `student` (username,rollNumber,gender) values ('$username','$rollNumber','$gender')";
        $result=mysqli_query($conn,$sql);

        if($result){
            echo "data inserted";
            header('location: display.php');
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
    <title>Document</title>
    <style>
        body {
            background-color: #f0f8ff;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 80%;
            max-width: 600px;
            padding: 20px;
            text-align: center;
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
        }
        .input-group {
            margin-bottom: 15px;
            text-align: left;
        }
        .input-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .input-group input,
        .input-group select {
            width: calc(100% - 20px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .errors {
            color: red;
            font-size: 0.9em;
            margin-bottom: 5px;
        }
        .btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .inner-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Student Enrollment</h1>
        <div class="inner-container">
            <form method="POST" onsubmit="return ValidateForm()">
                <div class="input-group">
                    <label>Name:</label>
                    <div id="user-error" class="errors"></div>
                    <input name="username" id="userid" type="text">
                </div>
                <div class="input-group">
                    <label>Roll Number:</label>
                    <div id="roll-error" class="errors"></div>
                    <select name="rollNumber" id="rollid">
                        <option value="">Select Roll No</option>
                        <option value="1">CT-21056</option>
                        <option value="2">CT-21057</option>
                        <option value="3">CT-21058</option>
                        <option value="4">CT-21059</option>
                        <option value="5">CT-21055</option>
                    </select>
                </div>
                <div class="input-group">
                    <label>Gender:</label>
                    <div id="gen-error" class="errors"></div>
                    <!-- <select name="gender" id="genid">
                        <option value="">Select Gender</option>
                        <option value="1">Male</option>
                        <option value="2">Female</option>
                    </select> -->
                    <label for="male">Male</label>
                    <input type="radio" name="gender" id="male" value="male">
                    <label for="male">Female</label>
                    <input type="radio" name="gender" id="female" value="female">
                    
                </div>
                <button name="submit" type="submit" class="btn btn-primary">LogIn</button>
            </form>
        </div>
    </div>
    <script>
        function ValidateForm(){
            let flag=1;
            let Username=document.getElementById('userid');
            let RollNumber=document.getElementById('rollid');
            let Gender=document.getElementById('genid');

            document.getElementById("user-error").innerHTML = "";
            document.getElementById("roll-error").innerHTML = "";
            document.getElementById("gen-error").innerHTML = "";

            if(Username.value.trim()===""){
                document.getElementById("user-error").innerHTML="Username cannot be empty";
                flag=false;
            }else if(Username.value.length<3){
                document.getElementById("user-error").innerHTML="Username should be atleast 3 characters";
                flag=false;
            }

            if(RollNumber.value===""){
                document.getElementById("roll-error").innerHTML="Roll No cannot be empty";
                flag=false;
            }

            if(Gender.value===""){
                document.getElementById("gen-error").innerHTML="Gender cannot be empty";
                flag=false;
            }

            
            return flag;
        }
    </script>
</body>
</html>