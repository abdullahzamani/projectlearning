<?php
require("includes/header.php");
?>
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-success">SISTEM PERGERAKAN DAN KEBERADAAN PEGAWAI DI PEJABAT</h1>
                <h2>SENARAI PEGAWAI</h2>
            </div>
        </div>
    </div>
</div>
<div class="section">
    <div class="container">
        <div class="row">
            <a href="adminAddPegawai.php" class="btn btn-primary hide-from-printer">Tambah Pegawai</a>
            <br><br>
            <button onclick="myFunction()" class="btn hide-from-printer">Print</button>
            <label class="hide-from-printer">|</label>
            <a href="adminSenaraiPegawai.php" class="hide-from-printer"><button class="btn btn-success hide-from-printer">Papar Semua Unit</button></a>
            <label class="hide-from-printer">|</label>
            <?php include("includes/unitList.php"); ?>
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

                $query = "SELECT * FROM OMSPEGAWAI where PGW_ID <> 'admin' and UNIT='$unit' ORDER BY FIELD(PGW_JWTN, 'J54', 'J52', 'J48', 'J41', 'JA38', 'JA36', 'JA29', 'N17')";
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
                    <th>No. Tel.</th>
                    <th>Email</th>
                    <th class="hide-from-printer">Edit</th>
                    <th class="hide-from-printer">Delete</th>
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
                   <td class="hide-from-printer"><a href="adminUpdatePegawai.php?pgwid=' . $row['PGW_ID'] . '" class="btn btn-default btn-block">Edit</a></td>
                   <td class="hide-from-printer"><button class="btn btn-danger btn-block"
                               type="button"
                               data-toggle="modal"
                               data-target="#confirmDelete' . $row['PGW_ID'] . '">Delete</button></td>
                      </tr>' ;
            echo '<!-- Modal Dialog -->
                   <div class="modal fade" id="confirmDelete' . $row['PGW_ID'] . '" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
                    <div class="modal-dialog">
                     <div class="modal-content">
                      <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                       <h4 class="modal-title">Buang Pegawai</h4>
                      </div>
                      <div class="modal-body">
                       <p>Buang Pegawai: <font color="#FF0000">' . $row['PGW_NM'] . '</font> ?</p>
                      </div>
                      <div class="modal-footer">
                       <a href="adminDelete.php?pgwid=' . $row['PGW_ID'] . '"><button type="button" class="btn btn-danger" id="confirm">Delete</button></a>
                       <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                      </div>
                     </div>
                    </div>
                   </div>';
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

                echo '<h2> Paparan Semua Pegawai</h2>';
                $query = "SELECT * FROM OMSPEGAWAI where PGW_ID <> 'admin' ORDER BY FIELD(PGW_JWTN, 'J54', 'J52', 'J48', 'J41', 'JA38', 'JA36', 'JA29', 'N17')";
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
                    <th>No. Tel.</th>
                    <th>Email</th>
                    <th class="hide-from-printer">Edit</th>
                    <th class="hide-from-printer">Delete</th>
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
                   <td class="hide-from-printer"><a href="adminUpdatePegawai.php?pgwid=' . $row['PGW_ID'] . '" class="btn btn-default btn-block">Edit</a></td>
                   <td class="hide-from-printer"><button class="btn btn-danger btn-block"
                               type="button"
                               data-toggle="modal"
                               data-target="#confirmDelete' . $row['PGW_ID'] . '">Delete</button></td>
                      </tr>' ;
            echo '<!-- Modal Dialog -->
                   <div class="modal fade" id="confirmDelete' . $row['PGW_ID'] . '" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
                    <div class="modal-dialog">
                     <div class="modal-content">
                      <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                       <h4 class="modal-title">Buang Pegawai</h4>
                      </div>
                      <div class="modal-body">
                       <p>Buang Pegawai: <font color="#FF0000">' . $row['PGW_NM'] . '</font> ?</p>
                      </div>
                      <div class="modal-footer">
                       <a href="adminDelete.php?pgwid=' . $row['PGW_ID'] . '"><button type="button" class="btn btn-danger" id="confirm">Delete</button></a>
                       <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                      </div>
                     </div>
                    </div>
                   </div>';
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
