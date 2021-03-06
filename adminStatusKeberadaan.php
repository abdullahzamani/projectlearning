<?php
require("includes/header.php");
?>
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-success">SISTEM PERGERAKAN DAN KEBERADAAN PEGAWAI DI PEJABAT</h1>
            </div>
        </div>
    </div>
</div>
<div class="section">
    <div class="container">
        <div class="row">

            <a href="adminAddStatusKeberadaan.php" class="btn btn-primary">Tambah Status Pergerakan dan Keberadaan</a>

            <br><br>

            <?php
            $query = "SELECT * FROM OMSURUSAN ORDER BY URSN_ID";
            $result = mysql_query ($query); //Run the query
            $num = mysql_num_rows($result);
            $counter = 1;

            if ($num > 0) { // If it ran OK, display the records.
                // Table header.
                echo '<table class="table table-bordered">
                    <tr><thead>
                    <th class="col-md-1">No.</th>
                    <th>Status Pergerakan dan Keberadaan</th>
                    <th class="col-md-1">Edit</th>
                    <th class="col-md-1">Delete</th></thead>
                </tr>' ;
                //Fetch and print all the records.
                while ($row = mysql_fetch_array ($result, MYSQL_ASSOC) ) {
                    echo '<tr>
                        <td>' . $counter . '</td>
                        <td>' . $row['URSN_DESC'] . '</td>
                   <td><a href="adminUpdateStatusKeberadaan.php?statusid=' . $row['URSN_ID'] . '" class="btn btn-default btn-block">Edit</a></td>
                   <td><button class="btn btn-danger btn-block"
                               type="button"
                               data-toggle="modal"
                               data-target="#confirmDelete' . $row['URSN_ID'] . '">Delete</button></td>
                      </tr>' ;
            echo '<!-- Modal Dialog -->
                   <div class="modal fade" id="confirmDelete' . $row['URSN_ID'] . '" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
                    <div class="modal-dialog">
                     <div class="modal-content">
                      <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                       <h4 class="modal-title">Buang Status Keberadaan</h4>
                      </div>
                      <div class="modal-body">
                       <p>Buang Status Keberadaan: <font color="#FF0000">' . $row['URSN_DESC'] . '</font> ?</p>
                      </div>
                      <div class="modal-footer">
                       <a href="adminDelete.php?statusid=' . $row['URSN_ID'] . '"><button type="button" class="btn btn-danger" id="confirm">Delete</button></a>
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
            mysql_close(); //Close the database connection.


            ?>

        </div>
    </div>
    <br>
    <br><?php
    require("includes/footer.php");
    ?>
