<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asset Management</title>
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>



</head>
<style>
    .head {
        color: #ffffff;
        font-size: 50px;
        font-weight: bold;
        font-family: 'myFirstFont';
        text-align: center;
        margin-top: 50px;
        text-shadow: 1px 1px 8px #000000;
    }

    .body {
        background-image: url("logo2.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        font-family: "Times New Roman";
    }

    .container {
        width: 500px;
        height: 500px;
    }

    .inside-container {
        max-width: 400px;
        /* border-style: solid; */
        margin: 40px 40px 40px 40px;

    }

    .name {
        font-size: 20px;
        float: left;
        padding-right: 0px;
        margin-right: 0px;
    }

    a {
        color: white;

    }

    a:hover {
        color: #ffffff;
    }

    @media (max-width: 850px) {
        .head {
            font-size: 5vw;
        }

        h1 {
            font-size: 5vw;
        }
    }

    .page-footer {
        position: absolute;
        bottom: 0;
        background-color: #ad2828;
        text-align: center;
        color: white;
        margin: 0;
        height: 30px;
        width: 100%;
    }

    html {
        margin: 0px;
        height: 100%;
        width: 100%;
    }

    body {
        width: 100%;
        overflow-x: hidden;
        background-image: url("logo4.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
    }
</style>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-light" style="background-color: #ffff;">
        <a class="top" style="text-decoration: none;font-weight: bold;font-family: 'myFirstFont';color: #de152c;font-size:25px;text-align: center; padding: 0 0 0 0;" href="index.php">Asset Management System</a>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#nav1" aria-controls="nav1" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse collapse" id="nav1">
            <ul class="navbar-nav mr-auto" style="color:red">
                <li class="nav-item">
                    <a class="nav-link  disabled" href="index.php">Home</a>
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


    <!-- Header -->
    <div class="jumbotron jumbotron-fluid" style="background-image: url('red2.jpg');background-repeat: no-repeat;background-size: cover;background-position: center;background-attachment: fixed;"">
        <h1 class=" head" style="margin: 0 0 0 0;">Asset Management System</h1>
    </div>
    <!-- Header line -->
    <hr style="height:2px;border-width:0;color:gray;background-color:gray;margin-top: 20px">
    <div class="row" style="height: 1400px;text-align:center">



        <!-- all amount chart ------------------------------------------------------------------------------------------>
        <div class="container col-12 col-sm-4" style="margin-bottom:50px;padding-right:0px;padding-left:0px">
            <h1 style="text-decoration: none; font-weight: bold; font-family: 'myFirstFont'; color: #de152c; font-size: 25px; text-align: center; padding: 0 0 0 0; background-color: lightgray; border-radius: 40px; background-size: cover; display: inline-block; width: 80%;">All Available Asset</h1>
            <canvas id="asset-chart" style="width: 100%; height: 200px; margin:50px 0;"></canvas>
            <canvas class="polar" id="assetChart"></canvas>
            <canvas class="polar" id="donutassetChart"></canvas>
        </div>

        <?php
        // Connect to database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "students";

        $conn = mysqli_connect($servername, $username, $password, $dbname);

        // Query to get asset type and amount
        $sql = "SELECT asset_type, COUNT(*) AS amount FROM Asset GROUP BY asset_type";

        $result = mysqli_query($conn, $sql);

        // Create arrays for chart data
        $asset_types = array();
        $amounts = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $asset_types[] = $row['asset_type'];
            $amounts[] = $row['amount'];
        }
        ?>

        <script>
            // Create chart using Chart.js library
            var ctx = document.getElementById('asset-chart').getContext('2d');
            var assetChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode($asset_types); ?>,
                    datasets: [{
                        label: 'Asset Types',
                        data: <?php echo json_encode($amounts); ?>,
                        backgroundColor: ['#ff8a8a', '#ffef96', '#abff96', '#96cfff', '#d296ff', '#ff96da', '#a4a4a4'],
                        borderColor: ['#b80000', '#b8a800', '#5cb800', '#0077b8', '#7500b8', '#b8006a', '#686868'],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    },
                    plugins: {
                        datalabels: {
                            anchor: 'end',
                            align: 'end',
                            font: {
                                size: 14
                            },
                            formatter: function(value, context) {
                                return value;
                            },
                            display: true // add this option to display the values
                        }
                    },
                }
            });
        </script>

        <!-- all amount polar chart -->
        <?php
        // Connect to database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "students";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Query to get asset data
        $sql = "SELECT asset_type, COUNT(*) as asset_count FROM asset GROUP BY asset_type";
        $result = $conn->query($sql);

        // Store asset data in arrays for use with Chart.js
        $asset_types = array();
        $asset_counts = array();
        while ($row = $result->fetch_assoc()) {
            array_push($asset_types, $row['asset_type']);
            array_push($asset_counts, $row['asset_count']);
        }

        // Close database connection
        $conn->close();
        ?>
        <script>
            var ctx = document.getElementById('assetChart').getContext('2d');
            var assetChart = new Chart(ctx, {
                type: 'polarArea',
                data: {
                    labels: <?php echo json_encode($asset_types); ?>,
                    datasets: [{
                        label: 'Asset Count',
                        data: <?php echo json_encode($asset_counts); ?>,
                        backgroundColor: ['#ff8a8a', '#ffef96', '#abff96', '#96cfff', '#d296ff', '#ff96da', '#a4a4a4'],
                    }]
                },
                options: {
                    title: {
                        display: true,
                        text: 'Asset Pie Chart'
                    },
                    plugins: {
                        labels: {
                            render: 'value',
                            fontColor: '#fff', // sets font color to white
                            precision: 0
                        }
                    }
                }
            });
        </script>

        <!-- all amount donut chart -->
        <?php
        // Connect to database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "students";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Query to get asset data
        $sql = "SELECT asset_type, COUNT(*) as asset_count FROM asset GROUP BY asset_type";
        $result = $conn->query($sql);

        // Store asset data in arrays for use with Chart.js
        $asset_types = array();
        $asset_counts = array();
        while ($row = $result->fetch_assoc()) {
            array_push($asset_types, $row['asset_type']);
            array_push($asset_counts, $row['asset_count']);
        }

        // Close database connection
        $conn->close();
        ?>
        <script>
            var ctx = document.getElementById('donutassetChart').getContext('2d');
            var donutassetChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: <?php echo json_encode($asset_types); ?>,
                    datasets: [{
                        label: 'Asset Count',
                        data: <?php echo json_encode($asset_counts); ?>,
                        backgroundColor: ['#ff8a8a', '#ffef96', '#abff96', '#96cfff', '#d296ff', '#ff96da', '#a4a4a4'],
                    }]
                },
                options: {
                    title: {
                        display: true,
                        text: 'Asset Pie Chart'
                    },
                    plugins: {
                        labels: {
                            render: 'value',
                            fontColor: '#fff', // sets font color to white
                            precision: 0
                        }
                    }
                }
            });
        </script>


        <!-- active chart ------------------------------------------------------------------------------------------>
        <div class="container col-12 col-sm-4" style="margin-bottom:50px;padding-right:0px;padding-left:0px;">
            <h1 style="text-decoration: none; font-weight: bold; font-family: 'myFirstFont'; color: #de152c; font-size: 25px; text-align: center; padding: 0 0 0 0; background-color: lightgray; border-radius: 40px; background-size: cover; display: inline-block; width: 80%;">Active Asset</h1>
            <canvas id="active-asset-chart" style="width: 100%; height: 200px; margin: 50px 0 50px 0;"></canvas>
            <canvas class="polar" id="activeassetChart"></canvas>
            <canvas class="polar" id="donutactiveassetChart"></canvas>
        </div>

        <?php
        // Connect to database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "students";

        $conn = mysqli_connect($servername, $username, $password, $dbname);

        // Query to get active asset type and amount
        $sql = "SELECT asset_type, COUNT(*) AS amount FROM Asset WHERE asset_status='Active' GROUP BY asset_type";

        $result = mysqli_query($conn, $sql);

        // Create arrays for chart data
        $asset_types = array();
        $amounts = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $asset_types[] = $row['asset_type'];
            $amounts[] = $row['amount'];
        }
        ?>

        <script>
            // Create chart using Chart.js library
            var ctx = document.getElementById('active-asset-chart').getContext('2d');
            var activeAssetChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode($asset_types); ?>,
                    datasets: [{
                        label: 'Active Asset Types',
                        data: <?php echo json_encode($amounts); ?>,
                        backgroundColor: '#4bf251',
                        borderColor: '#078700',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>


        <!-- active donut chart -->
        <?php
        // Connect to database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "students";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Query to get asset data
        $sql = "SELECT asset_type, COUNT(*) as asset_count FROM asset WHERE asset_status = 'active' GROUP BY asset_type";
        $result = $conn->query($sql);

        // Store asset data in arrays for use with Chart.js
        $asset_types = array();
        $asset_counts = array();
        while ($row = $result->fetch_assoc()) {
            array_push($asset_types, $row['asset_type']);
            array_push($asset_counts, $row['asset_count']);
        }

        // Close database connection
        $conn->close();
        ?>

        <script>
            var ctx = document.getElementById('donutactiveassetChart').getContext('2d');
            var donutactiveassetChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: <?php echo json_encode($asset_types); ?>,
                    datasets: [{
                        label: 'Asset Count',
                        data: <?php echo json_encode($asset_counts); ?>,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.6)',
                            'rgba(54, 162, 235, 0.6)',
                            'rgba(255, 206, 86, 0.6)',
                            'rgba(75, 192, 192, 0.6)',
                            'rgba(153, 102, 255, 0.6)',
                            'rgba(255, 159, 64, 0.6)',
                            'rgba(255, 99, 132, 0.6)',
                            'rgba(54, 162, 235, 0.6)'
                        ]
                    }]
                },
                options: {
                    title: {
                        display: true,
                        text: 'Asset Pie Chart'
                    },
                    plugins: {
                        labels: {
                            render: 'value',
                            fontColor: '#fff', // sets font color to white
                            precision: 0
                        }
                    }
                }
            });
        </script>

        <!-- active polar chart -->
        <?php
        // Connect to database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "students";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Query to get asset data
        $sql = "SELECT asset_type, COUNT(*) as asset_count FROM asset WHERE asset_status = 'active' GROUP BY asset_type";
        $result = $conn->query($sql);

        // Store asset data in arrays for use with Chart.js
        $asset_types = array();
        $asset_counts = array();
        while ($row = $result->fetch_assoc()) {
            array_push($asset_types, $row['asset_type']);
            array_push($asset_counts, $row['asset_count']);
        }

        // Close database connection
        $conn->close();
        ?>

        <script>
            var ctx = document.getElementById('activeassetChart').getContext('2d');
            var activeassetChart = new Chart(ctx, {
                type: 'polarArea',
                data: {
                    labels: <?php echo json_encode($asset_types); ?>,
                    datasets: [{
                        label: 'Asset Count',
                        data: <?php echo json_encode($asset_counts); ?>,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.6)',
                            'rgba(54, 162, 235, 0.6)',
                            'rgba(255, 206, 86, 0.6)',
                            'rgba(75, 192, 192, 0.6)',
                            'rgba(153, 102, 255, 0.6)',
                            'rgba(255, 159, 64, 0.6)',
                            'rgba(255, 99, 132, 0.6)',
                            'rgba(54, 162, 235, 0.6)'
                        ]
                    }]
                },
                options: {
                    title: {
                        display: true,
                        text: 'Asset Pie Chart'
                    },
                    plugins: {
                        labels: {
                            render: 'value',
                            fontColor: '#fff', // sets font color to white
                            precision: 0
                        }
                    }
                }
            });
        </script>


        <!-- inactive chart ----------------------------------------------------------------------------------------->
        <div class="container col-12 col-sm-4" style="margin-bottom:50px;padding-right:0px;padding-left:0px">
            <h1 style="text-decoration: none; font-weight: bold; font-family: 'myFirstFont'; color: #de152c; font-size: 25px; text-align: center; padding: 0 0 0 0; background-color: lightgray; border-radius: 40px; background-size: cover; display: inline-block; width: 80%;">Inactive Asset</h1>
            <canvas id="inactive-chart" style="width: 100%; height: 200px; margin: 50px 0;"></canvas>
            <canvas class="polar" id="inactiveassetChart"></canvas>
            <canvas class="polar" id="donutinactiveassetChart"></canvas>
        </div>

        <?php
        // Connect to database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "students";

        $conn = mysqli_connect($servername, $username, $password, $dbname);

        // Query to get inactive asset type and amount
        $sql = "SELECT asset_type, COUNT(*) AS amount FROM Asset WHERE asset_status='Inactive' GROUP BY asset_type";

        $result = mysqli_query($conn, $sql);

        // Create arrays for chart data
        $asset_types = array();
        $amounts = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $asset_types[] = $row['asset_type'];
            $amounts[] = $row['amount'];
        }
        ?>

        <script>
            // Create chart using Chart.js library
            var ctx = document.getElementById('inactive-chart').getContext('2d');
            var inactiveChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode($asset_types); ?>,
                    datasets: [{
                        label: 'Inactive Assets',
                        data: <?php echo json_encode($amounts); ?>,
                        backgroundColor: '#ff8a8a',
                        borderColor: '#b80000',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>

        <!-- inactive polar chart -->
        <?php
        // Connect to database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "students";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Query to get asset data
        $sql = "SELECT asset_type, COUNT(*) as asset_count FROM asset WHERE asset_status = 'inactive' GROUP BY asset_type";
        $result = $conn->query($sql);

        // Store asset data in arrays for use with Chart.js
        $asset_types = array();
        $asset_counts = array();
        while ($row = $result->fetch_assoc()) {
            array_push($asset_types, $row['asset_type']);
            array_push($asset_counts, $row['asset_count']);
        }

        // Close database connection
        $conn->close();
        ?>

        <script>
            var ctx = document.getElementById('inactiveassetChart').getContext('2d');
            var inactiveassetChart = new Chart(ctx, {
                type: 'polarArea',
                data: {
                    labels: <?php echo json_encode($asset_types); ?>,
                    datasets: [{
                        label: 'Asset Count',
                        data: <?php echo json_encode($asset_counts); ?>,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.6)',
                            'rgba(54, 162, 235, 0.6)',
                            'rgba(255, 206, 86, 0.6)',
                            'rgba(75, 192, 192, 0.6)',
                            'rgba(153, 102, 255, 0.6)',
                            'rgba(255, 159, 64, 0.6)',
                            'rgba(255, 99, 132, 0.6)',
                            'rgba(54, 162, 235, 0.6)'
                        ]
                    }]
                },
                options: {
                    title: {
                        display: true,
                        text: 'Asset Pie Chart'
                    },
                    plugins: {
                        labels: {
                            render: 'value',
                            fontColor: '#fff', // sets font color to white
                            precision: 0
                        }
                    }
                }
            });
        </script>

        <!-- inactive pdonut chart -->
        <?php
        // Connect to database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "students";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Query to get asset data
        $sql = "SELECT asset_type, COUNT(*) as asset_count FROM asset WHERE asset_status = 'inactive' GROUP BY asset_type";
        $result = $conn->query($sql);

        // Store asset data in arrays for use with Chart.js
        $asset_types = array();
        $asset_counts = array();
        while ($row = $result->fetch_assoc()) {
            array_push($asset_types, $row['asset_type']);
            array_push($asset_counts, $row['asset_count']);
        }

        // Close database connection
        $conn->close();
        ?>

        <script>
            var ctx = document.getElementById('donutinactiveassetChart').getContext('2d');
            var donutinactiveassetChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: <?php echo json_encode($asset_types); ?>,
                    datasets: [{
                        label: 'Asset Count',
                        data: <?php echo json_encode($asset_counts); ?>,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.6)',
                            'rgba(54, 162, 235, 0.6)',
                            'rgba(255, 206, 86, 0.6)',
                            'rgba(75, 192, 192, 0.6)',
                            'rgba(153, 102, 255, 0.6)',
                            'rgba(255, 159, 64, 0.6)',
                            'rgba(255, 99, 132, 0.6)',
                            'rgba(54, 162, 235, 0.6)'
                        ]
                    }]
                },
                options: {
                    title: {
                        display: true,
                        text: 'Asset Pie Chart'
                    },
                    plugins: {
                        labels: {
                            render: 'value',
                            fontColor: '#fff', // sets font color to white
                            precision: 0
                        }
                    }
                }
            });
        </script>
    </div>


    <div class="dot-nav">
        <div class="dot active"></div>
        <div class="dot"></div>
        <div class="dot"></div>
    </div>
        <div class="content-item">
            <h2>Content Item 2</h2>
            <p>Integer tincidunt neque ac elit congue, id lobortis arcu pretium. Nam eu sapien ex. Sed dignissim pharetra arcu vel iaculis. Nullam quis lorem eu ipsum fermentum posuere at ac eros.</p>
        </div>
        <div class="content-item">
            <h2>Content Item 3</h2>
            <p>Cras aliquet mollis turpis a pellentesque. Proin sit amet mauris tincidunt, rhoncus elit a, pharetra lorem. Fusce malesuada tincidunt nisl id congue. Vivamus ac nulla vel metus scelerisque finibus vitae quis ipsum.</p>
        </div>
    </div>
    <hr style="height:2px;border-width:0;color:gray;background-color:gray;margin-top: 40px">
    <div class="container col" style="height: 300px;width: 100%">
        <footer class="page-footer" style"margin-top: 200px">
            <p>&copy; 2023 Asset Management System. All rights reserved.</p>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Select all dots and content items
        const dots = document.querySelectorAll('.dot');
        const items = document.querySelectorAll('.content-item');

        // Loop through dots and add click event listeners
        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                // Remove active class from all dots and content items
                dots.forEach(dot => dot.classList.remove('active'));
                items.forEach(item => item.classList.remove('active'));

                // Add active class to clicked dot and content item
                dot.classList.add('active');
                items[index].classList.add('active');
            });
        });
    </script>


</body>

</html>