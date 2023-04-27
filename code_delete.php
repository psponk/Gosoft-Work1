<?php
session_start();

$db = $_GET['db'];
$con = mysqli_connect("localhost","root","",$db);

if(isset($_POST['delete_multiple_btn']) && isset($_POST['delete_id']))
{
    $all_id = $_POST['delete_id'];
    if(!empty($all_id)){
        $extract_id = implode(',' , $all_id);

        $query = "DELETE FROM asset WHERE asset_id IN($extract_id) ";
        $query_run = mysqli_query($con, $query);

        if($query_run)
        {
            $_SESSION['delete_mul'] = "Multiple Data Deleted Successfully";
            header('Location: view.php?db='.$db.'');
        }
        else
        {
            $_SESSION['delete_mul'] = "Multiple Data Not Deleted";
            header('Location: view.php?db='.$db.'');
        }
    }
    else {
        $_SESSION['delete_mul'] = "No data selected for deletion";
        header('Location: view.php?db='.$db.'');
    }
}
else {
    $_SESSION['delete_mul'] = "Invalid request";
    header('Location: view.php?db='.$db.'');
}
?>