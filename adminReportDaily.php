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
            <div class="col-md-12">
                <div class="page-header">
                    <h1>
                        <small>Laporan Harian</small>
                        <br>Unit Khidmat Nasihat Perancangan</h1>
                </div>
                <?php


                //Make the query.
                $query = "SELECT * FROM OMSLAPORAN where SUBSTRING(CRT_TMS,9,2) = SUBSTRING(NOW(),9,2) ORDER BY RPT_ID";
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
                    <th>Catatan Pergerakan</th>
                </tr></thead>' ;
                    //Fetch and print all the records.
                    while ($row = mysql_fetch_array ($result, MYSQL_ASSOC) ) {
                        echo '<tr>
                        <td>' . $counter . '</td>
                        <td>' . $row['PGW_NM'] . '</td>
                        <td>' . $row['STA_ID'] . '</td>
                        <td>' . $row['PGW_WKT_KELUAR'] . '</td>
                        <td>' . $row['PGW_WKT_MASUK'] . '</td>
                        <td>' . $row['URSN_DESC'] . '</td>
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
    </div>
</div>
<?php
require("includes/footer.php");
?>
