<?php
session_start();

if (isset($_POST['add_data'])) {
    $db = $_GET['db'];
    $con = mysqli_connect("localhost", "root", "", $db);
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $course = $_POST['course'];
    $sqlquery = "INSERT INTO students (fullname, email, phone, course) VALUES ('$fullname', '$email', '$phone', '$course')";

    if($fullname != "" && $email != "" && $phone != "" && $course != ""){
        $result = mysqli_query($con, $sqlquery);
        if ($result) {
            $_SESSION['addmessage'] = "Successfully Add";
            header('Location: view.php?db=' . $db . '');
            exit(0);
        }
    }
    else {
        $_SESSION['addmessage'] = "Add Failed";
        header('Location: view.php?db=' . $db . '');
        exit(0);
    }
}   
?>