<?php
 session_start();
 require_once('database/mysql_connect.php');
$sesusername = $_SESSION['SESS_USERNAME'];
$sespgwid = $_SESSION['SESS_USERID'];
?>

    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="css/style.css" rel="stylesheet" type="text/css">

<!--    timepicker-->
        <link type="text/css" href="timepicker/css/bootstrap.min.css" />
        <link type="text/css" href="timepicker/css/bootstrap-timepicker.min.css" />
        <script type="text/javascript" src="timepicker/js/jquery.min.js"></script>
        <script type="text/javascript" src="timepicker/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="timepicker/js/bootstrap-timepicker.min.js"></script>

    </head>

    <body>
        <div class="navbar navbar-default navbar-inverse navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand"><img height="20" alt="Brand" src="images/jpbd.png" class="center-block"></a>
                </div>
                <div class="collapse navbar-collapse" id="navbar-ex-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="adminHomepage.php">Home</a>
                        </li>
                        <li>
                            <a href="adminSenaraiPegawai.php">Senarai Pegawai</a>
                        </li>
                        <li>
                            <a href="adminStatusKeberadaan.php">Status Pergerakan</a>
                        </li>
                        <li>
                            <a href="adminUnit.php">Bahagian/Unit</a>
                        </li>
                        <li>
                            <a href="Logout.php">Log out</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
