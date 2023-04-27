<?php
session_start();

if (isset($_POST['update_data'])) {
    $db = $_GET['db'];
    $con = mysqli_connect("localhost", "root", "", $db);
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $id = $_GET['id'];
    $asset_type = $_POST['asset_type'];
    $asset_number = $_POST['asset_number'];
    echo $asset_number;
    $asset_status = $_POST['asset_status'];
    $asset_condition = $_POST['asset_condition'];

    if(!empty($asset_type)){
        $sqlquery = "UPDATE asset
        SET asset_type = '$asset_type'
        WHERE asset_id = $id;
        ";
        $result = mysqli_query($con, $sqlquery);
    }

    if(!empty($asset_number)){
        $sqlquery = "UPDATE asset
        SET asset_number = '$asset_number'
        WHERE asset_id = $id;
        ";
        $result = mysqli_query($con, $sqlquery);
    }

    if(!empty($asset_status)){
        $sqlquery = "UPDATE asset
        SET asset_status = '$asset_status'
        WHERE asset_id = $id;
        ";
        $result = mysqli_query($con, $sqlquery);
    }

    if(!empty($asset_condition)){
        $sqlquery = "UPDATE asset
        SET asset_condition = '$asset_condition'
        WHERE asset_id = $id;
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