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
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>

<style>
    .table thead th {
        vertical-align: middle;
        padding: 5px;
        margin: 5px;
    }
</style>

<body>
    <!-- navbar -->
    <ul>
        <li><a href=""><img src="logo.jpg" class="pic"></a></li>
        <li><a href="file.php">file</a></li>
        <li><a href="view.php">view</a></li>
        <li style="float:right"><a href="">Asset Management</a></li>
    </ul>

    <div style="overflow-x:auto;">
        <?php
        if (isset($_SESSION['delete_mul'])) {
        ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Hey!</strong> <?php echo $_SESSION['delete_mul']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
            unset($_SESSION['delete_mul']);
        }
        ?>
        <form action="code_delete.php?db=<?php echo $_GET['db'] ?>" method="POST">
            <table class="table">
                <thead class="thead-dark" style="padding : 8px ; margin: 10px">
                    <tr>
                        <th>
                            <button type="submit" name="delete_multiple_btn" class="btn btn-danger">Delete</button>
                        </th>
                        <th>ID</th>
                        <th>Fullname</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Course</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $db = $_GET['db'];
                    $con = mysqli_connect("localhost", "root", "", $db);

                    $query = "SELECT * FROM students";
                    $query_run  = mysqli_query($con, $query);

                    if (mysqli_num_rows($query_run) > 0) {
                        foreach ($query_run as $row) {
                    ?>
                            <tr>
                                <td style="width:10px; text-align: center;">
                                    <input type="checkbox" name="delete_id[]" value="<?= $row['id']; ?>">
                                </td>
                                <td><?= $row['id']; ?></td>
                                <td><?= $row['fullname']; ?></td>
                                <td><?= $row['email']; ?></td>
                                <td><?= $row['phone']; ?></td>
                                <td><?= $row['course']; ?></td>
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
                    ?>
                </tbody>
            </table>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>