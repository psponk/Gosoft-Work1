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
    <link href='node_modules\css.gg\icons\all.css' rel='stylesheet'>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Popper.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<style>
    .form-control {
        max-width: 200px;
    }

    p {
        margin: 0px 0px 0px 0px;
    }

    .page-footer {
        background-color: #ad2828;
        text-align: center;
        color: white;
        margin: 85px 0 0 0;
        position: relative;
        left: 0px;
        bottom: 0px;
        height: 30px;
        width: 100%;
    }

    .head {
        color: #ffffff;
        font-size: 50px;
        font-weight: bold;
        font-family: 'myFirstFont';
        text-align: center;
        margin-top: 50px;
        text-shadow: 1px 1px 8px #000000;
    }
    

</style>

<body style="background-color:white">
    <!-- navbar -->
    <nav class="navbar navbar-light" style="background-color: #ffff;">
    <a class="top" style="text-decoration: none;font-weight: bold;font-family: 'myFirstFont';color: #de152c;font-size:25px;text-align: center; padding: 0 0 0 0;" href="index.php">Asset Management System</a>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#nav1" aria-controls="nav1" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse collapse" id="nav1">
            <ul class="navbar-nav mr-auto" style="color:red">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="file.php">File</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="view.php">View</a>
                </li>
                <li class="nav-item dropdown nav-item active">
                    <a class="nav-link dropdown-toggle" href="" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Add</a>
                    <div class="dropdown-menu" aria-labelledby="Add">
                        <a class="dropdown-item" href="addpage.php?db=students">students</a>
                        <a class="dropdown-item" href="addpage.php?db=studentss">studentss</a>
                        <a class="dropdown-item" href="addpage.php?db=studentsss">studentsss</a>
                    </div>
                </li>
                <li class="nav-item dropdown nav-item active">
                    <a class="nav-link dropdown-toggle" href="" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Delete</a>
                    <div class="dropdown-menu" aria-labelledby="Add">
                        <a class="dropdown-item" href="deletemul.php?db=students">students</a>
                        <a class="dropdown-item" href="deletemul.php?db=studentss">studentss</a>
                        <a class="dropdown-item" href="deletemul.php?db=studentsss">studentsss</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="jumbotron jumbotron-fluid" style="background-image: url('red2.jpg');background-repeat: no-repeat;background-size: cover;background-position: center;background-attachment: fixed;"">
        <h1 class=" head" style="margin: 0 0 0 0;">Add Data</h1>
    </div>

    <hr style="height:2px;border-width:0;color:gray;background-color:gray;margin-top: 20px">

    <center style="margin-top: 5%;">


        <div class="card" style="max-width: 500px ;border-radius: 1rem;">
            <div class="card-header" style="background-color:#940d03">
                <h1 style='color: white'>Add data to <?php echo $_GET['db'] ?></h1>
            </div>
            <div class="card-body text-center">
                <form method="GET" style="display: inline-block;">
                    <p style="display: inline-block;">
                        <label for="asset_type">Select Database:</label>
                        <select onchange="this.form.submit()" name="db" class="form-control" style="margin-bottom: 20px ;max-width: 150px; display: inline-block;">
                            <option value="students" <?php if (isset($_GET['db']) && $_GET['db'] == 'students') echo 'selected'; ?>>students</option>
                            <option value="studentss" <?php if (isset($_GET['db']) && $_GET['db'] == 'studentss') echo 'selected'; ?>>studentss</option>
                            <option value="studentsss" <?php if (isset($_GET['db']) && $_GET['db'] == 'studentsss') echo 'selected'; ?>>studentsss</option>
                        </select>
                    </p>
                </form>
                <form name="add_data" action="add.php?db=<?php echo $_GET['db'] ?>" method="post">
                    <center>
                        <div>
                            <p>asset_type</p>
                            <input type="text" name="asset_type" id="asset_type" class="form-control" id="validationCustomUsername" style="margin: 0 0 0 0; padding: 0 0 0 0">
                        </div>



                        <div>
                            <p>asset_number</p>
                            <input type="text" name="asset_number" id="asset_number" class="form-control" id="validationCustomUsername" style="margin: 0 0 0 0; padding: 0 0 0 0">

                        </div>



                        <div>
                            <p>asset_status</p>
                            <input type="text" name="asset_status" id="asset_status" class="form-control" id="validationCustomUsername" style="margin: 0 0 0 0; padding: 0 0 0 0">
                        </div>

                        <div>
                            <p>asset_condition</p>
                            <input type="text" name="asset_condition" id="asset_condition" class="form-control" id="validationCustomUsername" style="margin: 0 0 0 0; padding: 0 0 0 0">

                        </div>
                    </center>

                    <button name="add_data" type="submit" class="btn btn-success" style="margin-top: 15px">Submit</button>

                </form>
            </div>
        </div>
    </center>
    <footer class="page-footer">
            <p>&copy; 2023 Asset Management System. All rights reserved.</p>
        </footer>
</body>


</html>