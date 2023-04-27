<?php
session_start();

if (isset($_GET["deleteid"])) {
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
    $sql = "delete from `asset` where asset_id=$id";
    $result = mysqli_query($con,$sql);
    if($result){
        $_SESSION['deletemessage'] = "Successfully Delete";
        header('Location: view.php?db='.$db.'');
    }
    else{
        $_SESSION['deletemessage'] = "Deleted Fail";
        header('Location: view.php?db='.$db.'');
    }
}
