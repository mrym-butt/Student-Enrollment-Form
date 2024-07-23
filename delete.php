<?php
    $conn=new mysqli('localhost','root','','enrollment');
    if($conn){
        echo "connected";
    }else{
        die(mysqli_error($conn));
    }

    if(isset($_GET['deleteid'])){
        $id= $_GET['deleteid'];

        $sql="delete from `student` where id= $id";
        $result=mysqli_query($conn,$sql);
        if($result){
            // echo "Deleted successfully";
            header('location:display.php');
        }else{
            die(mysqli_error($conn));
        }
    }





?>