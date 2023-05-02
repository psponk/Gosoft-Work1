<?php session_start(); ?>
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
    .card {
    border-radius: 20px;
}

.page-footer {
    background-color: #ad2828;
    text-align: center;
    color: white;
    margin: 0 0 0 0;
    height: 30px;
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

<body style="background-color:white;">
    <!-- navbar -->
    <nav class="navbar navbar-light" style="background-color: #ffff;">
        <a class="top" style="text-decoration: none;font-weight: bold;font-family: myFirstFont;color: #de152c;font-size:25px;text-align: center; padding: 0 0 0 0;"href="index.php">Asset Management System</a>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#nav1" aria-controls="nav1" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse collapse" id="nav1">
            <ul class="navbar-nav mr-auto" style="color:red">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="file.php">File</a>
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
        <h1 class=" head" style="margin: 0 0 0 0;">Import / Export</h1>
    </div>

    <hr style="height:2px;border-width:0;color:gray;background-color:gray;margin-top: 20px">

    <!-- main import export part -->
    <div class="container" style="max-width: 800px; margin-top:8% ; margin-bottom:230px">
        <div class="row">
            <div class="col-sm-6" style="margin-top: 1%">
                <?php
                if (isset($_SESSION['message'])) {
                    $message = $_SESSION['message'];
                    unset($_SESSION['message']);
                    echo "<script>alert('$message');</script>";
                }
                ?>
                <!-- import section -->
                <div class="card">
                    <div class="card-header" style="background-color:#940d03; text-align:center">
                        <div class="row">
                            <div class="col-12">
                                <h4 style="color:white ;text-align:center; margin-left: 10px; display:inline-block;">Import File</h4>
                                <i class="gg-import" style="display:inline-block; color: white; margin:10px 0px 0px 4px"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-body text-center">

                        <form action="code.php" method="POST" enctype="multipart/form-data">
                            <div class="row" style="margin-left: 8px">
                                <p style="Text-align:left ;margin-bottom: 0px ; font-weight : bold">Select Database</p>
                                <i class="gg-database" style="display:inline-block ;margin: 3px 0px 0px 10px"></i>
                            </div>
                            <select name="db" class="form-control enctype=" multipart/form-data">
                                <option value="students">students</option>
                                <option value="studentss">studentss</option>
                                <option value="studentsss">studentsss</option>
                            </select>
                            <div class="row" style="margin-left: 8px">
                                <p style="Text-align:left ;margin-bottom: 0px ; margin-top:10px  ; font-weight : bold">Select File</p>
                                <i class="gg-file-add" style="display:inline-block ;margin: 12px 0px 0px 10px"></i>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="import_file" name="import_file">
                                <label class="custom-file-label" for="import_file" style="text-align:left">Choose File (.XLSX .XLS .CSV)</label>
                            </div>

                            <button type="submit" name="save_excel_data" class="btn btn-secondary mt-3">Import</button>
                        </form>
                    </div>
                </div>
                
            </div>
            <div class="col-sm-6" style="margin-top: 1%">



                <!-- export section -->
                <div class="card">
                    <div class="card-header" style="background-color:#940d03; text-align: center">
                        <div class="row">
                            <div class="col-12">
                                <h4 style="color:white ;text-align:center; margin-left: 10px; display:inline-block;">Export File</h4>
                                <i class="gg-export" style="display:inline-block; color: white; margin:10px 0px 0px 4px"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-body text-center">

                        <form action="code.php" method="POST">
                            <div class="row" style="margin-left: 8px">
                                <p style="Text-align:left ;margin-bottom: 0px ; font-weight : bold">Select Database</p>
                                <i class="gg-database" style="display:inline-block ;margin: 3px 0px 0px 10px"></i>
                            </div>
                            <select name="db" class="form-control enctype=" multipart/form-data">
                                <option value="students">students</option>
                                <option value="studentss">studentss</option>
                                <option value="studentsss">studentsss</option>
                            </select>

                            <div class="row" style="margin-left: 8px">
                                <p style="Text-align:left ;margin-bottom: 0px ; margin-top:10px  ; font-weight : bold">File Type</p>
                                <i class="gg-file-document" style="display:inline-block ;margin: 12px 0px 0px 10px"></i>
                            </div>
                            <select name="export_file_type" class="form-control enctype=" multipart/form-data>
                                <option value="xlsx">XLSX</option>
                                <option value="xls">XLS</option>
                                <option value="csv">CSV</option>
                            </select>

                            <button type="submit" name="export_excel_btn" class="btn btn-secondary mt-3">Export</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="page-footer">
            <p>&copy; 2023 Asset Management System. All rights reserved.</p>
        </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>