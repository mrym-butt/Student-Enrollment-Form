<?php
    $conn=new mysqli('localhost','root','','studentenrollment');
    if($conn){
        echo "connected";
    }else{
        die(mysqli_error($conn));
    }

?>

