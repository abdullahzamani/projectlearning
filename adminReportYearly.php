<?php
require("includes/header.php");
?>
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-success">SISTEM PERGERAKAN DAN KEBERADAAN PEGAWAI DI PEJABAT</h1>
                <h2>LAPORAN TAHUNAN</h2>
            </div>
        </div>
    </div>
</div>
<div class="section">
    <div class="container">
        <div class="row">
            <button onclick="myFunction()" class="btn hide-from-printer">Print</button>
            <label class="hide-from-printer">|</label>
            <a href="adminReportYearly.php" class="hide-from-printer"><button class="btn btn-success hide-from-printer">Papar Semua Unit</button></a>
            <label class="hide-from-printer">|</label>
            <?php include("includes/yrReportUnitList.php"); ?>
            <br>
            <br>

            <?php

            if(isset($_GET['pgw_unit']))
            {
                $unit = $_GET['pgw_unit'];


                $query2 = "SELECT * FROM OMSUNIT where UNIT_ID='$unit'";
                $result2 = mysql_query ($query2); //Run the query
                $row2 = mysql_fetch_array ($result2, MYSQL_ASSOC);
                echo '<h2>' . $row2['UNIT_ID'] . ' : ' . $row2['UNIT_DESC'] . '</h2>';

            $query1 = "SELECT COUNT(*) AS TOTAL FROM OMSLAPORAN where UNIT_ID='$unit'";
            $result1 = mysql_query ($query1); //Run the query
            $row1 = mysql_fetch_array ($result1, MYSQL_ASSOC);

            $query = "SELECT URSN_DESC, CAST(ROUND(100.0 * COUNT(*) /". $row1['TOTAL'] .", 1) AS DECIMAL(10, 2)) AS PERATUS FROM OMSLAPORAN where UNIT_ID='$unit' GROUP BY URSN_DESC";
            $result = mysql_query ($query); //Run the query
            $num = mysql_num_rows($result);
            $counter = 1;

            if ($num > 0) { // If it ran OK, display the records.
                // Table header.
                echo '<table class="table table-bordered">
                    <tr><thead>
                    <th class="col-md-1">No.</th>
                    <th>Catatan Pergerakan</th>
                    <th>Peratus %</th></thead>
                </tr>' ;
                //Fetch and print all the records.
                while ($row = mysql_fetch_array ($result, MYSQL_ASSOC) ) {
                    echo '<tr>
                        <td>' . $counter . '</td>
                        <td>' . $row['URSN_DESC'] . '</td>
                   <td>' . $row['PERATUS'] . '</td>
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

            $query1 = "SELECT COUNT(*) AS TOTAL FROM OMSLAPORAN";
            $result1 = mysql_query ($query1); //Run the query
            $row1 = mysql_fetch_array ($result1, MYSQL_ASSOC);

            $query = "SELECT URSN_DESC, CAST(ROUND(100.0 * COUNT(*) /". $row1['TOTAL'] .", 1) AS DECIMAL(10, 2)) AS PERATUS FROM OMSLAPORAN GROUP BY URSN_DESC";
            $result = mysql_query ($query); //Run the query
            $num = mysql_num_rows($result);
            $counter = 1;

            if ($num > 0) { // If it ran OK, display the records.
                // Table header.
                echo '<table class="table table-bordered">
                    <tr><thead>
                    <th class="col-md-1">No.</th>
                    <th>Catatan Pergerakan</th>
                    <th>Peratus %</th></thead>
                </tr>' ;
                //Fetch and print all the records.
                while ($row = mysql_fetch_array ($result, MYSQL_ASSOC) ) {
                    echo '<tr>
                        <td>' . $counter . '</td>
                        <td>' . $row['URSN_DESC'] . '</td>
                   <td>' . $row['PERATUS'] . '</td>
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
