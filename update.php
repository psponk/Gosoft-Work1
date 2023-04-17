<?php
session_start();

if (isset($_POST['update_data'])) {
    $db = $_GET['db'];
    $con = mysqli_connect("localhost", "root", "", $db);
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $id = $_GET['id'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $course = $_POST['course'];
    $sqlquery = "UPDATE students
    SET fullname = '$fullname', email = '$email', phone = '$phone', course = '$course'
    WHERE id = $id;
    ";

    if($fullname != "" && $email != "" && $phone != "" && $course != ""){
        $result = mysqli_query($con, $sqlquery);
        if ($result) {
            $_SESSION['addmessage'] = "Successfully Update";
            header('Location: view.php?db=' . $db . '');
            exit(0);
        }
    }
    else {
        $_SESSION['addmessage'] = "Update Failed";
        header('Location: view.php?db=' . $db . '');
        exit(0);
    }
}   
?>