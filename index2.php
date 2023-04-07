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

<body style="background-color: #f8f9fa;">

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">

                <?php
                if (isset($_SESSION['message'])) {
                    echo "<div class='alert alert-success'>" . $_SESSION['message'] . "</div>";
                    unset($_SESSION['message']);
                }
                ?>

                <div class="card mb-3">
                    <div class="card-header bg-danger text-white">
                        <h4 class="mb-0">Import File</h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="import_file">Select File:</label>
                                <input type="file" name="import_file" id="import_file" class="form-control-file">
                            </div>
                            <button type="submit" name="save_excel_data" class="btn btn-danger mt-2">Import</button>
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header bg-danger text-white">
                        <h4 class="mb-0">Export File</h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">
                            <div class="form-group">
                                <label for="export_file_type">Select File Type:</label>
                                <select name="export_file_type" id="export_file_type" class="form-control">
                                    <option value="xlsx">XLSX</option>
                                    <option value="xls">XLS</option>
                                    <option value="csv">CSV</option>
                                </select>
                            </div>
                            <button type="submit" name="export_excel_btn" class="btn btn-danger mt-2">Export</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>