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

            <?php


            //Make the query.
            $query = "SELECT * FROM OMSURUSAN ORDER BY URSN_ID";
            $result = mysql_query ($query); //Run the query
            $num = mysql_num_rows($result);
            $counter = 1;

            if ($num > 0) { // If it ran OK, display the records.
                // Table header.
                echo '<table class="table table-bordered">
                    <tr>
                    <th>No.</th>
                    <th>Status Keberadaan</th>
                </tr>' ;
                //Fetch and print all the records.
                while ($row = mysql_fetch_array ($result, MYSQL_ASSOC) ) {
                    echo '<tr>
                        <td>' . $counter . '</td>
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
    <br>
    <br><?php
    require("includes/footer.php");
    ?>
