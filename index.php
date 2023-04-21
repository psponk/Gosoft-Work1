<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asset Management</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<style>
    .head {
        color: #de152c;
        font-size: 50px;
        font-weight: bold;
        font-family: myFirstFont;
        text-align: center;
        margin-top: 50px;
        text-shadow: 1px 1px 8px #323336;
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
    }
</style>

<body style="background-color:white">
    <!-- navbar -->
    <ul>
        <li><a href=""><img src="logo.jpg" class="pic"></a></li>
        <li><a href="file.php">file</a></li>
        <li><a href="view.php">view</a></li>
        <li style="float:right"><a href="">Asset Management</a></li>
    </ul>

    <h1 class="head">Asset Management system</h1>
    <hr style="height:2px;border-width:0;color:gray;background-color:gray;margin-top: 20px">
    <h1 style="text-align:center">All Available Asset</h1>
    <div class="container" style="height:200px">
        <div class="row" style="text-align:center">
            <div class="col-md-4">
                box 1
            </div>
            <div class="col-md-4">
                box 2
            </div>
            <div class="col-md-4">
                box 3
            </div>
        </div>
    </div>
            <div class="row" style="justify-content: center;align-items: center;">

                <div class="container col-4"> 
                <h1 style="text-align:center">
                    Export File
                </h1>
                <button class="btn btn-danger" style="margin-left:42%;">
                    <a href="file.php">
                        Export
                    </a>
                </button>

                </div>

                <div class="container col-4"> 
                <h1 style="text-align:center">
                    Import file
                </h1>
                <button class="btn btn-danger"  style="margin-left:42%;">
                    <a href="file.php">
                        import
                    </a>
                </button>
                </div>

                <div class="container col-4"> 
                <h1 style="text-align:center">
                    View table
                </h1>
                <button class="btn btn-danger"  style="margin-left:42%;">
                    <a href="view.php">
                        View
                    </a>
                </button>
                </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>