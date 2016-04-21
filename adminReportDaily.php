<?php
require("includes/header.php");
?>
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-success">OFFICER MOVEMENT MANAGEMENT SYSTEM</h1>
                <h2>LAPORAN HARIAN</h2>
            </div>
        </div>
    </div>
</div>
<div class="section">
    <div class="container">
        <div class="row">
            <button onclick="myFunction()" class="btn hide-from-printer">Print</button>
            <label class="hide-from-printer">|</label>
            <a href="adminReportDaily.php" class="hide-from-printer"><button class="btn btn-success hide-from-printer">Papar Semua Unit</button></a>
            <label class="hide-from-printer">|</label>
            <?php include("includes/reportUnitList.php"); ?>
            <br>
            <br>

            <?php

            if(isset($_GET['pgw_unit']))
            {
                $unit = $_GET['pgw_unit'];


                $query1 = "SELECT * FROM OMSUNIT where UNIT_ID='$unit'";
                $result1 = mysql_query ($query1); //Run the query
                $row1 = mysql_fetch_array ($result1, MYSQL_ASSOC);
                echo '<h2>' . $row1['UNIT_ID'] . ' : ' . $row1['UNIT_DESC'] . '</h2>';

                $query = "SELECT * FROM OMSLAPORAN where SUBSTRING(CRT_TMS,9,2) = SUBSTRING(NOW(),9,2) and UNIT_ID='$unit' ORDER BY CRT_TMS";
                $result = mysql_query ($query); //Run the query
                $num = mysql_num_rows($result);
                $counter = 1;

                if ($num > 0) { // If it ran OK, display the records.
                    // Table header.
                    echo '<table class="table table-bordered table-hover table-striped">
                    <thead>
                    <tr>
                    <th>No.</th>
                    <th>Nama Pegawai</th>
                    <th>Status</th>
                    <th>Masa Keluar</th>
                    <th>Masa Masuk</th>
                    <th>Pergerakan</th>
                    <th>Catatan Pergerakan</th>
                </tr></thead>' ;
                    //Fetch and print all the records.
                    while ($row = mysql_fetch_array ($result, MYSQL_ASSOC) ) {
                        echo '<tr>
                        <td>' . $counter . '</td>
                        <td>' . $row['PGW_NM'] . '</td>
                        <td value="' . $row['STA_ID'] . '">' . $row['STA_ID'] . '</td>
                        <td>' . $row['PGW_WKT_KELUAR'] . '</td>
                        <td>' . $row['PGW_WKT_MASUK'] . '</td>
                        <td>' . $row['URSN_DESC'] . '</td>
                        <td>' . $row['RPT_DESC'] . '</td>
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

                echo '<h2>Paparan Semua Unit</h2>';

                $query = "SELECT * FROM OMSLAPORAN where SUBSTRING(CRT_TMS,9,2) = SUBSTRING(NOW(),9,2) ORDER BY CRT_TMS";
                $result = mysql_query ($query); //Run the query
                $num = mysql_num_rows($result);
                $counter = 1;

                if ($num > 0) { // If it ran OK, display the records.
                    // Table header.
                    echo '<table class="table table-bordered table-hover table-striped">
                    <thead>
                    <tr>
                    <th>No.</th>
                    <th>Nama Pegawai</th>
                    <th>Status</th>
                    <th>Masa Keluar</th>
                    <th>Masa Masuk</th>
                    <th>Pergerakan</th>
                    <th>Catatan Pergerakan</th>
                </tr></thead>' ;
                    //Fetch and print all the records.
                    while ($row = mysql_fetch_array ($result, MYSQL_ASSOC) ) {
                        echo '<tr>
                        <td>' . $counter . '</td>
                        <td>' . $row['PGW_NM'] . '</td>
                        <td value="' . $row['STA_ID'] . '">' . $row['STA_ID'] . '</td>
                        <td>' . $row['PGW_WKT_KELUAR'] . '</td>
                        <td>' . $row['PGW_WKT_MASUK'] . '</td>
                        <td>' . $row['URSN_DESC'] . '</td>
                        <td>' . $row['RPT_DESC'] . '</td>
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
