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

<style>
    .form-control {
        display: inline-block;
        max-width: 200px
    }

    .page-footer {
    background-color: #ad2828;
    text-align: center;
    color: white;
    margin: 0 0 0 0;
    height: 30px;
}

</style>

<body style="background-color:white">
    <!-- navbar -->
    <ul>
        <li><a href=""><img src="logo.jpg" class="pic"></a></li>
        <li><a href="file.php">file</a></li>
        <li><a href="view.php">view</a></li>
        <li style="float:right"><a href="index.php">Asset Management</a></li>
    </ul>

    <center style="margin-top: 5%;">


        <div class="card" style="max-width: 500px">
            <div class="card-header" style="background-color:#940d03">
                <h3 style='color: white'>Update data to <?php echo $_GET['db'] ?> ID = <?php echo $_GET['id'] ?> </h3>
            </div>
            <div class="card-body text-center">
                <form name="update_data" action="update.php?db=<?php echo $_GET['db'] ?>&id=<?php echo $_GET['id'] ?>" method="post">
                    <div>
                        <p>asset_type</p>
                        <input type="text" name="asset_type" id="asset_type" class="form-control" id="validationCustomUsername" style="margin: 0 0 0 0; padding: 0 0 0 0" placeholder="<?php echo $_GET['asset_type'] ?>">
                    </div>



                    <div>
                        <p>asset_number</p>
                        <input type="text" name="asset_number" id="asset_number" class="form-control" id="validationCustomUsername" style="margin: 0 0 0 0; padding: 0 0 0 0" placeholder="<?php echo $_GET['asset_number'] ?>">

                    </div>



                    <div>
                        <p>asset_status</p>
                        <input type="text" name="asset_status" id="asset_status" class="form-control" id="validationCustomUsername" style="margin: 0 0 0 0; padding: 0 0 0 0" placeholder="<?php echo $_GET['asset_status'] ?>">
                    </div>

                    <div>
                        <p>asset_condition</p>
                        <input type="text" name="asset_condition" id="asset_condition" class="form-control" id="validationCustomUsername" style="margin: 0 0 0 0; padding: 0 0 0 0" placeholder="<?php echo $_GET['asset_condition'] ?>">
                    </div>
                    <button name="update_data" type="submit" class="btn btn-success" style="margin-top:10px">Submit</button>

                </form>
            </div>
    </center>
    <footer class="page-footer">
            <p>&copy; 2023 Asset Management System. All rights reserved.</p>
        </footer>
</body>

</html>