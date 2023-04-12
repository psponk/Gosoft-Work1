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
        <li><a href="index.php">file</a></li>
        <li><a href="view.php">view</a></li>
        <li style="float:right"><a href="index.php">Asset Management</a></li>
    </ul>


    <center style="margin-top: 5%;">
        <h1>Add data to <?php echo $_GET['db'] ?></h1>
        <form action="insert.php" method="post">

            <p>
                <label for="fullname">fullname:</label>
                <input type="text" name="fullname" id="fullname">
            </p>


            <p>
                <label for="email">email:</label>
                <input type="text" name="email" id="email">
            </p>


            <p>
                <label for="phoner">phone:</label>
                <input type="text" name="phone" id="phone">
            </p>


            <p>
                <label for="course">course:</label>
                <input type="text" name="course" id="course">
            </p>

            <input type="submit" value="Submit">
        </form>
    </center>
</body>

</html>



<?php

if (isset($_GET['add'])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = $_GET['db'];
    $dbname = $db;

    $con = mysqli_connect($servername, $username, $password, $dbname);
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $id = $_GET['deleteid'];
    $sql = "delete from `students` where id=$id";
    $result = mysqli_query($con, $sql);
    if ($result) {
        echo "Deleted Successful";
        header('Location: view.php?db=' . $db . '');
    } else {
        die(mysqli_error($con));
    }
}
