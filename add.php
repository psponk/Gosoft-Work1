<?php
session_start();

if (isset($_POST['add_data'])) {
    $db = $_GET['db'];
    $con = mysqli_connect("localhost", "root", "", $db);
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $asset_type = $_POST['asset_type'];
    $asset_number = $_POST['asset_number'];
    $asset_status = $_POST['asset_status'];
    $asset_condition = $_POST['asset_condition'];
    $sqlquery = "INSERT INTO asset (asset_type, asset_number, asset_status, asset_condition) VALUES ('$asset_type', '$asset_number', '$asset_status', '$asset_condition')";

    if($asset_type != "" && $asset_number != "" && $asset_status != "" && $asset_condition != ""){
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