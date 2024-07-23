<?php
    $conn=new mysqli('localhost','root','','enrollment');
    if($conn){
        echo "connected";
    }else{
        die(mysqli_error($conn));
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
    
</head>
<body>
    <div class="container">
        <button class="btn btn-primary" style="color:white" ><a href="./crud.php">Add User</a></button>
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>username</th>
                    <th>rollNumber</th>
                    <th>gender</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $query="Select * from `student`";
                    $result=mysqli_query($conn,$query);
                    if($result){
                        while($row=mysqli_fetch_assoc($result)){
                            $id=$row['id'];
                            $username=$row['username'];
                            $rollNumber=$row['rollNumber'];
                            $gender=$row['gender'];
                            echo '<tr>
                            <th>'.$id.'</th>
                            <td>'.$username.'</td>
                            <td>'.$rollNumber.'</td>
                            <td>'.$gender.'</td>
                            <td>
                            <button class="btn btn-primary"><a href="update.php? updateid='.$id.' " class="text-light">Update</a></button>
                            <button class="btn btn-danger"><a href="delete.php? deleteid='.$id.' " class="text-light">Delete</a></button>
                            </td>
                            </tr>';
                            
                        }
                    }


                ?>
            </tbody>
        </table>
    </div>
    
</body>
</html>