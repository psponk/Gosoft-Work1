<?php
session_start();

if (isset($_GET['deleteid'])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db=$_GET['db'];
    $dbname = $db;

    $con = mysqli_connect($servername, $username, $password, $dbname);
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $id=$_GET['deleteid'];
    $sql = "delete from `students` where id=$id";
    $result = mysqli_query($con,$sql);
    if($result){
        echo"Deleted Successful";
        header('Location: view.php?db='.$db.'');
    }
    else{
        die(mysqli_error($con));
    }

}
