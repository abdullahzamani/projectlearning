<!--
    Programmer : AbdullahZamani
    Company    : UniKL MIIT
    System     : NR; Online Application Management System
    File       : Admin Add Categories
    Version    : 1.0.0   - 21 November 2015
-->

<!DOCTYPE html>
<?php include ('./includes/header.php'); ?>
   <div class="section">
    <div class="row">
     <div class="span12">
      <h4 class="title text-center">
       <span><span class="line">Tambah<strong> Status Keberadaan</strong></span></span>
      </h4>

      <?php
        if(isset($_POST['submit'])){
          require_once ('database/config.php');

          $statusid = $_POST['statusid'];
          $ursndesc = $_POST['ursndesc'];
          $sessid = $_SESSION['SESS_USERID'];

          $query = "INSERT INTO OMSURUSAN (URSN_ID,URSN_DESC,CRT_TMS,UPD_TMS,CRT_UID,UPD_UID) VALUES ('$statusid','$ursndesc',NOW(),NOW(),'$sessid','$sessid')";
          $result = @mysql_query ($query);
          if ($result) { //If it ran OK.
            echo "<script>";
            echo " alert('Berjaya Tambah Status Keberadaan!');
                   window.location.href='adminStatusKeberadaan.php';
                 </script>";
          }
        } else {
      ?>

    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-offset-3">
            <form class="form-horizontal" action="adminAddStatusKeberadaan.php" method="post" role="form">
              <div class="form-group">
                <div class="col-sm-4">
                  <font color="#FF0000"><small>* </small></font><label for="inputEmail3" class="control-label">Status Keberadaan ID</label>
                </div>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="statusid" placeholder="Status Keberadaan ID" value="<?php if (isset ($_POST ['statusid'])) echo $_POST ['statusid']; ?>">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-4">
                  <font color="#FF0000"><small>* </small></font><label for="inputPassword3" class="control-label">Status Keberadaan Description</label>
                </div>
                <div class="col-sm-6">
                  <input type="text" class="form-control" placeholder="Status Keberadaan Description" name="ursndesc" value="<?php if (isset ($_POST ['ursndesc'])) echo $_POST ['ursndesc']; ?>">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary" name="submit" value="Add">
                  <a href="adminStatusKeberadaan.php">
                    <button type="button" class="btn btn-danger">Cancel</button>
                  </a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

      <?php } ?>
     </div>
    </div>
   </div>
<?php include ('./includes/footer.php'); ?>
  </div>
  </body>
</html>
