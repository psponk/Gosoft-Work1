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
</head>

<body style="background-color:white">
    <!-- navbar -->
    <ul>
        <li><a href=""><img src="logo.jpg" class="pic"></a></li>
        <li><a href="index.php">file</a></li>
        <li><a href="view.php">view</a></li>
        <li style="float:right"><a href="">Asset Management</a></li>
    </ul>

    <!-- main import export part -->
    <div class="container" style="max-width: 1500px; margin-top:8%">
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
                    <div class="card-header" style="background-color:#940d03">
                        <h4 style="color:white ;text-align:center">Import File</h4>
                    </div>
                    <div class="card-body text-center">

                        <form action="code.php" method="POST" enctype="multipart/form-data">
                            <p style="Text-align:left ;margin-bottom: 0px ; font-weight : bold">Select Database</p>
                            <select name="db" class="form-control enctype=" multipart/form-data">
                                <option value="students">students</option>
                                <option value="studentss">studentss</option>
                                <option value="studentsss">studentsss</option>
                            </select>
                        
                            <p style="Text-align:left ;margin-bottom: 0px ; margin-top:10px  ; font-weight : bold">Select File</p>
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
                    <div class="card-header" style="background-color:#940d03">
                        <h4 style="color:white ;text-align:center">Export File</h4>
                    </div>
                    <div class="card-body text-center">

                        <form action="code.php" method="POST">
                            <p style="Text-align:left ;margin-bottom: 0px ; font-weight : bold">Select Database</p>
                            <select name="db" class="form-control enctype=" multipart/form-data">
                                <option value="students">students</option>
                                <option value="studentss">studentss</option>
                                <option value="studentsss">studentsss</option>
                            </select>

                            <p style="Text-align:left ;margin-bottom: 0px ; margin-top:10px  ; font-weight : bold">File Type</p>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>