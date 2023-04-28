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
    <title>Delete</title>
    <link href="style.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/css.gg@2.0.0/icons/css/search.css' rel='stylesheet'>
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
    .table th {
        padding: 0.2rem;
        vertical-align: middle;
        border-top: 1px solid #dee2e6;
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

    @media screen and (max-width: 768px) {
        table {
            display: block;
            overflow-x: auto;
            white-space: nowrap;
        }
    }
</style>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-light" style="background-color: #ffff;">
        <a style="text-decoration: none;font-weight: bold;font-family: myFirstFont;color: #de152c;font-size:25px;text-align: center; padding: 0 0 0 0;" href="index.php">Asset Management System</a>
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
        <h1 class=" head" style="margin: 0 0 0 0;">Delete</h1>
    </div>

    <hr style="height:2px;border-width:0;color:gray;background-color:gray;margin-top: 20px">


    <div class="container">
        <table class="table table-hover table-striped" id="asset-table" ;>
            <thead class="bg-danger">
                <tr style="color:white">
                    <th scope="col" style="padding: 0.75rem; " font-family:Times New Roman""></th>
                    <th scope="col" style="padding: 0.75rem; text-align:center; width: 20px">ID</th>
                    <th scope="col" style="padding: 0.75rem; width: 350px">asset_type</th>
                    <th scope="col" style="padding: 0.75rem; width: 350px">asset_number</th>
                    <th scope="col" style="padding: 0.75rem; width: 350px">asset_status</th>
                    <th scope="col" style="padding: 0.75rem; width: 350px">asset_condition</th>
                </tr>
            </thead>
            <tbody>
                <div class='container' style="padding-top: 0px; max-width: 100%;margin-left:0px">
                    <div class="row">
                        <div class="col-md-4">
                            <p style="Text-align:left ;margin-bottom: 0px;padding-bottom: 0px; font-weight : bold ;margin-left: 5px">Choose Database</p>
                            <form method="GET" style="display: inline-block;">
                                <select onchange="this.form.submit()" name="db" class="form-control" style="margin-bottom: 10px ;max-width: 150px; display: inline-block;">
                                    <option value="" disabled selected>Select Databases</option>
                                    <option value="students" <?php if (isset($_GET['db']) && $_GET['db'] == 'students') echo 'selected'; ?>>students</option>
                                    <option value="studentss" <?php if (isset($_GET['db']) && $_GET['db'] == 'studentss') echo 'selected'; ?>>studentss</option>
                                    <option value="studentsss" <?php if (isset($_GET['db']) && $_GET['db'] == 'studentsss') echo 'selected'; ?>>studentsss</option>
                                </select>
                            </form>
                        </div>
                        <div class="col-md-4">
                            <form method="post">
                                <div class="input-group">
                                    <i class="gg-search" style="margin: 35px 10px 0px 0px"></i>
                                    <input name="search" type="text" class="form-control" placeholder="Search data" style="margin-top: 25px">
                                    <div class="input-group-append">
                                        <button class="btn btn-dark btn-sm" style="margin-top: 25px" name="submit">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-4">
                            <?php if (isset($_GET['db'])) : ?>
                                <div role="group">
                                    <button class="btn btn-dark" style="margin-top: 25px; float: right;">
                                        <a href="addpage.php?db=<?php echo $_GET['db']; ?>" style="color:white;">Add Data</a>
                                    </button>
                                    <button class="btn btn-dark" style="margin-top: 25px;margin-right: 10px ;float: right; ">
                                        <a href="view.php?db=<?php echo $_GET['db']; ?>" style="color:white;">Select</a>
                                    </button>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <form action="code_delete.php?db=<?php echo $_GET['db'] ?>" method="POST">
                        <div style="display: flex; align-items: center; width:400px;">
                            <button type="submit" name="delete_multiple_btn" class="btn btn-danger btn-sm" onclick="return confirmDelete()" style="margin-right: 10px;margin-bottom: 10px">Delete</button>
                            <input type="checkbox" id="select-all-checkbox" style="padding-left:100px;margin-bottom: 10px ;">
                            <p style="font-size: 20px; margin: 0px 0px 10px 5px;">Select All</p>
                            <p style="font-size: 15px; margin: 0px 0px 10px 5px;">(You have selected <span id="selected-count">0</span> items.)</p>

                        </div>
                </div>
                <?php
                if (isset($_POST['submit'])) {
                    $db = $_GET['db'];
                    $con = mysqli_connect("localhost", "root", "", $db);
                    $search = $_POST['search'];
                    $sql = "Select * from `asset` where asset_id like '%$search%' or asset_type like '%$search%' or asset_number like '%$search%' or asset_status like '%$search%' or asset_condition like '%$search%'";
                    $result = mysqli_query($con, $sql);
                    if ($result) {
                        if (mysqli_num_rows($result) > 0) {
                            foreach ($result as $row) {
                ?>
                                <tr>
                                    <td style="width:10px; text-align: center;">
                                        <input type="checkbox" name="delete_id[]" value="<?= $row['asset_id']; ?>">
                                    </td>
                                    <th>
                                        <?= $row['asset_id']; ?>
                                    </th>
                                    <td>
                                        <?= $row['asset_type']; ?>
                                    </td>
                                    <td>
                                        <?= $row['asset_number']; ?>
                                    </td>
                                    <td>
                                        <?= $row['asset_status']; ?>
                                    </td>
                                    <td>
                                        <?= $row['asset_condition']; ?>
                                    </td>
                                </tr>
                            <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="5">No Record Found</td>
                            </tr>
                        <?php
                        }
                    }
                } else {
                    $db = $_GET['db'];
                    $con = mysqli_connect("localhost", "root", "", $db);

                    $query = "SELECT * FROM asset";
                    $query_run = mysqli_query($con, $query);

                    if (mysqli_num_rows($query_run) > 0) {
                        foreach ($query_run as $row) {
                        ?>
                            <tr>
                                <td style="width:10px; text-align: center;">
                                    <input type="checkbox" name="delete_id[]" value="<?= $row['asset_id']; ?>">
                                </td>
                                <th>
                                    <?= $row['asset_id']; ?>
                                </th>
                                <td>
                                    <?= $row['asset_type']; ?>
                                </td>
                                <td>
                                    <?= $row['asset_number']; ?>
                                </td>
                                <td>
                                    <?= $row['asset_status']; ?>
                                </td>
                                <td>
                                    <?= $row['asset_condition']; ?>
                                </td>
                            </tr>
                        <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="5">No Record Found</td>
                        </tr>
                <?php
                    }
                }
                ?>

            </tbody>
        </table>
        </form>
    </div>
    </form>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#select-all-checkbox').click(function() {
                $('input[type="checkbox"]').prop('checked', this.checked);
            });
        });

        function confirmDelete() {
            // Show confirmation dialog box
            var result = confirm("Are you sure you want to delete?");
            // If user clicks "OK", return true to proceed with the form submission
            if (result) {
                return true;
                // If user clicks "Cancel", return false to cancel the form submission
            } else {
                return false;
            }
        }
    </script>



    <script>
        const checkboxes = document.querySelectorAll('#asset-table input[type="checkbox"]');
        const selectAllCheckbox = document.querySelector('#select-all-checkbox');
        const deleteBtn = document.querySelector('button[name="delete_multiple_btn"]');
        const countLabel = document.querySelector('#selected-count');

        let checkedCount = 0;

        // add event listener to each checkbox
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('click', () => {
                if (checkbox.checked) {
                    checkedCount++;
                } else {
                    checkedCount--;
                }
                // update the select all checkbox based on the checked count
                if (checkedCount === checkboxes.length) {
                    selectAllCheckbox.checked = true;
                } else {
                    selectAllCheckbox.checked = false;
                }
                // enable or disable the delete button based on the checked count
                if (checkedCount > 0) {
                    deleteBtn.disabled = false;
                } else {
                    deleteBtn.disabled = true;
                }
                // update the count label
                countLabel.innerText = checkedCount;
            });
        });

        // add event listener to select all checkbox
        selectAllCheckbox.addEventListener('click', () => {
            checkboxes.forEach(checkbox => {
                checkbox.checked = selectAllCheckbox.checked;
            });
            checkedCount = selectAllCheckbox.checked ? checkboxes.length : 0;
            // enable or disable the delete button based on the checked count
            if (checkedCount > 0) {
                deleteBtn.disabled = false;
            } else {
                deleteBtn.disabled = true;
            }
            // update the count label
            countLabel.innerText = checkedCount;
        });
    </script>




    <footer class="page-footer">
        <p>&copy; 2023 Asset Management System. All rights reserved.</p>
    </footer>
</body>

</html>