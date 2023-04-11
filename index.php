<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Config</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        .pic {
            height: 20px;
            width: 100px;
        }

        body {
            background-image: url("logo2.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        .container {
            padding-top: 30px;
            max-width: 600px;
            margin: 0 auto;
        }

        @media only screen and (max-width: 767px) {
            .container {
                max-width: 100%;
                padding-left: 10px;
                padding-right: 10px;
            }
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #912929;
        }

        li {
            float: left;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover:not(.active) {
            background-color: #ffffff;
        }

        .active {
            background-color: #591313;
        }

        h4 {
            margin-bottom: 0rem;
        }

    </style>
</head>

<body style="background-color:white">
        <!-- navbar -->
    <ul>
        <li><a href=""><img src="logo.jpg" class="pic"></a></li>
        <li><a href="">lorem</a></li>
        <li><a href="">lorem</a></li>
        <li style="float:right"><a class="active" href="">lorem</a></li>
    </ul>
    <!-- main import export part -->
    <div class="container" style="padding-top: 30px ; width: 450px;">
        <div class="row">
            <div class="col" style="margin-top: 20%">
                <?php
                if (isset($_SESSION['message'])) {
                    echo "<h4>" . $_SESSION['message'] . "</h4>";
                    unset($_SESSION['message']);
                }
                ?>
                <!-- import section -->
                <div class="card">
                    <div class="card-header" style="background-color:#912929">
                        <h4 style="color:white ;">Import File</h4>
                    </div>
                    <div class="card-body text-center">

                        <form action="code.php" method="POST" enctype="multipart/form-data">
                            <p style="color:#bd1e1e ; text-align:left ;font-weight: bold">*Support only .XLSX .XLS .CSV</p>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="import_file" name="import_file">
                                <label class="custom-file-label" for="import_file" style="text-align:left ">Choose File</label>
                            </div>
                            <button type="submit" name="save_excel_data" class="btn btn-primary mt-3">Import</button>
                        </form>

                    </div>
                </div>

                <!-- export section -->
                <div class="card mt-5">
                    <div class="card-header" style="background-color:#912929">
                        <h4 style="color:white">Export File</h4>
                    </div>
                    <div class="card-body text-center">

                        <form action="code.php" method="POST">
                            <select name="export_file_type" class="form-control enctype=" multipart/form-data">
                                <option value="xlsx">XLSX</option>
                                <option value="xls">XLS</option>
                                <option value="csv">CSV</option>
                            </select>

                            <button type="submit" name="export_excel_btn" class="btn btn-primary mt-1">Export</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>