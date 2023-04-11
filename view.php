<?php
session_start();
include 'dbconfig.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>

<body style="background-color:white">
    <!-- navbar -->
    <ul>
        <li><a href=""><img src="logo.jpg" class="pic"></a></li>
        <li><a href="index.php">manage</a></li>
        <li><a href="view.php">view</a></li>
        <li style="float:right"><a href="">lorem</a></li>
    </ul>
    <div style="overflow-x:auto;">
    <table class="table" >
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Fullname</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Course</th>
                <th scope="col" style="text-align: center ; width: 180px;">Manage</th>

            </tr>
        </thead>
        <tbody>

        <?php
    $sql = "Select * from students";
    $result = mysqli_query($con,$sql);
    if($result){
        while($row=mysqli_fetch_assoc($result)){
            $id=$row['id'];
            $fullname=$row['fullname'];
            $email=$row['email'];
            $phone=$row['phone'];
            $course=$row['course'];
            echo'
            <tr>
                <th scope="row">'.$id.'</th>
                <td>'.$fullname.'</td>
                <td>'.$email.'</td>
                <td>'.$phone.'</td>
                <td>'.$course.'</td>
                <td align="center width: 180px;">
                <div>
                <button type="button" class="btn btn-primary"><a href="update.php" class="text-light">Update</a></button>
                <button type="button" class="btn btn-danger"><a href="delete.php" class="text-light">Delete</a></button>
                </div>
                </td>
            </tr>';
        }
    }
        ?>


        </tbody>
    </table>
    </div>