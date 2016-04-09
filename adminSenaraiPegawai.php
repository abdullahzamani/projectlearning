<?php
require("includes/header.php");
?>
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
            <button onclick="myFunction()" class="btn hide-from-printer">Print</button>
            |
            <?php include("includes/unitList.php"); ?>
            <br>
            <br>

            <?php

            if(isset($_GET['pgw_unit']))
            {
                $unit = $_GET['pgw_unit'];
                //Make the query.
                $query = "SELECT * FROM OMSPEGAWAI where PGW_ID <> 'admin' and UNIT='$unit' ORDER BY PGW_ID";
                $result = mysql_query ($query); //Run the query
                $num = mysql_num_rows($result);
                $counter = 1;

                if ($num > 0) { // If it ran OK, display the records.
                    // Table header.
                    echo '<table class="table table-bordered">
                            <thead>
                    <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Kad Pengenalan</th>
                    <th>Jawatan</th>
                    <th>Unit</th>
                    <th>H/P</th>
                    <th>Email</th>
                </tr></thead>'
                        ;
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

            } else {

                $query = "SELECT * FROM OMSPEGAWAI where PGW_ID <> 'admin' ORDER BY PGW_ID";
                $result = mysql_query ($query); //Run the query
                $num = mysql_num_rows($result);
                $counter = 1;

                if ($num > 0) { // If it ran OK, display the records.
                    // Table header.
                    echo '<table class="table table-bordered">
                            <thead>
                    <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Kad Pengenalan</th>
                    <th>Jawatan</th>
                    <th>Unit</th>
                    <th>H/P</th>
                    <th>Email</th>
                </tr></thead>' ;
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

            }
            ?>

        </div>
    </div>
    <br>
    <br>
    <?php
    require("includes/footer.php");
    ?>
    <script>
        function myFunction() {
            window.print();
        };
    </script>
