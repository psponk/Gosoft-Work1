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
    <title>View</title>
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

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>

</head>

<style>
    .table td,
    .table th {
        padding: 0.2rem;
        vertical-align: middle;
        border-top: 1px solid #dee2e6;
        width: 300px;
    }

    @media screen and (max-width: 768px) {
        table {
            display: block;
            overflow-x: auto;
            white-space: nowrap;
        }
        a{
            font-size:5px
        }
    }

    
    
</style>

<body style="background-color:white">
    <?php
    if (isset($_SESSION['addmessage'])) {
        $addmessage = $_SESSION['addmessage'];
        unset($_SESSION['addmessage']);
        echo "<script>alert('$addmessage');</script>";
    }

    if (isset($_SESSION['deletemessage'])) {
        $deletemessage = $_SESSION['deletemessage'];
        unset($_SESSION['deletemessage']);
        echo "<script>alert('$deletemessage');</script>";
    }
    if (isset($_SESSION['delete_mul'])) {
        $delete_mul = $_SESSION['delete_mul'];
        unset($_SESSION['delete_mul']);
        echo "<script>alert('$delete_mul');</script>";
    }

    ?>
    <script>
        function confirmDelete(id, db) {
            if (confirm("Are you sure you want to delete this record (id = " + id + ") ? ")) {
                window.location.href = "delete.php?deleteid=" + id + "&db=" + db;
            }
        }
    </script>

    <!-- navbar -->

    <nav class="navbar navbar-light" style="background-color: #ffff;">
        <a style="text-decoration: none;font-weight: bold;font-family: myFirstFont;color: #de152c;font-size:25px;text-align: center; padding: 0 0 0 0;"href="index.php">Asset Management System</a>
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
                <li class="nav-item">
                    <a class="nav-link disabled" href="view.php">View</a>
                </li>
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Add</a>
                    <div class="dropdown-menu" aria-labelledby="Add">
                        <a class="dropdown-item" href="addpage.php?db=students">students</a>
                        <a class="dropdown-item" href="addpage.php?db=studentss">studentss</a>
                        <a class="dropdown-item" href="addpage.php?db=studentsss">studentsss</a>
                    </div>
                </li>
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Delete</a>
                    <div class="dropdown-menu" aria-labelledby="Add">
                        <a class="dropdown-item" href="deletemul.php?db=students">students</a>
                        <a class="dropdown-item" href="deletemul.php?db=studentss">studentss</a>
                        <a class="dropdown-item" href="deletemul.php?db=students">studentsss</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>


    <div class="container" style="padding-top: 10px">
        <table id="myTable" class="table table-hover table-striped">
            <thead class="bg-danger">
                <tr style="color:white;">
                    <th scope="col" style="padding: 0.75rem; text-align:center; width: 20px">ID</th>
                    <th scope="col" style="padding: 0.75rem;">Fullname</th>
                    <th scope="col" style="padding: 0.75rem;">Email</th>
                    <th scope="col" style="padding: 0.75rem;">Phone</th>
                    <th scope="col" style="padding: 0.75rem;">Course</th>
                    <th scope="col" style="text-align: center ; width: 180px;padding: 0.75rem;">Manage</th>
                </tr>
            </thead>
            <tbody>
                <div class='container' style="padding-top: 0px; max-width: 100%;margin-left:0px">
                    <div class="row">
                        <div class="col-md-4">
                            <p style="Text-align:left ;margin-bottom: 0px;padding-bottom: 0px; font-weight : bold ;margin-left: 5px">
                                Choose Database</p>
                            <form method="GET" style="display: inline-block;">
                                <select onchange="this.form.submit()" name="db" class="form-control" style="margin-bottom: 20px ;max-width: 160px; display: inline-block;">
                                    <option value="" disabled selected>Select Databases</option>
                                    <option value="students" <?php if (isset($_GET['db']) && $_GET['db'] == 'students')
                                                                    echo 'selected'; ?>>students</option>
                                    <option value="studentss" <?php if (isset($_GET['db']) && $_GET['db'] == 'studentss')
                                                                    echo 'selected'; ?>>studentss</option>
                                    <option value="studentsss" <?php if (isset($_GET['db']) && $_GET['db'] == 'studentsss')
                                                                    echo 'selected'; ?>>studentsss</option>
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

                                    <button class="btn btn-dark" style="margin-top: 25px; float: right;" data-toggle="modal" data-target="#myModal">
                                        Add Data
                                    </button>

                                    <div class="modal" id="myModal" tabindex="-1" role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content" style="border-radius: 20px">
                                                <div class="modal-header" style="background-color:#de152c ;border-radius: 20px 20px 0px 0px ;color:white">
                                                    <h5 class="modal-title">Add Data</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>

                                                </div>
                                                <div class="modal-body">
                                                    <form name="add_data" action="add.php?db=<?php echo $_GET['db'] ?>" method="post">
                                                        <center?>
                                                            <div>
                                                                <p>fullname</p>
                                                                <input type="text" name="fullname" id="fullname" class="form-control" id="validationCustomUsername" style="margin: 0 0 10px 0; padding: 0 0 0 0">
                                                            </div>

                                                            <div>
                                                                <p>email</p>
                                                                <input type="text" name="email" id="email" class="form-control" id="validationCustomUsername" style="margin: 0 0 10px 0; padding: 0 0 0 0">

                                                            </div>

                                                            <div>
                                                                <p>phone</p>
                                                                <input type="text" name="phone" id="phone" class="form-control" id="validationCustomUsername" style="margin: 0 0 10px 0; padding: 0 0 0 0">
                                                            </div>

                                                            <div>
                                                                <p>course</p>
                                                                <input type="text" name="course" id="course" class="form-control" id="validationCustomUsername" style="margin: 0 0 10px 0; padding: 0 0 0 0">

                                                            </div>
                                                            </center>
                                                </div>
                                                <div class="modal-footer">
                                                    <button name="add_data" type="submit" class="btn btn-success" style="margin-top: 15px">Submit</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <button class="btn btn-dark" style="margin-top: 25px;margin-right: 10px ;float: right; ">
                                    <a href="deletemul.php?db=<?php echo $_GET['db']; ?>" style="color:white;">Select</a>
                                </button>
                        </div>
                    <?php endif; ?>
                    </div>
                </div>
    </div>

    <!-- search bar -->
    <?php
    if (isset($_POST['submit'])) {
        $db = $_GET['db'];
        $search = $_POST['search'];
        $sql = "Select * from `students` where id like '%$search%' or fullname like '%$search%' or email like '%$search%' or phone like '%$search%' or course like '%$search%'";
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = $db;

        $con = mysqli_connect($servername, $username, $password, $dbname);
        $result = mysqli_query($con, $sql);
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id'];
                    $fullname = $row['fullname'];
                    $email = $row['email'];
                    $phone = $row['phone'];
                    $course = $row['course'];
                    echo '
                    <tr>
                        <td style="text-align:center; font-weight : bold">' . $id . '</td>
                        <td>' . $fullname . '</td>
                        <td>' . $email . '</td>
                        <td>' . $phone . '</td>
                        <td>' . $course . '</td>
                        <td align="center" width="180px;">
                            <div>
                                <button type="button" class="btn btn-info btn-sm"><a href="updatepage.php?id=' . $id . '&db=' . $db . '&fullname=' . $fullname . '&email=' . $email . '&phone=' . $phone . '&course=' . $course . '" class="text-light">Edit</a></button>
                                <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete(' . $id . ',\'' . $db . '\')">Delete</button>
                            </div>
                        </td>
                    </tr>';
                }
            } else {
                echo "<script>alert('No Data Found');</script>";
            }
        }
    } else if (isset($_GET['db'])) {
        $db = $_GET['db'];
        // Connect to the database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = $db;

        $con = mysqli_connect($servername, $username, $password, $dbname);
        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM students";
        $result = mysqli_query($con, $sql);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                $fullname = $row['fullname'];
                $email = $row['email'];
                $phone = $row['phone'];
                $course = $row['course'];
                echo '
                <tr>
                    <th scope="row" style="text-align:center;">' . $id . '</th>
                    <td>' . $fullname . '</td>
                    <td>' . $email . '</td>
                    <td>' . $phone . '</td>
                    <td>' . $course . '</td>
                    <td align="center" width="180px;">
                        <div>
                            <button type="button" class="btn btn-info btn-sm"><a href="updatepage.php?id=' . $id . '&db=' . $db . '&fullname=' . $fullname . '&email=' . $email . '&phone=' . $phone . '&course=' . $course . '" class="text-light">Edit</a></button>
                            <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete(' . $id . ',\'' . $db . '\')">Delete</button>
                        </div>
                    </td>
                </tr>';
            }
        } else {
            echo "No data found";
        }
    }
    ?>
    </tbody>
    </table>
    </div>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

</body>

</html>