<?php
 session_start();
 require_once('database/mysql_connect.php');
$sesusername = $_SESSION['SESS_USERNAME'];
?>

    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">

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
                        <li class="active">
                            <a href="adminHomepage.php">Home</a>
                        </li>
                        <li>
                            <a href="adminSenaraiPegawai.php">Senarai Pegawai</a>
                        </li>
                        <li>
                            <a href="adminStatusKeberadaan.php">Status Keberadaan</a>
                        </li>
                        <li>
                            <a href="adminUnit.php">Bahagian/Unit</a>
                        </li>
                        <li>
                            <a href="Logout.php">Log out</a>
                        </li>
                    </ul>
                    <p class="navbar-left navbar-text">Signed in as
                        <a href="#" class="navbar-link">
                            <?php echo"$sesusername"?>
                        </a>
                    </p>
                </div>
            </div>
        </div>
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="text-success">OFFICER MOVEMENT MANAGEMENT SYSTEM</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="section">
            <div class="container">
                <div class="row">

                        <?php


        //Make the query.
        $query = "SELECT * FROM OMSPEGAWAI ORDER BY PGW_ID";
        $result = mysql_query ($query); //Run the query
        $num = mysql_num_rows($result);
            $counter = 1;

        if ($num > 0) { // If it ran OK, display the records.
                // Table header.
            echo '<table class="table table-bordered">
                    <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Kad Pengenalan</th>
                    <th>Jawatan</th>
                    <th>Unit</th>
                    <th>H/P</th>
                    <th>Email</th>
                </tr>' ;
                //Fetch and print all the records.
            while ($row = mysql_fetch_array ($result, MYSQL_ASSOC) ) {
                echo '<tr>
                        <td>' . $counter . '</td>
                        <td>' . $row['PGW_NM'] . '</td>
                        <td>' . $row['PGW_NRIC'] . '</td>
                        <td>' . $row['PGW_JWTN'] . '</td>
                        <td>' . $row['UNIT'] . '</td>
                        <td>' . $row['PGW_HP'] . '</td>
                        <td>' . $row['PGW_EMEL'] . '</td>
                      </tr>' ;
                $counter++;
        }
        echo '</table>';
        mysql_free_result ($result) ; //Free up the resources.
        } else  {  //If it did not run OK.
          echo '<div class="alert alert-info text-left" role="alert">
                  <h5>INFO!</h5>There are no results found.
                </div>';
        }
        mysql_close(); //Close the database connection.


                        ?>

                </div>
            </div>
            <br>
            <br>
            <div class="navbar navbar-default navbar-fixed-bottom navbar-inverse">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand"><span><small><small><small>Copyright 2016 @ AZ</small></small></small></span></a>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
