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
</head>

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
    <ul>
        <li><a href=""><img src="logo.jpg" class="pic"></a></li>
        <li><a href="index.php">file</a></li>
        <li><a href="view.php">view</a></li>
        <li class="corner" style="float:right"><a href="">Asset Management</a></li>
    </ul>

    <div style="overflow-x:auto;">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Fullname</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Course</th>
                    <th scope="col" style="text-align: center ; width: 180px;">Manage</th>

                </tr>
            </thead>
            <tbody>
                <div class='container' style="padding-top: 0px; max-width: 100%;margin-left:0px">
                    <p style="Text-align:left ;margin-bottom: 0px ; margin-top:10px  ; font-weight : bold">Choose Database</p>
                    <form method="GET" style="display: inline-block;">
                        <select onchange="this.form.submit()" name="db" class="form-control" style="margin-bottom: 20px ;max-width: 100px; display: inline-block;">
                            <option value="">Select Database</option>
                            <option value="students" <?php if (isset($_GET['db']) && $_GET['db'] == 'students') echo 'selected'; ?>>students</option>
                            <option value="studentss" <?php if (isset($_GET['db']) && $_GET['db'] == 'studentss') echo 'selected'; ?>>studentss</option>
                            <option value="studentsss" <?php if (isset($_GET['db']) && $_GET['db'] == 'studentsss') echo 'selected'; ?>>studentsss</option>
                        </select>
                    </form>
                    <?php if (isset($_GET['db'])) : ?>
                        <div style="width: 180px; float: right;">
                            <button class="btn btn-warning" style="float: right; margin-right: 10px;">
                                <a href="deletemul.php?db=<?php echo $_GET['db']; ?>" style="color:white;">Select</a>
                            </button>
                            <button class="btn btn-success" style="margin-left: 10px;">
                                <a href="addpage.php?db=<?php echo $_GET['db']; ?>" style="color:white;">Add Data</a>
                            </button>
                        </div>
                    <?php endif; ?>
                </div>

                <?php
                if (isset($_GET['db'])) {
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
                <th scope="row">' . $id . '</th>
                <td>' . $fullname . '</td>
                <td>' . $email . '</td>
                <td>' . $phone . '</td>
                <td>' . $course . '</td>
                <td align="center" width="180px;">
                    <div>
                        <button type="button" class="btn btn-primary"><a href="updatepage.php?id=' . $id . '&db=' . $db . '&fullname=' . $fullname . '&email=' . $email . '&phone=' . $phone . '&course=' . $course . '" class="text-light">Update</a></button>
                        <button type="button" class="btn btn-danger" onclick="confirmDelete(' . $id . ',\'' . $db . '\')">Delete</button>
                    </div>
                </td>
            </tr>';
                        }
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

</body>