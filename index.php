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
    .head{
        color:#de152c;
        font-size: 50px;
        font-weight: bold;
        font-family: myFirstFont;
        text-align: center;
        margin-top: 50px;
        text-shadow: 1px 1px 8px #323336;
    }

    .container{
        width: 500px;
        height: 500px;
    }

    .inside-container{
        max-width: 400px;
        /* border-style: solid; */
        margin: 40px 40px 40px 40px;

    }

    .name{
        font-size: 20px;
        float: left;
        padding-right: 0px;
        margin-right : 0px;
    }
    a{
        color : white;
        
    }
    a:hover {
        color : #ffffff;
    }
    @media (max-width: 850px) { 
    .head{
        font-size : 5vw; 
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
    <div class="container">
        <div class="inside-container">
            <p class="name">
                Import File
            </p>
            <button class="btn btn-danger" style="display:block ;float:right">
                <a href="file.php">
                    Import
                </a>
            </button>
            <br>
        </div>

        <div class="inside-container">
            <p class="name">
                Export File
            </p>
            <button class="btn btn-danger" style="display:block ; float:right">
                <a href="file.php">
                    Export
                </a>
            </button>
            <br>
        </div>

        <div class="inside-container">
            <p class="name">
                View table
            </p>
            <button class="btn btn-danger" style="display:block ;float:right">
                <a href="view.php">
                    View
                </a>
            </button>
        </div>
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>