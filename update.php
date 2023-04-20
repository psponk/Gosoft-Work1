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
    echo $email;
    $phone = $_POST['phone'];
    $course = $_POST['course'];

    if(!empty($fullname)){
        $sqlquery = "UPDATE students
        SET fullname = '$fullname'
        WHERE id = $id;
        ";
        $result = mysqli_query($con, $sqlquery);
    }

    if(!empty($email)){
        $sqlquery = "UPDATE students
        SET email = '$email'
        WHERE id = $id;
        ";
        $result = mysqli_query($con, $sqlquery);
    }

    if(!empty($phone)){
        $sqlquery = "UPDATE students
        SET phone = '$phone'
        WHERE id = $id;
        ";
        $result = mysqli_query($con, $sqlquery);
    }

    if(!empty($course)){
        $sqlquery = "UPDATE students
        SET course = '$course'
        WHERE id = $id;
        ";
        $result = mysqli_query($con, $sqlquery);
    }

    if($result){
        $_SESSION['addmessage'] = 'Update Success';
        header('Location: view.php?db=' . $db . '');
        exit(0);
    }
    
    else {
        $_SESSION['addmessage'] = "Update Failed";
        header('Location: view.php?db=' . $db . '');
        exit(0);
    }

}   
?>