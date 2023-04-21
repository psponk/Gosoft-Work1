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
        max-width: 200px;
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
                <h1 style='color: white'>Add data to <?php echo $_GET['db'] ?></h1>
            </div>
            <div class="card-body text-center">
                <form method="GET" style="display: inline-block;">
                    <p style= "display: inline-block;">
                        <label for="fullname">Select Database:</label>
                    <select onchange="this.form.submit()" name="db" class="form-control" style="margin-bottom: 20px ;max-width: 150px; display: inline-block;">
                        <option value="students" <?php if (isset($_GET['db']) && $_GET['db'] == 'students') echo 'selected'; ?>>students</option>
                        <option value="studentss" <?php if (isset($_GET['db']) && $_GET['db'] == 'studentss') echo 'selected'; ?>>studentss</option>
                        <option value="studentsss" <?php if (isset($_GET['db']) && $_GET['db'] == 'studentsss') echo 'selected'; ?>>studentsss</option>
                    </select>
                    </p>
                </form>
                <form name="add_data" action="add.php?db=<?php echo $_GET['db'] ?>" method="post">
                    <p>
                        <label for="fullname">fullname:</label>
                        <input type="text" name="fullname" id="fullname" class="form-control" id="validationCustomUsername">

                    </p>


                    <p>
                        <label for="email">email:</label>
                        <input type="text" name="email" id="email" class="form-control">
                    </p>


                    <p>
                        <label for="phoner">phone:</label>
                        <input type="text" name="phone" id="phone" class="form-control">
                    </p>


                    <p>
                        <label for="course">course:</label>
                        <input type="text" name="course" id="course" class="form-control">
                    </p>

                    <button name="add_data" type="submit" class="btn btn-success">Submit</button>

                </form>
            </div>
        </div>
    </center>
</body>

</html>