<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Config</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background-color:white">

    <div class="container" style="padding-top: 30px ; width: 400px;">
        <div class="row">
            <div class="col-md-12 mt-4">

                <?php
                if (isset($_SESSION['message'])) {
                    echo "<h4>" . $_SESSION['message'] . "</h4>";
                    unset($_SESSION['message']);
                }
                ?>
                <!-- import section -->
                <div class="card">
                    <div class="card-header" style="background-color:#912929">
                        <h4 style="color:white">Import File</h4>
                    </div>
                    <div class="card-body text-center">

                        <form action="code.php" method="POST" enctype="multipart/form-data">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="import_file" name="import_file">
                                <label class="custom-file-label" for="import_file">Choose File</label>
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
                            <select name="export_file_type" class="form-control">
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