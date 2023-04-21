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
    .table td,
    .table th {
        padding: 0.2rem;
        vertical-align: middle;
        border-top: 1px solid #dee2e6;
    }
</style>

<body>
    <!-- navbar -->
    <ul>
        <li><a href=""><img src="logo.jpg" class="pic"></a></li>
        <li><a href="file.php">file</a></li>
        <li><a href="view.php">view</a></li>
        <div style="float:right">
            <li><a href="deletemul.php">Delete</a></li>
            <button style="height:52px ; margin:0 0 0 0" type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="sr-only">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="addpage.php?db=students.php">Add</a>
                <a class="dropdown-item" href="file.php">Export</a>
                <a class="dropdown-item" href="file.php">Import</a>
                <a class="dropdown-item" href="view.php">View</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="index.php">Home</a>
            </div>
        </div>
    </ul>
    <div style="overflow-x:auto;">
        <table class="table table-hover table-striped" ;>
            <thead class="thead-dark">
                <tr>
                    <th scope="col" style="padding: 0.75rem; " font-family:Times New Roman""></th>
                    <th scope="col"  style="padding: 0.75rem; text-align:center; width: 20px">ID</th>
                    <th scope="col"  style="padding: 0.75rem; width: 350px">Fullname</th>
                    <th scope="col"  style="padding: 0.75rem; width: 350px">Email</th>
                    <th scope="col"  style="padding: 0.75rem; width: 350px">Phone</th>
                    <th scope="col"  style="padding: 0.75rem; width: 350px">Course</th>
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
                        </div>
                </div>
                <?php
                if (isset($_POST['submit'])) {
                    $db = $_GET['db'];
                    $con = mysqli_connect("localhost", "root", "", $db);
                    $search = $_POST['search'];
                    $sql = "Select * from `students` where id like '%$search%' or fullname like '%$search%' or email like '%$search%' or phone like '%$search%' or course like '%$search%'";
                    $result = mysqli_query($con, $sql);
                    if ($result) {
                        if (mysqli_num_rows($result) > 0) {
                            foreach ($result as $row) {
                        ?>
                                <tr>
                                    <td style="width:10px; text-align: center;">
                                        <input type="checkbox" name="delete_id[]" value="<?= $row['id']; ?>">
                                    </td>
                                    <th>
                                        <?= $row['id']; ?>
                                    </th>
                                    <td>
                                        <?= $row['fullname']; ?>
                                    </td>
                                    <td>
                                        <?= $row['email']; ?>
                                    </td>
                                    <td>
                                        <?= $row['phone']; ?>
                                    </td>
                                    <td>
                                        <?= $row['course']; ?>
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
                }
                        
                else{
                $db = $_GET['db'];
                $con = mysqli_connect("localhost", "root", "", $db);

                $query = "SELECT * FROM students";
                $query_run = mysqli_query($con, $query);

                if (mysqli_num_rows($query_run) > 0) {
                    foreach ($query_run as $row) {
                ?>
                        <tr>
                            <td style="width:10px; text-align: center;">
                                <input type="checkbox" name="delete_id[]" value="<?= $row['id']; ?>">
                            </td>
                            <th>
                                <?= $row['id']; ?>
                            </th>
                            <td>
                                <?= $row['fullname']; ?>
                            </td>
                            <td>
                                <?= $row['email']; ?>
                            </td>
                            <td>
                                <?= $row['phone']; ?>
                            </td>
                            <td>
                                <?= $row['course']; ?>
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
</body>

</html>