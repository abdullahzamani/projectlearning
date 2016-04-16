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

            <a href="adminAddUnit.php" class="btn btn-primary">Tambah Bahagian/Unit</a>

            <br><br>
            <?php
            $query = "SELECT * FROM OMSUNIT";
            $result = mysql_query ($query); //Run the query
            $num = mysql_num_rows($result);
            $counter = 1;

            if ($num > 0) { // If it ran OK, display the records.
                // Table header.
                echo '<table class="table table-bordered">
                    <tr><thead>
                    <th class="col-md-1">No.</th>
                    <th class="col-md-2">Unit</th>
                    <th>Huraian</th>
                    <th class="col-md-1">Edit</th>
                    <th class="col-md-1">Delete</th></thead>
                </tr>' ;
                //Fetch and print all the records.
                while ($row = mysql_fetch_array ($result, MYSQL_ASSOC) ) {
                    echo '<tr>
                        <td>' . $counter . '</td>
                        <td>' . $row['UNIT_ID'] . '</td>
                        <td>' . $row['UNIT_DESC'] . '</td>
                   <td><a href="adminUpdateUnit.php?unitid=' . $row['UNIT_ID'] . '" class="btn btn-default btn-block">Edit</a></td>
                   <td><button class="btn btn-danger btn-block"
                               type="button"
                               data-toggle="modal"
                               data-target="#confirmDelete' . $row['UNIT_ID'] . '">Delete</button></td>
                      </tr>' ;
            echo '<!-- Modal Dialog -->
                   <div class="modal fade" id="confirmDelete' . $row['UNIT_ID'] . '" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
                    <div class="modal-dialog">
                     <div class="modal-content">
                      <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                       <h4 class="modal-title">Delete Category Parmanently</h4>
                      </div>
                      <div class="modal-body">
                       <p>Are you sure about this ?</p>
                      </div>
                      <div class="modal-footer">
                       <a href="adminDeleteUnit.php?id=' . $row['UNIT_ID'] . '"><button type="button" class="btn btn-danger" id="confirm">Delete</button></a>
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
