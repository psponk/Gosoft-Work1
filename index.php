<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asset Management</title>
    <link href="style.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
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
    .head {
        color: #ffffff;
        font-size: 50px;
        font-weight: bold;
        font-family: myFirstFont;
        text-align: center;
        margin-top: 50px;
        text-shadow: 1px 1px 8px #000000;
    }

    .body {
        background-image: url("logo2.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        font-family: "Times New Roman";
    }

    .container {
        width: 500px;
        height: 500px;
    }

    .inside-container {
        max-width: 400px;
        /* border-style: solid; */
        margin: 40px 40px 40px 40px;

    }

    .name {
        font-size: 20px;
        float: left;
        padding-right: 0px;
        margin-right: 0px;
    }

    a {
        color: white;

    }

    a:hover {
        color: #ffffff;
    }

    @media (max-width: 850px) {
        .head {
            font-size: 5vw;
        }
    }

    .page-footer {
        background-color: #ad2828;
        text-align: center;
        color: white;
        margin: 0 0 0 0;
        height: 30px;
    }
</style>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-light" style="background-color: #ffff;">
        <a style="text-decoration: none;font-weight: bold;font-family: myFirstFont;color: #de152c;font-size:25px;text-align: center; padding: 0 0 0 0;"href="index.php">Asset Management System</a>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#nav1" aria-controls="nav1" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse collapse" id="nav1">
            <ul class="navbar-nav mr-auto" style="color:red">
                <li class="nav-item">
                    <a class="nav-link  disabled" href="index.php">Home</a>
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


    
    <div class="jumbotron jumbotron-fluid" style="background-color:#ad2828">
        <h1 class="head" style="margin: 0 0 0 0;">Asset Management system</h1>
    </div>
    <hr style="height:2px;border-width:0;color:gray;background-color:gray;margin-top: 20px">
    <h1 style="text-align:center">All Available Asset</h1>
    <div class="container" style="height:200px">
        <div class="row" style="text-align:center">
            <div class="col-md-4">
                box 1
            </div>
            <div class="col-md-4">
                box 2
            </div>
            <div class="col-md-4">
                box 3
            </div>
        </div>
    </div>
    <div class="row d-flex justify-content-center align-items-center">

        <div class="container col-4" style="height: 300px; display: flex; flex-direction: column; justify-content: flex-end ;margin-bottom: 20px;">
            <h1 style="text-align:center; margin-bottom: 0;">Export file</h1>
            <div class="row justify-content-center align-items-end">
                <button class="btn btn-danger"><a href="file.php">Export</a></button>
            </div>
        </div>

        <div class="container col-4" style="height: 300px; display: flex; flex-direction: column; justify-content: flex-end ;margin-bottom: 20px;">
            <h1 style="text-align:center">Import file</h1>
            <div class="row justify-content-center align-items-center">
                <button class="btn btn-danger">
                    <a href="file.php">import</a>
                </button>
            </div>
        </div>

        <div class="container col-4" style="height: 300px; display: flex; flex-direction: column; justify-content: flex-end ;margin-bottom: 20px;">
            <h1 style="text-align:center">
                View table
            </h1>
            <div class="row justify-content-center align-items-center">
                <button class="btn btn-danger">
                    <a href="view.php">
                        View
                    </a>
                </button>
            </div>
        </div>

    </div>
    <footer class="page-footer">
        <p>&copy; 2023 Asset Management System. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>