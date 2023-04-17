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
</style>

<body style="background-color:white">
    <!-- navbar -->
    <ul>
        <li><a href=""><img src="logo.jpg" class="pic"></a></li>
        <li><a href="index.php">file</a></li>
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
                    <p>
                        <label for="fullname">fullname:</label>
                        <input type="text" name="fullname" id="fullname" class="form-control" placeholder="<?php echo $_GET['fullname'] ?>">
                        
                    </p>


                    <p>
                        <label for="email">email:</label>
                        <input type="text" name="email" id="email" class="form-control" placeholder="<?php echo $_GET['email'] ?>">
                    </p>


                    <p>
                        <label for="phoner">phone:</label>
                        <input type="text" name="phone" id="phone" class="form-control" placeholder="<?php echo $_GET['phone'] ?>">
                    </p>


                    <p>
                        <label for="course">course:</label>
                        <input type="text" name="course" id="course" class="form-control" placeholder="<?php echo $_GET['course'] ?>">
                    </p>

                    <button name="update_data" type="submit" class="btn btn-success">Submit</button>

                </form>
            </div>
</div>
    </center>
</body>

</html>